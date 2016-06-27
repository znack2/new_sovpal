<?php namespace App\Models\Presenters;

use App\Models\Item\Item;
use App\Models\_partials\Image;
use DB;
use Carbon\Carbon;

trait GroupPresenterTrait
{
  /**
   *
   *  get group's members
   *  
   *
   */
     public function getMembers()
        {     
          logger()->info(__METHOD__);
          if(!$members = $this->users()){
            throw new Exception();
          }
          return $members->paginate(15);
        }   
/**
   *
   *  get last user's join time
   *  
   *
   */
    public function WhenjoinGroup($user_id)
        {
            logger()->info(__METHOD__);
            if(!$result = DB::connection('mysql')
                    ->table('group_user')
                    ->where('group_id',$this->id)
                    ->where('user_id',$user_id)
                    ->first();){
              throw new Exception();
            }
            return Carbon::parse($result->created_at)->diffForHumans();
        }
    /**
   *
   *  get item for group
   *  
   *
   */
    public function getItem() 
        {
            logger()->info(__METHOD__);
            if(!$item = Item::where('id',$this->item_id)->get()){
              throw new Exception();
            }
            return $item;
         } 
  /**
   *
   *  get item image for group
   *  
   *
   */
    public function getItem_image()
        {
           logger()->info(__METHOD__);
   //      $imagged = Imagged::where('imagged_id',$this->item_id)
       //          ->where('imagged_type','item')
       //          ->first();
       // if($imagged)
       //      {
       //         $image =  Image::find($imagged->id)->get(['url']);  
       //         $result = isset($image) ? $image : 'default'; 
       //      }
       //      return $result;
            return 'default.png';
        }
  /**
   *
   *  get group's expire time
   *
   */
    public function getExpires() 
        {
            logger()->info(__METHOD__);
            if(!$Date = Carbon::parse($this->expires)->diffInDays()){
              throw new Exception();
            }

            if($Date == 1)
              {
                $days = trans('sovpal.days');
              }
            elseif($Date > 1 && $Date < 5)
              {
                $days = trans('sovpal.days2');
              }
            else
              {
                $days = trans('sovpal.days3');
              }
            
            return trans('sovpal.Expire').$Date.$days;
        }         
  /**
   *
   *  get group's user need
   *  
   *
   */
    public function leftUsers() 
        {
        logger()->info(__METHOD__);
        return $this->users() 
          ? trans('sovpal.left').$this->user_need - $this->user_count.trans('sovpal.people')
          : trans('sovpal.complete');
        }

/**
 *
 *
 *  check group's size
 *
 *
 */
    private function CheckGroupSize()
      {
          if(){
            throw new \Exception('Illegal status given: '.$status);
          }
      }
/**
 *
 *
 *  check group's progress
 *
 *
 */
    private function CheckProgress()
      {
        $progress = ($this->model->user_count / $this->model->user_need) * 100;
           $this->model->progress = $progress;
           $this->model->save();

        if($this->model->user_count == $this->model->user_need){   
           $this->model->complete = Carbon::now(); 
           $this->model->save();

            //flash message to all members
            //flash message to shop
            //send all members email contact of shop
            //send shop contact of all members
           return false;
         }
        return true;
      }
}

    