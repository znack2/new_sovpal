<?php namespace App\Models\Presenters;

use Carbon;

trait ItemPresenterTrait
{   
/**
 *
 *  get closed Group for item
 *
 */
    public function getCLosedGroup() 
        {
            logger()->info(__METHOD__);
            if(count($this->groups()->get()) == 0){
              throw new Exception(); //send NoGroupYet
            }
              return trans('sovpal.closeGroup') . $this->groups()->where('active','true')
                        ->whereBetween('expires', [Carbon::now(),Carbon::now()
                        ->addMonth(1)])
                        ->get(['expires']);
        }
/**
 *
 *  get item's how_long
 *
 */
    public function returnDate()
        {
            logger()->info(__METHOD__);
            if(!$this->users()){
              throw new Exception();//send FreeToOrder
            }
            $how_long = $this->users()->last()->pivot->how_long;
            return trans('sovpal.returnDate').Carbon::parse($how_long)->diffInDays();
        }
/**
 *
 *  get item's qty left
 *
 */
    public function leftMaterials()
        {
            logger()->info(__METHOD__);
            if($default_qty = $this->qty && $this->users()->first()){
              throw new Exception(); //$default_qty;
            }
            $take_qty = $this->users()->last()->pivot->qty;
            return $default_qty - $take_qty;
        }
}

    