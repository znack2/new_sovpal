<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User\UserInterface;
use App\Models\User\User;

/*********************************************************************

                             User 

**********************************************************************/

class UserController extends Controller
{

	public function __construct(UserInterface $user)
		{	
			$this->model = $user;
		}
/**
 *
 *  index all users
 *  
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
 *  show user's profile
 *  section = profile menu (settings/items/groups/rooms)
 *  
 *  TODO:
 *  - filter query
 *  - Cache
 *  - check if Auth::id == $user->id for all
 *
 */
	public function profile(Request $request,User $user)
   {
        logger()->info(__METHOD__);
        try {
           // if(is_null($user)) {abort('404'); }
            $data = $this->model->byId();          
            return view('profile/'.$request->input('section', 'settings'),compact($data));
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
   }
/**
 *
 *  update user's profile
 *
 *
 */
  public function update(UserRequest $request,User $user)
    {
        logger()->info(__METHOD__);
        try {
            $data = $this->model->updateUser($user);        
            return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }
    }
}   