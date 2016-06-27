<?php namespace App\Models\Presenters;

trait RoomPresenterTrait
{
/**
 *
 *  Get room's Name
 *
 */
    public function getRoomName()
        {
            logger()->info(__METHOD__);
            if($this->type == 'room'){
              throw new Exception(); //reponse $this->name
            }
            return $this->tags()->where('type','room')->first()->name;
        }
/**
 *
 *  check if room complete
 *  
 *  TODO:
 *  - remove image is exist
 *
 */
    private function check_Complete($item,$data){
        $request->has('complete')){   $room->complete = e($request['complete']);
    }
}

    