<?php namespace App\Models\Group;

class GroupRepo extends AbstractRepo implements GroupInterface
{
   

   public function storeGroup()
      {
          try {
              $group = isset($group) 
                  ? $this->CheckProgress($group) 
                  : DB::table('groups')->insert();

              isset($group) ?: $this->addModel($group,'user',\Auth::user()); // change to assign_User($group,$user)
              isset($group) ?: $this->assign_Item($group,$data);
              
              $this->set_Basic_Info($group, $data);
              $this->set_Image($group, $data);
              $this->set_Premium($group,$data);
              $group->push();
              return 'Group for ' . $group->item->title .' successfully has been'. isset($group) ? 'updated' : 'stored';
      }    

   public function GroupChange($user)
      {     

        //add method checkUserCount()
        //add $method = $user is instanceof User ? 'save' : 'saveMany';
        //add $this->users()->$method($user);

        if(!$this->model->checkJoin($user)){
          $this->addModel($user,'join_groups',$this->model);
          $message = 'You have been successfully joined to group';
        }
        else{
          $this->removeModel($user,'join_groups',$this->model);
          $message = 'You have been successfully withdrown from group';
        }
      
        $this->CheckProgress($this->model);

        $this->saveModel($this->model);
        $this->saveModel($user);
       
        return $message;
      } 

   private function CheckProgress()
      {
        $progress = ($this->model->user_count / $this->model->user_need) * 100;
        $this->model->progress = $progress;
        return $this->model;

        if($this->model->user_count == $this->model->user_need){   
           $this->model->complete = Carbon::now(); 
         } 

        if($this->model->user_count == $this->model->user_need)
          {
            return $this->model->complete = 'true';
          }
          return $this->model;
      }

   private function set_Group_Info()
      {
            switch (\Auth::user()->type) {
              case 'owner':$type = 'remont';
                break;   
              case 'profi':$type = 'project';
                break;   
              case 'shop': $type = 'purchase';
                break;
            }
            $this->model->type = $type;
            $this->model->price     = e($request['price']) ?: null;  
            $this->model->user_need = e($request['user_need']) ?: null; 
            $this->model->expires   = date("Y-m-d",strtotime($request['expires'])) ?: null; 

            return ;
      }

   private function assign_Item($data)
      {
        if($this->model->complete == false && $this->model->active == false)
          {
            if($request->has('item'))
                {
                  $item = Item::find($request['item']);
                  $this->addModel($this->model,'item',$item);
                }

          if($request->has('item'))
              {
                $item = Item::find($data('item'));
                $element = Element::find($item->element_id);
                $this->decrementModel($item,'element',$element);
              }   
          }
     return ; 
    }

  private function set_Premium($item,$data){
            //if user->role = premium
      if($request->has('premium'))
        {
          $group->premium  = e($request['premium']); 
        }
      return ;
  }
}   