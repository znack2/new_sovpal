<?php namespace App\Policies;

use App\Models\User\User;
use App\Models\Room\Room;
use Auth;

class UserPolicy extends Policy
{
    public function __construct(User $user)
        {
            $this->model = $user;
        }

    public function update($user)
        {
            logger()->info(__METHOD__);
            if($this->currentUser->id == $user->id)
        	{
        	    throw new \Exception('User wrong author');
        	}
            return true;
        }
}
