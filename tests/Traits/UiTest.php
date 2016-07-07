<?php

trait UiTest
{
    public function seeHeader()
    {
      $this->see(trans('sovpal.forms.Register_title'))
           ->seeElement("[name='email']")
           ->seeElement("[name='email']")
           ->seeElement("[name='email']")
    } 

    public function seeProfile_Dropdown()
    {
      $this->seeElement("[name='email']")
           ->seeElement("[name='email']")
           ->seeElement("[name='email']")
    }   

    public function seeMenu($type)
  	{
      if($type == 'index'){
        $menus = [];
      } elseif($type == 'profile'){
        $menus = [];
      } else {
        $menus = [];
      }

      foreach($menus as $menu){
        $this->see($menu)
      }
  	}

  	public function seeFooter()
  	{
  		$this->seeElement("[name='email']")
           ->seeElement("[name='email']")
           ->seeElement("[name='email']")
  	}

    public function seeSidebar($type)
    {
      if($type == 'index'){
        $menus = [];
      } elseif($type == 'profile'){
        $menus = [];
      } else {
        $menus = [];
      }
    }

    public function seeDialog()
    {
      $this->seeElement("[name='email']")
           ->seeElement("[name='email']")
           ->seeElement("[name='email']")
    }

    public function seePagination()
    {
      $this->seeElement("[name='email']")
           ->seeElement("[name='email']")
           ->seeElement("[name='email']")
    }

    public function seeBlog()
    {
      $this->seeElement("[name='email']")
           ->seeElement("[name='email']")
           ->seeElement("[name='email']")
    }

    public function seeList($type)
    {
      if($type == 'index'){
        $menus = [];
      } elseif($type == 'profile'){
        $menus = [];
      } else {
        $menus = [];
      }
    }

    public function see_form(array $data)
        {
          foreach($data as $field){
            $this->seeElement("[name='email']")
          }   
        } 

//providers

//presenters

//helpers

}


