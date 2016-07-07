<?php 

Route::group(['prefix'=>'auth'], function()
{
    Route::group(['middleware' => 'guest'], function ()
    {       
        Route::get('registration',                     'AuthController@getRegister')        ->name( 'register_form' )
        Route::get('registration/confirmation/{code}', 'AuthController@getConfirmation')    ->name( 'confirm_form' )

        Route::post('registration',                    'AuthController@postRegister')       ->name( 'register' )
        Route::post('registration/confirmation',       'AuthController@postConfirmation')   ->name( 'confirm' )
        Route::post('login',                           'AuthController@postLogin')          ->name( 'login' )
        Route::post('login/{provider?}',               'AuthController@postSocialLogin')    ->name( 'oauth' )
        Route::post('login/callback/{provider?}',      'AuthController@callback')           ->name( 'callback' )
    });

    Route::group(['prefix'=>'auth','middleware' => 'auth'], function ()
    {       
        Route::get('logout',                   'AuthController@Logout')         ->name( 'logout' );
        //type email to get link for reset password or remind password
        Route::get('password/email',           'PasswordController@getEmail')   ->name( 'email_require_form' )
        //form for new password
        Route::get('password/reset/{token}',   'PasswordController@getReset')   ->name( 'reset_form' )

        Route::post('password/email',          'PasswordController@postEmail')  ->name( 'pass_sent' )
        Route::post('password/reset',          'PasswordController@postReset')  ->name( 'pass_reset' )
    });
});



