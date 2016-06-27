<?php namespace App\Services;

use Illuminate\Session\Store;

class SessionStore 
{
    private $session;

    function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function flash($name, $data)
    {
        $this->session->flash($name, $data);
    }
    
}