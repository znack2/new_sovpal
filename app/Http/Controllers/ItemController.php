<?php namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Item\ItemInterface;
use App\Models\Item\Item;
use App\Models\Room\Room;
use App\Models\User\User;

use App\Services\PurchaseService;
use App\Services\RentService;

use App\Exceptions\PurchaseException;
use App\Exceptions\RentException;
use Exceptions\PolicyException;

class ItemController extends Controller
{
  protected $PurchaseService;
  protected $RentService;

	public function __construct(PurchaseService $purchase,RentService $purchase, ItemInterface $item)
	    {
          $this->PurchaseService = $purchase;
          $this->RentService = $rent;
	        $this->model = $item;
	    }
/**
 *
 *  index Items
 *
 */
  public function index(IndexRequest $request)
    {
        try {
            $data['items'] = $this->model->Filter($request);
            return view('index/main',compact($data));
        } catch (NotFoundException $e) {
            flash('NotFound','error'); 
            return redirect()->back();
        }
    }
/**
 *
 *  show item
 *
 */
  public function show(Item $item)
    { 
         return view('one/main',compact(['data'=>$item]));
    } 
/**
 *
 *  store item
 *  
 */
  public function store(ItemRequest $request)
    {
        try{
            $this->authorize('store', $item);
            $this->currentUser->storeItem($request);          
            return flash('Item successfully has been stored','success');
        }
        catch(PolicyException $e){
            return flash($e->getMessage(),'error');
        }
    }
/**
 *
 *  update item
 *  
 */
  public function update(ItemRequest $request,Item $item)    
  {   
      try{
          $this->authorize('update', $item);
          $this->currentUser->storeItem($request, $item);          
          return flash('Item successfully has been updated','success');
      }
      catch(PolicyException $e){
        return flash($e->getMessage(),'error');
      }
   }
/**
 *
 *  destroy item 
 *  
 */
  public function destroy(Item $item)        
     {
        try{
           $this->authorize('destroy', $item);
           $this->currentUser->deleteModel($item);         
           return flash('Confirm','success');
        }
        catch(PolicyException $e){
          return flash($e->getMessage(),'error');
        }
     }    
/**
 *
 *  purchase item 
 *  
 */
  public function purchase(Item $item)
    {
        try{
          $this->authorize('purchase', $item);
            $this->PurchaseService->Purchase($item);
            return flash('Confirm','success');
        }
        catch(PolicyException $e){
            return flash($e->getMessage(),'error');
        }        
        catch(PurchaseException $e){
            return flash($e->getMessage(),'error');
        }
    }
/**
 *
 *  rent item 
 *  
 */
  public function rent(Item $item)
    {
        try{
          $this->authorize('purchase', $item);
          $this->RentService->Rent($item);
            return flash('Confirm','success');
        }
        catch(PolicyException $e){
            return flash($e->getMessage(),'error');
        }        
        catch(RentException $e){
            return flash($e->getMessage(),'error');
        }
    }
/**
 *
 *  return tool 
 *  
 */
  public function return(Item $item)
    {
        try{
            $this->authorize('remove', $item);
            $this->RentService->return($item);     
            return flash('Confirm','success');
        }
        catch(PolicyException $e){
            return flash($e->getMessage(),'error');
        }
        catch(RentException $e){
            return flash($e->getMessage(),'error');
        }
    }
}
