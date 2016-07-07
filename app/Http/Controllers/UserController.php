<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User\UserInterface;
use App\Models\User\User;

use App\Services\HireService;
use App\Exceptions\PolicyException;
use App\Exceptions\HireException;

class UserController extends Controller
{
  protected $HireService;

	public function __construct(HireService $hire, UserInterface $user)
		{	
      $this->HireService = $hire;
			$this->model = $user;
		}
/**
 *
 *  index all users
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
 *  show user's profile
 *
 */
	public function profile(Request $request,User $user)
       {
             return view('profile/'.$request->input('section', 'settings'),compact(['data'=>$user]));
       }
/**
 *
 *  update user's profile
 *
 */
      public function update(UserRequest $request,User $user)
        {
          try{
              $this->authorize('update', $user);
              $this->model->updateUser($request, $user);           
              return flash( 'Your profile information successfully has been updated','success');
          }
          catch(PolicyException $e){
              return flash($e->getMessage(),'error');
          }
        }
/**
 *
 *  update user's profile
 *
 */
      public function hire(User $user)
        {
          try{
              $this->authorize('hire', $user);
              $this->HireService->hire($user);           
              return flash( 'You successfully has hired a user'. $user->first_name,'success');
          }
          catch(PolicyException $e){
              return flash($e->getMessage(),'error');
          }
          catch(HireException $e){
            return flash($e->getMessage(),'error');
          }
        }
/**
 *
 *  update user's profile
 *
 */
      public function fire(User $user)
        {
          try{
              $this->authorize('hire', $user);
              $this->HireService->fire($user);           
              return flash( 'You successfully has fired a user'. $user->first_name,'success');
          }
          catch(PolicyException $e){
              return flash($e->getMessage(),'error');
          }
          catch(HireException $e){
            return flash($e->getMessage(),'error');
          }
        }
}   