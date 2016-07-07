<?php namespace App\Services\MAIL;

class CssInlinerPlugin implements \Swift_Events_SendListener
{
    protected $inliner;

    public function __construct()
    {
        $this->inliner = new \Pelago\Emogrifier();
        $this->inliner->disableInvisibleNodeRemoval();
    }

    public function beforeSendPerformed(\Swift_Events_SendEvent $evt)
    {
        $message = $evt->getMessage();

        if ($message->getContentType() === 'text/html' || ($message->getContentType() === 'multipart/alternative' && $message->getBody())) {
            $this->inliner->setHtml($message->getBody());
            $message->setBody($this->inliner->emogrify());
        }

        foreach ($message->getChildren() as $part) {
            if (strpos($part->getContentType(), 'text/html') === 0) {
                $this->inliner->setHtml($part->getBody());
                $message->setBody($this->inliner->emogrify());
            }
        }
    }

    public function sendPerformed(\Swift_Events_SendEvent $evt)
    {
        // Do Nothing
    }
}