<?php namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Item\ItemInterface;
use App\Models\Item\Item;
use App\Models\Room\Room;
use App\Models\User\User;
use App\Exceptions\HireException;
use Auth;

class HireService extends Controller
{
	protected $user;
	protected $item;
	protected $group;

	public function __construct(ItemInterface $item)
	    {
	        $this->model = $item;
	        $this->user = Auth::user();
	    }

    public function Hire($user)
    {
        //check if group want to but array of items
        if(){
            throw HireException();
        }
        return true;
    }

    public function Fire($user)
    {
    	//check if group want to but array of items
        if(){
            throw HireException();
        }
        return true;
    }

    private function calculatePrice()
    {
        if(){
            throw HireException();
        }
        return true;
    }
}	




