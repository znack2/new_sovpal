<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User\User;
use Response;

abstract class Request extends FormRequest
{
    	protected $rules = [  
				'alt'       => 'max:256',
				'username'  => '' . Auth::id(),
				'rating'	=>'required|integer|between:1,5'
				'status'  	=> 'integer',
				'jsToken'   => 'required|js_token'
				'type'    	=> 'alpha_dash|unique:property_types',
				'slug' 		=> 'required|unique:posts,slug|slug|regex:/^[A-Za-z0-9\-]+$/',
				'name' 		=> '' . $this->mywildcard,
				'category' 	=> "in:$range" ];

	// $uri = $request->path();
	// if ($request->is('admin/*')) {}
	// if ($request->isMethod('post')) {}
	// if ($request->has('name')) {}
	// $request->flashOnly('username', 'email');
	// const EDIT_TIME = 150;

	// public $redirect: '/';       //the URI to redirect to if validation fails
	// public $redirectRoute: '/';  //the route to redirect to if validation fails
	// public $redirectAction: '/'; //the controller action to redirect to if validation fails
	// public $dontFlash: [''];      //the input keys that should not be flashed on redirect (default: ['password', 'password_confirmation'])

	//post
	// 'user.email'      => 'required|email|unique:users,email',
	//update
	// 'user.email'      => 'required|email|unique:users,email,'.$user->id,

	public function __construct(ValidationFactory $validationFactory)
	    {
	        // $validationFactory->extend(
	        //     'foo',
	        //     function ($attribute, $value, $parameters) {
	        //         return 'foo' === $value;
	        //     },
	        //     'Sorry, it failed foo validation!'
	        // );
	    }
	public function response(array $errors)
	  {
	  		dump($errors);

	      if (is_api_request()) {
	          return json()->unprocessableError($errors);
	      }

	      return $this->redirector->to($this->getRedirectUrl())
	          ->withInput($this->except($this->dontFlash))
	          ->withErrors($errors, $this->errorBag);
	  }
	public function forbiddenResponse()
		 {
		     // Optionally, send a custom response on authorize failure 
		     // (default is to just redirect to initial page with errors)
		     // Can return a response, a view, a redirect, or whatever else

	 		 //     return redirect('login');
	 	     // 	return view('errors/403');
		 	return $this->redirector->back();
	    	 return Response::make('Permission denied foo!', 403);
		 }

	public function authorize()
		 {
			 	//if use {route}
			 		// $id = $this->route('comment');
			 	    // return Clinic::where('id', $id)->where('user_id', Auth::id())->exists();
			 	//else
			 		//$id = $this->input('type');
			 	
			     // Only allow logged in users -- return \Auth::check();

			     // Allows all users in
			     return false;

	 			// if ( ! Auth::check() ) {return false; }

			    //         $thingBeingEdited = Thing::find(Input::get('thingId'));
			    //         if ( ! $thingBeingEdited || $thingBeingEdited->owner != Auth::id()) {
			    //             return false;
			    //         }
				   //          return true;

			       			// if(Auth::check() && (Auth::user()->role=='admin' || Auth::user()->role=='author')){
  			//     return true;
  			// }

  			return false;



  			#return $this->contact === null || auth()->user()->contacts->contains($this->contact);
  			// $appointmentId = $this->get('appointment');
  			// $businessId = $this->get('business');

  			// $appointment = Appointment::find($appointmentId);

  			// $authorize = ($appointment->issuer->id == auth()->user()->id) || auth()->user()->isOwner($businessId);

  			// return $authorize;


  			// $comment_id = $this->route('comment_id');

  			// $comment = $this->commentRepo->getCommentById($comment_id);

  			// if ( ! $comment) 
  			//     {throw new NotFoundHttpException; }
  			// if ( Auth::id() != $comment->autor_id || return (time() - $comment->created_at->timestamp < static::EDIT_TIME)) 
  			//     {throw new AccessDeniedException; } 


  			

  		    // $tag = $this->route('tag');

  			// return (auth()->check()) && ($this->logs->user->id == $this->user()->id);

  		    // return User::where('user_id', Auth::id())->hasRole('admin')->exists();

  		    // if ( ! Auth::check() ) {return false; } $thingBeingEdited = Thing::find(Input::get('thingId'));
  		    // if ( ! $thingBeingEdited || $thingBeingEdited->owner != Auth::id()) {return false; }
  		    //                                                                     return true;
		 }

