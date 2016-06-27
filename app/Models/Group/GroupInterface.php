<?php namespace App\Models\Group;

interface GroupInterface 
{
	//create group
	public function storeGroup($group);
	
	//join group by user
	public function GroupChange($group, $user);

	// public function CheckProgress($group);
	// public function set_Group_Info($group);
	// public function assign_Item($group, $data);
	// public function set_Premium($item, $data);
}
