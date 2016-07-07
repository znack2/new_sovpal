<?php namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Item\ItemInterface;
use App\Models\Item\Item;
use App\Models\Room\Room;
use App\Models\User\User;

use App\Exceptions\PurchaseException;
use Auth;

class PurchaseService extends Controller
{
	protected $user;
	$protected $item;
	$protected $group;

	public function __construct(ItemInterface $item)
	    {
	        $this->model = $item;
	        $this->user = Auth::user();
	    }

    public function purchase($item)
    {
    	//check if user want to but array of items
    	if(is_array($item))
    	{

    	}

        if(){
            throw PurchaseException();
        }
        return true;
        Step 1. 
            При покупке юзер выбирает способ доставки
            Юзер выбирает промежуток доставки
            (Сумма доставки добавляется к сумме заказа)
            (Shipping methods and rules)
            Discounts
            Handling charges
            Tax rules
        Step 2. 
            user choose Payment Methods
            Online merchant account Information, Paypal,  e-mail processing
            Shopping Cart Check Out Options
        Step 3.
            Юзер оплачивает
            Юзер получает флеш статус оплаты
            Статус заказа меняется на оплачен
            Юзер получает флеш в день доставки
            Юзер получает смс(опция)
            Юзер получает контакты (если покупка услуги)
    }   

    public function purchaseGroup($group)
    {
    	//check if group want to but array of items
        if(){
            throw PurchaseException();
        }
        return true;
        К заказу добавляется сумма доставки поделённая на количество участников
        юзер выбирает только промежуток доставки
        Цена доставки не фиксированная зависит от количества участников 
        Количество участников в промежутке является коэффициент доставки
        При выборе 50% группы промежуток остальные получают флеш поменять 
        При перемене промежутка сумма доставки у всех меняется
        Окончательная цена доставки утверждается в конце 
        если скидка остаток возвращается (узнать можно ли расхлодить часть)
        Оплата холдиться на срок создания группы
        Если группа не собирается деньги расхолдятся
        каждый участник получает флеш не хочет ли он купить в розницу
        каждый участник получает флеш группа не завершена
        Каждый участник группы получает флеш если юзер вступает в группу
        Каждый участник группы получает флеш когда группа завершена
        Магазин получает список участников с контактами 
    }

    private function Take($material)
    {
        if(){
            throw PurchaseException();
        }
        return true;
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

    }
}	




