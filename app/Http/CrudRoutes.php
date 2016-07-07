<?php 
/*********************************************************************

                                Index

**********************************************************************/
	Route::group(['prefix'=>'index','middleware' => 'auth'], function ()
	{		
		Route::get('groups', 		'GroupController@index')->name( 'groups' );
		Route::get('items', 		'ItemController@index')->name(  'items'  );
		Route::get('users', 		'UserController@index')->name(  'users'  );
	});
/*********************************************************************

                                ONE

**********************************************************************/
	Route::group(['prefix'=>'items/{item}','middleware' => 'auth'], function ()
	{
		Route::get('/', 		 'ItemController@show')->name( 'item' );
		Route::post('purchase',  'ItemController@purchase')->name( 'action.purchase' );
		Route::post('rent',      'ItemController@rent')->name( 'action.rent' );
		Route::post('return',    'ItemController@return')->name( 'action.return' );
		// Route::post('like', 		'Controller@toggleLike')->name( 'action.like' );
    });

	Route::group(['prefix'=>'groups/{group}','middleware' => 'auth'], function ()
	{
		Route::get('/',				'GroupController@show')->name( 'group' );
		Route::post('join', 		'GroupController@join')->name( 'action.join' );
		Route::post('withdrow', 	'GroupController@withdrow')->name( 'action.withdrow' );
    });

	Route::group(['prefix'=>'users/{user}','middleware' => 'auth'], function ()
	{
		Route::get('/',       				['uses' => 'UserController@profile',		'as' => 'profile'])
		Route::post('hire',       			['uses' => 'UserController@hire',		  	'as' => 'user.hire'])
		Route::post('fire',       			['uses' => 'UserController@fire',		  	'as' => 'user.fire'])
    });
/*********************************************************************

                                Profile

**********************************************************************/
	Route::group(['prefix'=>'users/{user}','middleware' =>['auth','private']], function ()
	{
		Route::put( 	'update',       		['uses' => 'UserController@update',		  	'as' => 'user.update'])
//add {element}
		Route::post(	'elements/{room}/{element}',   ['uses' => 'RoomController@AddElement',		'as' => 'element.store']);
		Route::delete( 	'elements/{room}/{element}',   ['uses' => 'RoomController@RemoveElement',	'as' => 'element.destroy']);
//add {item}
		Route::post(	'items',      			['uses' => 'ItemController@store',			'as' => 'item.store']);
		Route::put(		'items/{item}',       	['uses' => 'ItemController@update',			'as' => 'item.update']);
		Route::delete( 	'items/{item}',       	['uses' => 'ItemController@destroy',		'as' => 'item.destroy']);
//add {room}
		Route::post(	'rooms',      			['uses' => 'RoomController@store',			'as' => 'room.store']);
		Route::put(		'rooms/{room}',    		['uses' => 'RoomController@update',			'as' => 'room.update']);
		Route::delete( 	'rooms/{room}',       	['uses' => 'RoomController@destroy',		'as' => 'room.destroy']);
//add {group}
		Route::post(	'groups',      			['uses' => 'GroupController@store',		 	'as' => 'group.store']);
		Route::put(		'groups/{group}',       ['uses' => 'GroupController@update',	 	'as' => 'group.update']);
		Route::delete( 	'groups/{group}',       ['uses' => 'GroupController@destroy',		'as' => 'group.destroy']);
	});

