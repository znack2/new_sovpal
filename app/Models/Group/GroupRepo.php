<?php namespace App\Models\Group;

use App\Exceptions\Exceptions;
use Illuminate\Support\Facades\Config;

use App\Models\Group\Group;
use App\Models\Item\Item;
use App\Models\_partials\Element;
use App\Models\Group\GroupInterface;
use App\Models\Filters\AbstractRepo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;


class GroupRepo extends AbstractRepo implements GroupInterface
{
  // protected $expires = 259200;
  
   public function __construct(Group $group)
      {
          $this->model = $group;
      }
/**
 *
 *  create new group
 *  TODO:
 *  - check progress group
 *  - assing User
 *  - assign item
 *  - set Group Info
 *  - set Image
 *  - set Premium
 *         // dd($request['price'.$request['model_id']]);
*          // preg_replace('/[^a-zA-Z]/', '', $request);
 *
 */
   public function storeGroup($data, $group = null)
      {
          DB::beginTransaction();
       
          try {
              $group = isset($group) ? $this->CheckProgress($group) : DB::table('groups')->create();
              $this->assign_User($group, $user);
              $this->assign_Item($data);
              $this->set_Info($group, $data);
              $this->set_Image($data);
              $this->set_Premium($group);
              $group->push();
              return true;
          } catch(\Exception $e)
          {
              DB::rollback();
              throw $e;
          }
          DB::commit();
      }    
/**
 *
 *  join group
 *  
 *
 */
 public function JoinGroup($user)
      {     
        if($this->CheckProgress()){
            $user is instanceof User ? 'save' : 'saveMany';
            $this->users()->$method($user);
        }
        return $this->message = 'You have been successfully joined to group';
      }  
/**
 *
 *  withdrow from group
 *  
 *
 */
  public function WithdrowFromGroup($user)
      {     
        $user->groups()->where('group_id',$this->model->id)->update(['group_id'=>null]);
        return $this->message = 'You have been successfully withdrown to group';
      } 
/**
 *
 *  withdrow from group
 *  
 *
 */
  public function RestartGroup()
      {     
        //remove group_id from pivot table
        $this->users()->update(['group_id'=>null]);
        return $this->message = 'You have been successfully withdrown to group';
      }
/**
 *
 *
 *  check progress
 *
 *
 */
  public function RemoveManyUsers($users)
      {
           return $this->users()
                       ->whereIn('id', $users->pluck('id'))
                       ->update(['team_id'=>null]);
      } 
/**
 *
 *  set Info
 *
 *
 */
   private function set_Info()
      {
            switch (\Auth::user()->type) {
              case 'owner': $type = 'remont';
                break;   
              case 'profi': $type = 'project';
                break;   
              case 'shop' : $type = 'purchase';
                break;
            }
            $this->model->type = $type;
            $this->model->price     = e($request['price']) ?: null;  
            $this->model->user_need = e($request['user_need']) ?: null; 
            $this->model->expires   = date("Y-m-d",strtotime($request['expires'])) ?: null;
            $this->model->premium = $this->request->has('premium'); 
            return $this->model->push();
      }
/**
 *
 *  set User
 *
 */
   private function assign_User($user)
      {
        return $this->model->user()->save($user);
      }
/**
 *
 *  set Item
 *
 *
 */
   private function assign_Item($data)
      {
          $item = Item::find($this->request['item']);
          return $this->addModel($this->model,'item',$item);
      }
}     









  //  public function GroupChange($user)
  //     {     

  //       //add method checkUserCount()
  //       //add $method = $user is instanceof User ? 'save' : 'saveMany';
  //       //add $this->users()->$method($user);

  //       if(!$this->model->checkJoin($user)){
  //         $this->addModel($user,'join_groups',$this->model);
  //         $message = 'You have been successfully joined to group';
  //       }
  //       else{
  //         $this->removeModel($user,'join_groups',$this->model);
  //         $message = 'You have been successfully withdrown from group';
  //       }
      
  //       $this->CheckProgress($this->model);

  //       $this->saveModel($this->model);
  //       $this->saveModel($user);
       
  //       return $message;
  //     } 

  //  private function CheckProgress()
  //     {
  //       $progress = ($this->model->user_count / $this->model->user_need) * 100;
  //       $this->model->progress = $progress;
  //       return $this->model;

  //       if($this->model->user_count == $this->model->user_need){   
  //          $this->model->complete = Carbon::now(); 
  //        } 

  //       if($this->model->user_count == $this->model->user_need)
  //         {
  //           return $this->model->complete = 'true';
  //         }
  //         return $this->model;
  //     }

  //  private function set_Group_Info()
  //     {
  //           switch (\Auth::user()->type) {
  //             case 'owner':$type = 'remont';
  //               break;   
  //             case 'profi':$type = 'project';
  //               break;   
  //             case 'shop': $type = 'purchase';
  //               break;
  //           }
  //           $this->model->type = $type;
  //           $this->model->price     = e($request['price']) ?: null;  
  //           $this->model->user_need = e($request['user_need']) ?: null; 
  //           $this->model->expires   = date("Y-m-d",strtotime($request['expires'])) ?: null; 

  //           return ;
  //     }

  //  private function assign_Item($data)
  //     {
  //       if($this->model->complete == false && $this->model->active == false)
  //         {
  //           if($request->has('item'))
  //               {
  //                 $item = Item::find($request['item']);
  //                 $this->addModel($this->model,'item',$item);
  //               }

  //         if($request->has('item'))
  //             {
  //               $item = Item::find($data('item'));
  //               $element = Element::find($item->element_id);
  //               $this->decrementModel($item,'element',$element);
  //             }   
  //         }
  //    return ; 
  //   }

  // private function set_Premium($item,$data){
  //           //if user->role = premium
  //     if($request->has('premium'))
  //       {
  //         $group->premium  = e($request['premium']); 
  //       }
  //     return ;
  // }