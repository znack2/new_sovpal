<?php namespace App\Models\Traits;

use App\Models\_partials\Address;

trait UserTrait
{
/**
 *
 *  Activate user by code
 *
 */
    public function activateUser($code){
        logger()->info(__METHOD__);
        if(!$code) {
            throw new UserBannedException;
        }
        $user               = $this->model->where('activation_code', $code)->firstOrFail();
        $user->activated_at = Carbon::now();
        $user->active       = true;
        $user->token        = null;
        $user->save();
        return false;
    }
/**
 *
 *  check Banned user
 *  
 */
    public function checkBanned(){
        logger()->info(__METHOD__);
        if($this->currentUser->banned) {
            throw new UserBannedException;
        }
        return false;
    }
/**
 *  
 *  Update last login
 *
 */
    public function update_last_login(){
        logger()->info(__METHOD__);
        if($this->currentUser->banned) {
            throw new UserBannedException;
        }
        $this->currentUser->last_login = Carbon::now();
        $this->currentUser->save();
        Session::put('currentUser',$this->currentUser);
        return true;

    }
}
