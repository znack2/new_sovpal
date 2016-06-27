<?php namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Item\ItemInterface;
use App\Models\Item\Item;
use App\Models\Room\Room;
use App\Models\User\User;

/*********************************************************************

                item --- ( index/show - STORE - UPDATE - DELETE ) 

**********************************************************************/

class ItemController extends Controller
{
	public function __construct(ItemInterface $item)
	    {
	        $this->model = $item;
	    }
/**
 *
 *  index Items
 *
 */
  public function index()
    {
      logger()->info(__METHOD__);
       try {
            $data['items'] = $this->model->Filter();
            flash(trans('sovpal.flash.Confirm'),'success');           
            return view('index/main',compact($data));
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    }
/**
 *
 *  show item
 *
 */
  public function show(Item $item)
    { 
      logger()->info(__METHOD__);
         try {
           // if(is_null($item)) {abort('404'); }
            $data = $this->model->byId();
            flash(trans('sovpal.flash.Confirm'),'success');          
            return view('one/main',compact($data));
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    } 
/**
 *
 *  store item
 *  
 *  TODO:
 *  - inject Room $room ( shop can add item in catalogs / owner dont need it ? )
 */
  public function store(ItemRequest $request)
    {
      logger()->info(__METHOD__);
         try {
            $data = $this->model->storeItem();          
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    }
/**
 *
 *  update item
 *  
 */
  public function update(ItemRequest $request,Item $item)    
   {   
      logger()->info(__METHOD__);
         try {
            $data =  $this->model->storeItem($item);          
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
   }
/**
 *
 *  destroy item ( for shops or if item->type == tool/mat )
 *  
 *  TODO:
 *  - fix destroy form url in view ( owner removes item by addOrRemove method )
 */
  public function destroy(Item $item)        
     {
      logger()->info(__METHOD__);
         try {
            $data =  $this->model->deleteModel($item);         
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
     }    
/**
 *
 *  add or remove item ( for owners )
 *  
 *  TODO:
 *  - check user_id = item->id in repo
 *  - owner add item in room ( inject Room $room )
 */
  public function add(Item $item)
    {
      logger()->info(__METHOD__);
         try {
            $data =  $this->model->addModel($this->currentUser,'orders',$item);         
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400); 
        }
    }
/**
 *
 *  add or remove item ( for owners )
 *  
 *  TODO:
 *  - check user_id = item->id in repo
 *  - owner add item in room ( inject Room $room )
 */
  public function remove(Item $item)
    {
        logger()->info(__METHOD__);
         try {
            $data =  $this->model->removeModel($this->currentUser,'orders',$item);     
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    }
}
