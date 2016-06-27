<?php namespace App\Models\User;

use App\Models\Filters\AbstractInterface;

interface UserInterface extends AbstractInterface
{
    public function createUser($data);
    public function updateUser($user,$data);
    
    public function activateUser($code);
    public function checkBanned();
    public function update_last_login();
}

