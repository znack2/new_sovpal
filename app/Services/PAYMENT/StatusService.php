<?php namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Item\ItemInterface;
use App\Models\Item\Item;
use App\Models\Room\Room;
use App\Models\User\User;
use Exception;

class StatusService extends Controller
{
   const STATUS_NEW = 'new';
   const STATUS_PENDING = 'pending';
   const STATUS_DEPOSIT = 'deposit';
   const STATUS_RECEIPTED = 'receipted';
   const STATUS_CLOSED = 'closed';
   const STATUS_CANCELLED = 'cancelled';

   public function __construct(ItemInterface $item)
	    {
	        $this->model = $item;
	        
	    }
	    
}	

