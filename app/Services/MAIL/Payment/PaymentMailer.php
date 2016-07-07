<?php namespace App\Services\Mail\Payment;

use App\Models\User\User;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\MailerException;
use Config;
use Url;

use App\Services\Mailer\PaymentMailerInterface;
use App\Services\Mailer\AbstractMailer;

class PaymentMailer extends AbstractMailer implement PaymentMailerInterface
{
	public function send_Invoice(Invoice $invoice)
        {
            $invoice->load('invitations', 'client', 'account');
            $entityType = $invoice->getEntityType();

            $view = 'invoice';
            $subject = trans("texts.{$entityType}_subject", ['invoice' => $invoice->invoice_number, 'account' => $invoice->account->getDisplayName()]);
            $accountName = $invoice->account->getDisplayName();
            $emailTemplate = $invoice->account->getEmailTemplate($entityType);
            $invoiceAmount = Utils::formatMoney($invoice->amount, $invoice->client->currency_id);

            foreach ($invoice->invitations as $invitation) {
                if (!$invitation->user || !$invitation->user->email) {
                    return false;
                }
                if (!$invitation->contact || !$invitation->contact->email) {
                    return false;
                }

                $invitation->sent_date = \Carbon::now()->toDateTimeString();
                $invitation->save();

                $variables = [
                    '$footer' => $invoice->account->getEmailFooter(),
                    '$link' => $invitation->getLink(),
                    '$client' => $invoice->client->getDisplayName(),
                    '$account' => $accountName,
                    '$contact' => $invitation->contact->getDisplayName(),
                    '$amount' => $invoiceAmount
                ];

                $data['body'] = str_replace(array_keys($variables), array_values($variables), $emailTemplate);
                $data['link'] = $invitation->getLink();
                $data['entityType'] = $entityType;

                $fromEmail = $invitation->user->email;
                $this->sendTo($invitation->contact->email, $fromEmail, $accountName, $subject, $view, $data);

                Activity::emailInvoice($invitation);
            }

            if (!$invoice->isSent()) {
                $invoice->invoice_status_id = INVOICE_STATUS_SENT;
                $invoice->save();
            }

            \Event::fire('invoice.sent', $invoice);
        }
	public function send_PaymentConfirmation(Payment $payment)
		{

		}

	public function send_LicensePaymentConfirmation($name, $email, $amount, $license, $productId)
        {
            $view = 'license_confirmation';
            $subject = trans('texts.payment_subject');

            if ($productId == PRODUCT_ONE_CLICK_INSTALL) {
                $license = "Softaculous install license: $license";
            } elseif ($productId == PRODUCT_INVOICE_DESIGNS) {
                $license = "Invoice designs license: $license";
            } elseif ($productId == PRODUCT_WHITE_LABEL) {
                $license = "White label license: $license";
            }

            $data = [
                'account' => trans('texts.email_from'),
                'client' => $name,
                'amount' => Utils::formatMoney($amount, 1),
                'license' => $license
            ];

            $this->sendTo($email, CONTACT_EMAIL, CONTACT_NAME, $subject, $view, $data);
        }

    public function send_Notification(User $user, Invoice $invoice, $notificationType, Payment $payment = null)
        {
            if (!$user->email) {
                return;
            }

            $view = 'invoice_'.$notificationType;
            $entityType = $invoice->getEntityType();

            $data = [
                'entityType'    => $entityType,
                'clientName'    => $invoice->client->getDisplayName(),
                'accountName'   => $invoice->account->getDisplayName(),
                'userName'      => $user->getDisplayName(),
                'invoiceAmount' => Utils::formatMoney($invoice->amount, $invoice->client->currency_id),
                'invoiceNumber' => $invoice->invoice_number,
                'invoiceLink'   => SITE_URL."/{$entityType}s/{$invoice->public_id}",
            ];

            if ($payment) {
                $data['paymentAmount'] = Utils::formatMoney($payment->amount, $invoice->client->currency_id);
            }

            $subject = trans("texts.notification_{$entityType}_{$notificationType}_subject", ['invoice' => $invoice->invoice_number, 'client' => $invoice->client->getDisplayName()]);

            $this->sendTo($user->email, CONTACT_EMAIL, CONTACT_NAME, $subject, $view, $data);
        }
}