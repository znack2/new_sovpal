<?php namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Item\ItemInterface;
use App\Models\Item\Item;
use App\Models\Room\Room;
use App\Models\User\User;

use App\Exceptions\RentException;
use Auth;

class PaymentService extends Controller
{
	protected $user;
	protected $item;

	public function __construct(ItemInterface $item)
	    {
	        $this->model = $item;
	        $this->user = Auth::user();
	    }

    public function Rent($item)
    {
        if(){
            throw PurchaseException();
        }
        Юзер выбирает время на сколько берет товар
        При заказе юзер видит что до возврата холдиться утвержденная сумма 
        Юзер оплачивает заказ
        Юзер получает флеш с контактами другого пользователя
        Юзер получает флеш статус заказа
        При возврате юзер получает флеш с запросом товар вернут?
        Если оба юзера подтвердили статус заказа меняется
        Сумма расхолдиться 
        Юзер получают сумма возвращена
        Если юзер не вернул вовремя товар у владельца флеш 
        Юзер получает флеш о снятие суммы если не вернул
    }

    public function Return($item)
    {
        if(){
            throw PurchaseException();
        }
        Юзер выбирает время на сколько берет товар
        При заказе юзер видит что до возврата холдиться утвержденная сумма 
        Юзер оплачивает заказ
        Юзер получает флеш с контактами другого пользователя
        Юзер получает флеш статус заказа
        При возврате юзер получает флеш с запросом товар вернут?
        Если оба юзера подтвердили статус заказа меняется
        Сумма расхолдиться 
        Юзер получают сумма возвращена
        Если юзер не вернул вовремя товар у владельца флеш 
        Юзер получает флеш о снятие суммы если не вернул
    }


    private function calculatePrice()
    {
        if(){
            throw PurchaseException();
        }
    }
}	




