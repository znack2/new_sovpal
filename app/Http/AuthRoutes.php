<?php 

Route::group(['prefix'=>'auth'], function()
{
    Route::post('subscribe',        'AuthController@postSubscribe') ->name( 'auth.subscribe' )->middleware('guest');

    Route::get('registration',      'AuthController@register')      ->name( 'auth.register' )->middleware('guest');
    Route::post('registration',     'AuthController@postRegistr')   ->name( 'auth.register' )->middleware('guest');

    Route::get('registration/almost-done', 				'AuthController@getConfirmation') ->name( 'auth.confirm' )->middleware('guest');
    Route::get('registration/confirmation/{code}', 		'AuthController@postConfirmation')->name( 'auth.confirm' )->middleware('guest');

    Route::get('login/{provider?}',           'AuthController@redirectToProvider')     ->name( 'auth.oauth' )->middleware('guest');
    Route::get('login/callback/{provider?}',  'AuthController@handleProviderCallback') ->name( 'auth.oauth' )->middleware('guest');

    Route::post('login',            'AuthController@postLogin')     ->name( 'auth.login' )->middleware('guest');
    Route::get('logout',            'AuthController@Logout')        ->name( 'auth.logout' );


    Route::get('password/email',        'PasswordController@getEmail')      ->name( 'auth.email_require' )->middleware('auth');
    Route::post('password/email',       'PasswordController@postEmail')     ->name( 'auth.email_require' )->middleware('auth');

    Route::get('password/reset/{code}',     'PasswordController@getReset')  ->name( 'auth.pass_reset' )->middleware('auth');
    Route::post('password/reset',           'PasswordController@postReset') ->name( 'auth.pass_reset' )->middleware('auth');

    Route::get('auth/remind-password',     'PasswordController@getRemind')  ->name( 'auth.pass_remind' )->middleware('guest');
    Route::post('auth/remind-password',    'PasswordController@postRemind') ->name( 'auth.pass_remind' )->middleware('guest');
});

