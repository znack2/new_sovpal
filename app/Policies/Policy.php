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
            if($this->currentUser->id != $model->user_id)
                {
                    throw new \Exception('User wrong author');
                }
            return true;
        }

    public function checkType($type)
        {
            logger()->info(__METHOD__);
            if($this->currentUser->type != $type)
                {
                    throw new \Exception('User wrong type');
                }
            return true;
        }

    public function checkGroup($group)
        {
            logger()->info(__METHOD__);
            if($this->currentUser->whereHas('join_groups', function($query) use($group) {
                $query->where('group_id', $group->id);
            })->get())
                {
                    throw new \Exception('User wrong type');
                }
            return true;
        }

}