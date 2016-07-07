<?php namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\Controllers\Controller;
use App\Models\Group\GroupInterface;
use App\Models\Group\Group;

use App\Services\PurchaseService;
use App\Exceptions\PurchaseException;
use App\Exceptions\PolicyException;

class GroupController extends Controller
{
  protected $PurchaseService;
  
	public function __construct(PurchaseService $purchase, GroupInterface $group)
	    {
          $this->purchaseService = $purchase;
	        $this->model = $group;
	    }
/**
 *
 *  index groups
 *
 */
  public function index(IndexRequest $request)
    {
        try {
            $data['items'] = $this->model->Filter($request);
            return view('index/main',compact($data));
        } catch (NotFoundException $e) {
            flash('NotFound','error'); 
            return redirect()->back();
        }
    }
/**
 *
 *  show group
 *
 */
  public function show(group $group)
    { 
         return view('one/main',compact(['data'=>$group]));
    } 
/**
 *
 *  store group
 *  
 */
  public function store(GroupRequest $request)
    {
        try{
            $this->authorize('store', $group);
            $this->currentUser->storeGroup($request);            
            return flash('Group for ' . $this->model->item->title . 'successfully has been stored','success');
        catch(PolicyException $e){
            return flash($e->getMessage(),'error');
        }
    }
/**
 *
 *  update group
 *  
 */
  public function update(GroupRequest $request,group $group)    
  {   
      try{
          $this->authorize('update', $group);
          $this->currentUser->storeGroup($request, $group);          
          return flash('Group successfully has been updated','success');
      }
      catch(PolicyException $e){
        return flash($e->getMessage(),'error');
      }
   }
/**
 *
 *  destroy group 
 *  
 */
  public function destroy(Group $group)        
     {
        try{
           $this->authorize('destroy', $group);
           $this->currentUser->deleteModel($group);         
           return flash('Confirm','success');
        }
        catch(PolicyException $e){
          return flash($e->getMessage(),'error');
        }
     }    
/**
 *
 *  join group 
 *  
 */
  public function join(Group $group)
    {
        try{
          $this->authorize('join', $group);
          if($group->checkComplete()){
             $this->PurchaseService->purchaseGroup($group);     
          }
          $this->currentUser->JoinGroup($group);
          return flash('Confirm','success');
        }
        catch(PolicyException $e){
          return flash($e->getMessage(),'error');
        }
    }
/**
 *
 *  withdrow group 
 *  
 */
  public function withdrow(Group $group)
    {
        try{
            $this->authorize('withdrow', $group);
            if(!$group->checkComplete()){
               $this->currentUser->WithdrowFromGroup($group);        
            } else {
               return flash('Can not withrow','info'); 
            }
            return flash('Confirm','success');
        }
        catch(PolicyException $e){
            return flash($e->getMessage(),'error');
        }
    }
}   

