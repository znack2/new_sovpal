<?php namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\Controllers\Controller;
use App\Models\Group\GroupInterface;
use App\Models\Group\Group;

/*********************************************************************

                Group --- ( Index/show - STORE - UPDATE - DELETE  ) 

**********************************************************************/

class GroupController extends Controller
{
	public function __construct(GroupInterface $group)
	    {
	        $this->model = $group;
	    }
/**
 *
 *  index group
 *
 */
  public function index()
    {
        logger()->info(__METHOD__);
         try {
            $data['items'] = $this->model->Filter();           
            return view('index/main',compact($data));
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    }
/**
 *
 *  show group
 * TODO
 * add in presenter $group->getMembers();
 */
  public function show(Group $group)
    {  
        logger()->info(__METHOD__);
         try {
           // if(is_null($item)) {abort('404'); }
            $data = $this->model->byId();          
            return view('one/main',compact($data));
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    } 
/**
 *
 *  store group
 *
 */
  public function store(GroupRequest $request)
     {
      logger()->info(__METHOD__);
         try {
            $data = $this->model->storeGroup();          
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
     }
/**
 *
 *  update group
 *
 */
  public function update(GroupRequest $request,Group $group)       
    {    
         try {
            $data =  $this->model->storeGroup($item);          
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }  
    }
/**
 *
 *  destroy group
 * 
 */
  public function destroy(Group $group)      
    {
      logger()->info(__METHOD__);
       try {
            $data =  $this->model->deleteModel($group);         
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    }  
/**
 *
 *  join or withdrow group
 *  
 */
  public function joinGroup(Group $group)
    {
      logger()->info(__METHOD__);   
         try {
            $data =  $group->JoinGroup($this->currentUser);        
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    }
/**
 *
 *  join or withdrow group
 *  
 */
  public function withdrowFromGroup(Group $group)
    {
      logger()->info(__METHOD__);   
       try {
            $data =  $group->WithdrowFromGroup($this->currentUser);       
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    }
}   

