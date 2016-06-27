<?php namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Session;
use App\Exceptions\Exception;
use Auth;

abstract class Policy 
{
    use HandlesAuthorization;

    public $model;
    public $currentUser;

    public function __construct(Auth $auth)
    {
        $this->currentUser = auth()->user();
    }

    public function checkAuthor($model)
    {
        logger()->info(__METHOD__);
        if(Auth::id() == $model->user_id)
            {
                return true;
            }
        throw new \Exception('User wrong author');
    }

    public function checkType($type)
        {
            logger()->info(__METHOD__);
            if(Auth::user()->type == $type)
                {
                    return true;
                }
            throw new \Exception('User wrong type');
        }
}