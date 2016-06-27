<?php namespace App\Policies;

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
            if(!$this->checkType('shop'))
                {
                    throw new \Exception('User can not store group');
                }
            return true;
        }

    public function update($group)
        {
            logger()->info(__METHOD__);
            if(!$this->checkAuthor($group))
                {
                    throw new \Exception('User can not update this group');
                }
            return true;
        }

    public function join($group)
        {
            logger()->info(__METHOD__);
            if(!$this->checkGroup($group))
                {
                    throw new \Exception('User can not join the same group again');
                }
            return true;
        }

    public function withdrow($group)
        {
            logger()->info(__METHOD__);
            if($this->checkGroup($group))
                {
                    throw new \Exception('User can not withdrow from not his group');
                }
            return true;
        }

    public function destroy($group)
        {
            logger()->info(__METHOD__);
            if(!$this->checkAuthor($group))
                {
                    throw new \Exception('User can not destroy this group');
                }
            return true;
        }
}


