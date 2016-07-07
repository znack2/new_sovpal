<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Access\Access;
use App\Models\_partials\Element\Element;
use App\Models\_partials\Role\Role;

class DashboardController extends Controller
{
      private $role;
      private $element;

      public function __construct(Role $role,Element $element)
      {
          $this->role = $role;
          $this->element = $element;
      }
//created for last day
      public function Index($page)
        {
          switch ($page) {
            case 'users':     $data = User::orderBy('id', 'asc')->with('roles')->get();
              break;            
            case 'items':     $data = User::orderBy('id', 'asc')->with('roles')->get();
              break;            
            case 'groups':    $data = User::orderBy('id', 'asc')->with('roles')->get();
              break;            
            case 'rooms':     $data = User::orderBy('id', 'asc')->with('roles')->get();
              break;       
            case 'posts':     $data = User::orderBy('id', 'asc')->with('roles')->get();
              break;            
            case 'tags':      $data = Tag::where('count', '>', 2)->orderBy('count', 'asc')->get();
              break;            
            case 'elements':  $data = User::orderBy('id', 'asc')->with('roles')->get();
              break;            
            case 'roles':     $data = User::orderBy('id', 'asc')->with('roles')->get();
              break;
            default:
              break;
          }
          
          return $this->view('admin.list',compact('data'))
        }
//ban or prove post
      public function updateUser(ItemRequest $request,$id)
        {
           $user = User::find($id);
          if($user){
              $user->blocked = 1;
              $user->blocked = 0;            
              $user->save();
              $status = 1/0;

                event(new AddLogs(Auth::user()->id,'ID: '.$user->id.' Status: '.$status));
              return redirect()->back()->with('message','saved');
          }
          return redirect()->back()->with('errMessage','error');
        }
//ban or prove item    
      public function updateItem(ItemRequest $request,$id)
        {
          
        } 
//ban or prove item    
      public function updateGroup(ItemRequest $request,$id)
        {
          
        } 
//ban or prove item    
      public function updateRoom(ItemRequest $request,$id)
        {
          
        }               
}

        