	public function messages()
		  {
		  	// //if many

		  	//   foreach($this->request->get('items') as $key => $val)
		  	//   {
		  	//     $messages['items.'.$key.'.max'] = 'The field labeled "Book Title '.$key.'" must be less than :max characters.';
		  	//   }
		  	//   return $messages;

		      return [
		 		
		 		'start_remont.date'                    => 'Дата рождения имеет неверный формат',
		 		'description.min:10'                   => 'Этот Email уже кем-то занят',
		 		'end_remont.date'                      => 'Дата рождения имеет неверный формат',
		 		'area.integer'                         => 'Этот Email уже кем-то занят',
		 		'step'                                 => 'Этот Email уже кем-то занят',
		 		'type'                                 => 'Этот Email уже кем-то занят',
		 		'tag_id.required'                      => 'Этот Email уже кем-то занят',
		 		'designer_id.exists:users,id'          => 'Этот Email уже кем-то занят',

		 		// 'tag_id.required'                     => 'Этот Email уже кем-то занят',
		 		// 'first_name.alpha_dash'               => 'Этот логин уже кем-то занят',   
		 		// 'last_name.alpha_dash'                => 'Этот логин уже кем-то занят',
		 		// 'gender.alpha_dash'                   => 'Этот логин уже кем-то занят',
		 		// 'style.alpha_dash'                    => 'Этот логин уже кем-то занят',
		 		// 'age.alpha_dash'                      => 'Этот логин уже кем-то занят',
		 		// 'skills.alpha_dash'                   => 'Этот логин уже кем-то занят',
		 		// 'hour_cost.alpha_dash'                => 'Этот логин уже кем-то занят',
		 		// 'bio.alpha_dash'                      => 'Этот логин уже кем-то занят',
		 		// 'education.alpha_dash'                => 'Этот логин уже кем-то занят',
		 		// 'company.alpha_dash'                  => 'Этот логин уже кем-то занят',
		 		// 'website.url'                         => 'Указанный адрес сайта является некорректным',
		 		// 'own_remont'                          => 'Этот логин уже кем-то занят',
		 		// 'intro.alpha_dash'                    => 'Этот логин уже кем-то занят',
		 		// 'slogan.alpha_dash'                   => 'Этот логин уже кем-то занят',
		 		// 'phone_code'                          => 'Этот логин уже кем-то занят',
		 		// 'phone'                               => 'Этот логин уже кем-то занят',
		 		// 'refund_policy.alpha_dash'            => 'Этот логин уже кем-то занят',
		 		// 'privacy_policy.alpha_dash'           => 'Этот логин уже кем-то занят',
		 		// 'terms_of_service.alpha_dash'         => 'Этот логин уже кем-то занят',
		 		// 'birthday'                            => 'Дата рождения имеет неверный формат',

		 		'title.required'           => 'Этот логин уже кем-то занят',
		 		'title.min:4'              => 'Этот логин уже кем-то занят',

		 		'description.required'     => '',
		 		'description.min:10'       => '',

		 		'default_price.required'   => '',
		 		'default_price.numeric'    => '',
		 		'default_price.min:1'      => '',
		 		
		 		'facebook_link.url'                    => 'Указанный адрес сайта является некорректным',
		 		'website.url'                          => 'Указанный адрес сайта является некорректным',
		 		
		 		'element_id.required'      => '',
		 		'tag_id.required'          => '',

		 		'price.required'           => 'Этот логин уже кем-то занят',
		 		'price.integer'            => 'Этот логин уже кем-то занят',

		 		'expires.required'         => 'Этот Email уже кем-то занят',
		 		'expires.after'            => 'Дата рождения имеет неверный формат',
		 		'expires.before'           => 'Дата рождения имеет неверный формат',

		 		'user_count.required'      => 'Этот Email уже кем-то занят',
		 		'user_count.integer'       => 'Этот Email уже кем-то занят',

		 		'type.required'            => 'Этот Email уже кем-то занят',
		 		'type.required'            => 'Этот Email уже кем-то занят',
		 		
		 		'item_id.required'         => 'Этот Email уже кем-то занят',
		 		'tag_id.required'          => 'Этот Email уже кем-то занят',

		 	//ADDRESS
		 		'street.required'   => 'required',
		 		'house.required'    => 'required',
		 		'corpus.max:4'      => 'not required',

			 //TAG
			 //ELEMENT
			 //ROLE


		 	//IMAGE

		 		'url.required'                         => 'Please provide a URL',
		 		'url.url'                              => 'A valid URL is required',
		 		'url.mimes:png,jpg,jpeg'               => '',
		 		'url.dimension_min'                    => 'The :attribute must be at least 128 x 128 pixels!',
		 		'url.regex'                            => '',
		
		 	//REGISTR	


		 		'email.required'    => 'Этот логин уже кем-то занят',
		 		'password.required' => 'Этот логин уже кем-то занят',
		 		'password.regex'    => 'Your password must contain 1 lower case character 1 upper case character one number',

		 		'terms.required'    => 'required|accepted',
		 		// 'role.required'     => 'required|exists:roles,name',
		 		'type.required'     => 'required|exists:roles,name',//free or pay
		      ];
		  }

 
    public function sanitize()
  	   {
  	       // $input = $this->all();

  	       // if (preg_match("#https?://#", $input['url']) === 0) {
  	       //     $input['url'] = 'http://'.$input['url'];
  	       // }

  	       // $input['name'] = filter_var($input['name'], FILTER_SANITIZE_STRING);
  	       // $input['description'] = filter_var($input['description'], 
  	       // FILTER_SANITIZE_STRING);

  	       // $this->replace($input);     
  	   }

