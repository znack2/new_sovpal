<?php namespace App\Policies;

use Auth;
use App\Models\Group\Group;

class GroupPolicy extends Policy
{
    public function __construct(Group $group)
    {
        $this->model = $group;
    }

    public function store()
    {
        logger()->info(__METHOD__);
        return $this->checkType('shop');
    }

    public function update($group)
    {
        logger()->info(__METHOD__);
        return $this->checkAuthor($group);
    }

    public function join($group)
    {
        logger()->info(__METHOD__);
        $exist = Auth::user()->whereHas('join_groups', function($query) use($group) {
            $query->where('group_id', $group->id);
        })->get();

        if(!$exist)
            {
                return true;
            }
        throw new \Exception('User can not join the same group again');
    }

    public function withdrow($group)
    {
        logger()->info(__METHOD__);
        $exist = Auth::user()->whereHas('join_groups', function($query) use($group) {
            $query->where('group_id', $group->id);
        })->get();

        if($exist)
            {
                return true;
            }
        throw new \Exception('User can not withdrow from not his group');
    }

    public function destroy($group)
    {
        logger()->info(__METHOD__);
        return $this->checkAuthor($group);
    }
}


