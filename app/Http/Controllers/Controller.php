<?php namespace App\Http\Controllers;

use View;
use App;
use Auth;
use Config;
use Session;
use Log;
use Event;
use Carbon\Carbon;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\User\UserInterface;
use App\Models\_partials\Tag;
use \App\Models\_partials\Address;

//use App\Events\ItemSeeEvent;
//use App\Events\GroupSeeEvent;
//use App\Events\ProfileSeeEvent;
//use App\Events\UserEvent;

use App\Services\Mailer\Mailer;


/*********************************************************************

                          Controller

**********************************************************************/

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $paginate;
    public $model;
    public $currentUser;
    public $mail;
    public $redirectPath = '/';

    public function __call($method, $parameters)
        {
            abort('404');
            // return \Response::error('404');
        }
        
    public function __construct(Mailer $mail)
        {
            // Cookie::queue('saw-dashboard', true, 15);
            $this->paginate = \Config::get('sovpal::pagination');
            $this->currentUser = \Auth::user();//!is_null(Session::get('currentUser')) ? Session::get('currentUser') : Auth::user();
            $this->mail = $mail;
            // $this->debug();
        }
/**
 *
 *  Mail form
 *  
 *
 */
    public function sendMail(Request $request,$template,$subject)
        {
            logger()->info(__METHOD__);

            //contact form
            //empty index - subscribe
            //empty profile - subscribe
            //faq form

        try {
            $this->validate($request, [
               'name'       => 'required|min:3',
               'email'      => 'required|email|max:255',
               'message'    => 'required'
           ]);
           $requestData  = $request->only('name','email','message');
           $this->mail->sendMail($template, $this->currentUser, $subject);           
           return response()->json(['data' => $data, 'message' => "Success doing something"], 202);
        } catch (\Exception $e) {
            $message = sprintf("Error doing something %s", $e->getMessage());
            Log::debug($message);
            return response()->json(['data' => $data, 'message' => $message], 400);
        }  
/**
 *
 *  select Category and Element
 *  
 *
 */
    public function select(Request $request)
        {
            logger()->info(__METHOD__);
            //  $elements = DB::table('elements')->whereHas('categories',function( $query ) use ($request){
            //     $query->where('id',$request->input('category_id'))->orderBy('name')->lists('name','id')
            // });
            // return Response::make($elements);
            // return Response::json($elements);
        }
}
