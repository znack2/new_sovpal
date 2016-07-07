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

use Exception;
use Exceptions\PolicyException;

class RoomController extends Controller
{
	public function __construct( RoomInterface $room)
	    {
	        $this->model = $room;
	    }
/**
 *
 *  index rooms
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
 *  show room
 *
 */
  public function show(Room $room)
    { 
         return view('one/main',compact(['data'=>$room]));
    } 
/**
 *
 *  store room
 *  
 */
  public function store(RoomRequest $request)
    {
        try{
            $this->authorize('store', $room);
            $this->currentUser->storeRoom($request);            
            return flash('Room' . $room->title . 'successfully has been stored','success');
        }
        catch(PolicyException $e){
            return flash($e->getMessage(),'error');
        }
    }
/**
 *
 *  update room
 *  
 */
  public function update(RoomRequest $request,Room $room)    
  {   
      try{
          $this->authorize('update', $room);
          $this->currentUser->storeRoom($request, $room);          
          return flash('room successfully has been updated','success');
      }
      catch(PolicyException $e){
        return flash($e->getMessage(),'error');
      }
   }
/**
 *
 *  destroy room 
 *  
 */
  public function destroy(room $room)        
     {
        try{
           $this->authorize('destroy', $room);
           $this->currentUser->deleteModel($room);         
           return flash('Confirm','success');
        }
        catch(PolicyException $e){
          return flash($e->getMessage(),'error');
        }
     }    
/**
 *
 *  add element 
 *  
 */
  public function AddElement(Room $room,Element $element)
    {
        try{
          $this->authorize('join', $room);
          $this->model->addModel($room,'elements',$element);   
          return flash('Confirm','success');
        }
        catch(PolicyException $e){
          return flash($e->getMessage(),'error');
        }
    }
/**
 *
 *  remove element 
 *  
 */
  public function RemoveElement(Room $room,Element $element)
    {
        try{
            $this->authorize('withdrow', $room);
            $this->model->removeModel($room,'elements',$element);    
            return flash('Confirm','success');
        }
        catch(PolicyException $e){
            return flash($e->getMessage(),'error');
        }
    }
}