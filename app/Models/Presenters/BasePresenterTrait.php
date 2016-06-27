<?php namespace App\Models\Presenters;

trait BasePresenterTrait
{
  /**
   *
   *  get previous item
   *  
   *
   */
	public function getPrevious()
    {
        logger()->info(__METHOD__);
        if($this->id != 1){
          return -1;
        }
        return $this->where('id', '<', $this->id)->orderBy('id','asc')->first();
        // User::where('id', '>', $currentUser->id)->min('id');
    }
  /**
   *
   *  get next item
   *  
   *
   */
	public function getNext()
    {
        logger()->info(__METHOD__);
        if($this->id != $this->count()){
          return +1;
        }
        // User::where('id', '<', $currentUser->id)->max('id');
        // check worj or not?
        return $this->where('id', '>', $this->id)->orderBy('id','asc')->first();
    }
  /**
   *
   *  get count
   *  
   *
   */
    public function getCount($type)
    {
        //- getCount from user->item_count
        logger()->info(__METHOD__);
        if(!$type){
          return $this->items()->count()
        }
        return $this->items()->where('type',$type)->count()  
    }
    /**
     *
     *  meta for all pages
     *  
     *  TODO:
     *  - check path
     *  - create list of keywords
     *  - turn this method into service
     */
    public function getMeta($field,$path)
        {
            logger()->info(__METHOD__);

            if($field = 'title'){ 
                return $this->type
                        $this->title 
                        'group'.$this->item->title; 
                         $this->first_name.$this->last_name;
                     }
            if($field = 'description'){
                     return $this->type.$this->description; 
                     'based on '.$this->type;
                     $this['type'];
                     'words about economy and specific for this item';
                 }
            if($field = 'keywords'){ 
                return 'sort by category economy words';
                        'user type keywords';
            }


            $path = 'index/index'
            $path = 'one/one' && in_array($this->type, ['items','tools','materials'])
            $path = 'one/one' && $this->type == 'group'
            $path = 'profile/*'
          }
}
