<?php 

// Auth::LoginUsingId(3);

Route::when('*', 'csrf', ['post', 'put', 'patch', 'delete']);

// ===== Language =====

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales')) && $this->validate($request, ['locale' => 'required|in:ru,en'])) {  
    	\Session::put('locale', $locale);  
    }
    return redirect()->back();                           
});

Route::get('/', function(){	
	return redirect()->route(!\Auth::guest()
			 ? 'groups' 
			 : 'pages',['page'=>'landing']);});

Route::get('page/{page}',       ['as' => 'pages',     		  'uses' => 'Controller@getView']);

Route::get('select/{menu}',     ['as' => 'ajax.select', 	  'uses' => 'ActionController@select']);

Route::post('sendMail',       	['as' => 'ajax.sendMail',     'uses' => 'ActionController@sendMail']);


