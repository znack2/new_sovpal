<?php namespace App\Http\Controllers;

//request
use Illuminate\Http\Request;
use App\Http\Requests\RoomRequest;
//output
use App\Http\Controllers\Controller;
//repo
use App\Models\Room\RoomInterface;
use App\Models\Room\Room;
use App\Models\User\User;
use App\Models\_partials\Element;

/*********************************************************************

                room --- ( Index - STORE - UPDATE - DELETE  ) 

**********************************************************************/


class RoomController extends Controller
{
	public function __construct( RoomInterface $room)
	    {
	        $this->model = $room;
	    }
      
/**
 *
 * index rooms
 *
 */
  public function index()
    {
      logger()->info(__METHOD__);
       try {
            $data['items'] = $this->model->Filter();           
            return view('index/main',compact($data));
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    }
/**
 *
 *  store Room
 *  ? inject Room $room ?
 *
 */
  public function store(RoomRequest $request)
    {
        logger()->info(__METHOD__);
         try {
            $data = $this->model->storeRoom();          
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    }
/**
 *
 *  update room
 *  
 *  TODO:
 *  - remove User $user ?
 *
 */
	public function update(RoomRequest $request,User $user,Room $room)       
	   {   
        logger()->info(__METHOD__);
         try {
            $data = $this->model->storeRoom($room);          
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        } 
	   }
/**
 *
 *  remove Room
 *  
 *  TODO:
 *  - remove User $user ?
 *
 */
  public function destroy(User $user,Room $room)         
    {
        logger()->info(__METHOD__);
         try {
            $data =  $this->model->deleteModel($room);         
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    } 
/**
 *
 *  add element into room
 *  section = profile menu (settings/items/groups/rooms)
 *  
 *  TODO:
 *  - remove User $user ?
 *  - in view add room_id to form url
 *  - in view add element_id to form url
 * 
 *
 */
  public function AddElement(User $user,Room $room,Element $element)        
      {
         logger()->info(__METHOD__);
          try {
            $data =  $this->model->addModel($room,'elements',$element);
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
      }  
/**
 *
 *  remove ELement
 *  
 *  TODO:
 *  - remove User $user ?
 *
 */
  public function RemoveElement(User $user,Room $room,Element $element)      
     {
        logger()->info(__METHOD__);
        try {
            $data =  $this->model->removeModel($room,'elements',$element);
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
     }  
}   

