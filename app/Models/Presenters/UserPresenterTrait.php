<?php namespace App\Models\Presenters;

trait UserPresenterTrait
{
  /**
   *
   * get user's level 
   * TODO:develop
   */
  public function getLevel()
        {
            logger()->info(__METHOD__);
            if($this->type == 'owner')
                {
                    switch ($this->level) {
                        case '1': $level = 'novice1';    
                            break;           
                        case '2': $level = 'novice2';    
                            break;           
                        case '3': $level = 'novice3';    
                            break;           
                        case '4': $level = 'novice4';    
                            break;                  
                        case '5': $level = 'novice5';    
                            break;                  
                        case '6': $level = 'novice6';    
                            break;                  
                        case '7': $level = 'novice7';    
                            break;              
                        case '8': $level = 'novice8';    
                            break;              
                        case '9': $level = 'novice9';  
                            break;                 
                        default:  $level = 'novice';     
                            break;
                        }
                }
            return trans('sovpal.'.$level);
        }
  /**
   *
   *  get user's full name 
   *  
   *
   */
	public function getFullName()
	    {
        logger()->info(__METHOD__);
        if($fullname = $this->first_name . ' ' . $this->last_name){
          throw new Exception();
        }
	    	return $fullname; 
	        // $profile = $this->entity->profile;
	        // if (! is_null($profile) && ! empty($profile->name)) {
	        //     return $profile->name;
	        // }
	        // return $this->entity->username;
	    }
  /**
   *
   *  get user's last actions
   *  
   *
   */
    public function getRecentActions($field)
        {
            logger()->info(__METHOD__);
            if(\Carbon\Carbon::parse($this->$field)->diffForHumans()){
              throw new Exception();
            }
            return  $field == 'updated_at' ? trans('sovpal.hasBeenUpdated') . $date : trans('sovpal.NoUpdates');

            // if (count($items) == 0) {return 'No activity';}
            // $collection = $items->getCollection();
            // $sorted     = $collection->sortBy(function ($trick) {
            //     return $trick->created_at;
            // })->reverse();
            // $last = $sorted->first();
            // return $last->created_at->diffForHumans();
        }
  /**
   *
   *  get user's gender
   *  
   *
   */
    public function getGender()
        {
            logger()->info(__METHOD__);
            if($this->gender == 0){
              return 'male';
            }
              return 'female';
        }
  /**
   *
   *  get user's address 
   *  
   *
   */
    public function getAddress()
        {
          logger()->info(__METHOD__);
          if(!$address = $this->addresses->first())
          {
              throw new Exception(); // return 'no Address';
          }
          return  $address->street .' '. $address->house .'/'. $address->corpus;
        }
  /**
   *
   *  get user's contact
   *  
   *
   */
    public function getPurchaseContact($user)
        {
           logger()->info(__METHOD__);
            //get all join_groups of currentUser
            //get all groups of user
            //check similar id
            if($user->groups()->count() && $this->join_groups()->count())
            {
                $owner_groups = $user->groups->lists('id');
                $join_groups  = $this->join_groups->lists('id');
                return (count(array_intersect($criminals, $people))) ? true : false;
            }
            return false;
        }
/**
*
*  check if user has groups 
*  
*
*/
    public function hasGroups() 
        { 
          logger()->info(__METHOD__);
          if(!$count = count($this->groups) > 0)
          {
              throw new Exception(); //response no groups
          }
          return $count; 
        }
/**
*
*  check if user already join
*  
*
*/
    public function checkJoin($user)
        {
            logger()->info(__METHOD__);
            if(!$members = $this->users()->get()){
              throw new Exception();
            }
            return $users->contains($user->id) 
              ? true 
              : false;
        }  
/**
 *
 *  Check if already add
 *
 *
 */
    public function checkAdd($user)
        {
            logger()->info(__METHOD__);
            if(!$this->users()->get()->contains($user->id)){
              throw new Exception();
            }
            return false;
             // $exist = $this->users()->whereHas('items', function($query) use($user) {
             //     $query->where('user_id', $user->id);})->get();
        } 
}

    