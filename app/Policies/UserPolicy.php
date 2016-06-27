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
        if(Auth::id() == $user->id)
    	{
    	    return true;
    	}
        throw new \Exception('User wrong author');
    }
}