  	// return auth()->user()->is_admin;
  	public function validator(ValidationService $service)
  	    {
  	        $validator = $service->getValidator($this->input());

  	        // Optionally customize this version using new ->after()
  	        $validator->after(function() use ($validator) {
  	            // Do more validation

  	            $validator->errors()->add('field', 'new error');
  	        });
  	    }
    public function basevalidator()
  	   {
  	           // $v = Validator::make($this->input(), $this->rules(), $this->messages(), $this->attributes());
  	           // if(method_exists($this, 'moreValidation')){
  	           //     $this->moreValidation($v);
  	           // }
  	           // return $v;
  	   }
    public function extraValidationInRequest($validator)
  	   	{

  	         // Use an "after validation hook" (see laravel docs)
  	         // $validator->after(function($validator)
  	         // {
  	             // Check to see if valid numeric array
  	         //     foreach ($this->input('items') as $item) {
  	         //         if (!is_int($item)) {
  	         //             $validator->errors()->add('items', 'Items should all be numeric');
  	         //             break;
  	         //         }
  	         //     }
  	         // });
  	 	}

    protected function getValidatorInstance()
 	    {
  	 	//         $v = parent::getValidatorInstance();
  	 	//         $input = $this->all();
  	 	//         $v->sometimes(['street', 'house','first_name','last_name'], 'required', function($input)
  	 	//             {
  	 	//                 return $input['type'] == 'owner';
  	 	//             });                
  	 	//         return $v;
 	    }

 	protected function failedValidation(Validator $validator)
  	 	{
		  	 	//      $this->session()->flash('validation_error', [
		  	 	//            'msg-type' => 'danger',
		  	 	//            'msg-text' => 'Please complete the form.',
		  	 	//        ]);
		  	 	//      return parent::failedValidation($validator);
  	 	}
}


