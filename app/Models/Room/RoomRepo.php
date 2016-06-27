<?php namespace App\Models\Room;

use App\Exceptions\Exceptions;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;

use App\Models\Room\Room;
use App\Models\Room\RoomInterface;
use App\Models\Filters\AbstractRepo;

// RepositoryFoundException
/*********************************************************************

                ( Room )

**********************************************************************/

class RoomRepo extends AbstractRepo implements RoomInterface
{
    public function __construct(Room $room)
      {
          $this->model = $room;
      }
/**
 *
 *  create new room
 *  
 *  TODO:
 *  - check room complete
 *  - assign type_tag
 *  - assign style_tag
 *  - assign work_tag
 *  - set Room Info
 *
 */
    public function storeRoom($room = null)
      {
          $data = $this->filters;

          DB::beginTransaction();
       
          try {
              $room = isset($room) 
                  ? $this->checkComplete($room,$data);
                  : DB::table('rooms')->insert();

              isset($room) ?: $this->addModel($room,'user',$this->currentUser);
              isset($room) ?: $this->assign_Item($room,$data);
              
              $this->set_Basic_Info($room, $data);
              $this->set_Image($room, $data);
              $this->set_Private($room);
              $room->push();
              return 'Room' . $room->title .' successfully has been'. isset($room) ? 'updated' : 'stored';//completed
          } catch(ValidationException $e)
          {
              DB::rollback();
              return redirect()
                    ->back()
                    ->withErrors( $e->getErrors() )//'error' => $e->getMessage()
                    ->withInput();
          } catch(\Exception $e)
          {
              DB::rollback();
              throw $e;
          } catch( Exception $e)
          {
            return 'You can not update group if user already join';
          }
          DB::commit();
      }

/**                  
 *
 *  set Extra Info for item
 *  
 *
 */
    private function Set_Basic_Info($item,$data){
      switch ($this->currentUser->type) {
        case 'owner':$type = 'room';
          break;   
        case 'profi':$type = 'project';
          break;   
        case 'shop': $type = 'folder';
          break;
      }

      $room->type = $type;
       $room->start_remont     = e($data['start_remont']); } 
       $room->end_remont       = e($data['end_remont']); } 
       $room->area             = e($data['area']); }
       return $item;
    }
/**
 *
 *  set Image for item
 *  
 *  TODO:
 *  - remove image is exist
 *
 */
    private function set_Image($item,$data){
          if($request->has('image'))
              {
                $this->removeImage($item,'item');
              } 
          if($request->hasFile('image'))
            {
              $image = $this->saveImage('items','items',$request->file('image'));
              $this->addImage($item,$request->file('image'),'item','cover_for_item_'.$item->title);
            }
    }
/**
 *
 *  set Image for item
 *  
 *  TODO:
 *  - remove image is exist
 *
 */
    private function set_Private($item,$data){
       if($this->request->has('private')) {
            $item->private =  e($request->input('private'));
            $item->save();
          }
          if($request->has('private')) {           $item->title            = e($request->input('private')); }
    }
/**
 *
 *  set Image for item
 *  
 *  TODO:
 *  - remove image is exist
 *
 */
    private function assign_Tags($item,$data){
      if($request->has('style'))
        {
          $tag = $room->tags()->where('type','style')->first();
          $this->removeModel($room,'tag',$tag);
        }                
      if($request->has('work'))
        {
          $tag = $room->tags()->where('type','work')->first();
          $this->removeModel($room,'tag',$tag);
        }                
      if($request->has('room'))
        {
          $tag = $room->tags()->where('type','room')->first();
          $this->removeModel($room,'tag',$tag);
        }
       $this->addTag($room,$request);
    }
}