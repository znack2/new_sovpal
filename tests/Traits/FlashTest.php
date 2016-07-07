<?php namespace App\Tests\Traits;

trait FlashTest
{
  	protected $flash;

    public function see_Welcome_as_Owner($page,$type)
        {
            $this->visit_as_Owner();

            $this->visit('/index/'.$page.'?type='.$type);

            if($page == 'items' && $type == 'items') {
                $message = '';
            } elseif($page == 'items' && $type == 'tools') {
                $message = '';
            } elseif($page == 'items' && $type == 'materials') {
                $message = '';
            } elseif($page == 'users' && $type == 'shops') {
                $message = '';
            } elseif($page == 'users' && $type == 'owners') {
                $message = '';
            } elseif($page == 'users' && $type == 'profis') {
                $message = '';
            } elseif($page == 'groups' && $type == 'items') {
                $message = '';
            } elseif($page == 'groups' && $type == 'users') {
                $message = '';
            } else {
                $message = 'Guest visit';
            }
            $this->see($message);
        } 

    public function see_Welcome_as_Shop($page,$type)
        {
            $this->visit_as_Owner();

            $this->visit('/index/'.$page.'?type='.$type);

            if($page == 'items' && $type == 'items') {
                $message = '';
            } elseif($page == 'items' && $type == 'tools') {
                $message = '';
            } elseif($page == 'items' && $type == 'materials') {
                $message = '';
            } elseif($page == 'users' && $type == 'shops') {
                $message = '';
            } elseif($page == 'users' && $type == 'owners') {
                $message = '';
            } elseif($page == 'users' && $type == 'profis') {
                $message = '';
            } elseif($page == 'groups' && $type == 'items') {
                $message = '';
            } elseif($page == 'groups' && $type == 'users') {
                $message = '';
            } else {
                $message = 'Guest visit';
            }
            $this->see($message);
        } 

    public function see_Welcome_as_Profi($page,$type)
        {
            $this->visit_as_Owner();

            $this->visit('/index/'.$page.'?type='.$type);

            if($page == 'items' && $type == 'items') {
                $message = '';
            } elseif($page == 'items' && $type == 'tools') {
                $message = '';
            } elseif($page == 'items' && $type == 'materials') {
                $message = '';
            } elseif($page == 'users' && $type == 'shops') {
                $message = '';
            } elseif($page == 'users' && $type == 'owners') {
                $message = '';
            } elseif($page == 'users' && $type == 'profis') {
                $message = '';
            } elseif($page == 'groups' && $type == 'items') {
                $message = '';
            } elseif($page == 'groups' && $type == 'users') {
                $message = '';
            } else {
                $message = 'Guest visit';
            }
            $this->see($message);
        } 


  	public function seeValidationFlash($message)
  	{
  		$this->see($message)
  	}

  	public function seePolicyFlash($message)
  	{
  		$this->see($message)
  	}

    public function seeNotFoundFlash($message)
    {
        $this->see($message)
    }

  	public function see_success_Flash($message)
  	{
  		$this->see($message)
  	}

    public function see_Error_form(array $data)
        {
          foreach($data as $field){
            $this->see($field.' must be a valid');
          }
        } 


    public function see_Empty_form(array $data)
        {
          foreach($data as $field){
            $this->see($field.' field is required');
          }
        } 
}