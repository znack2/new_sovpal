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

// Route::post('like', 		'Controller@toggleLike')->name( 'action.like' )->middleware('auth');

	Route::group(['prefix'=>'items/{item}','middleware' => 'auth'], function ()
	{
		Route::get('/', 		 'ItemController@show')       ->name( 'item' );
		Route::post('add', 		 'ItemController@addOrRemove')->name( 'action.add' );
    });

	Route::group(['prefix'=>'groups/{group}','middleware' => 'auth'], function ()
	{
		Route::get('/',				'GroupController@show')          ->name( 'group' );
		Route::post('join', 		'GroupController@joinOrwithdrow')->name( 'action.join' );
    });
/*********************************************************************

                                Profile

**********************************************************************/
	Route::group(['prefix'=>'users/{user}','middleware' => 'auth'], function ()
	{
		Route::get(		'/',  					['uses' => 'UserController@profile',    	'as' => 'profile']);
		Route::put( 	'update',       		['uses' => 'UserController@update',		  	'as' => 'user.update'])->middleware('private');
//add {element}
		Route::post(	'elements/{room}/{element}',   ['uses' => 'RoomController@AddElement',		'as' => 'element.store'])->middleware('private');
		Route::delete( 	'elements/{room}/{element}',   ['uses' => 'RoomController@RemoveElement',	'as' => 'element.destroy'])->middleware('private');
//add {item}
		Route::post(	'items',      			['uses' => 'ItemController@store',			'as' => 'item.store'])->middleware('private');
		Route::put(		'items/{item}',       	['uses' => 'ItemController@update',			'as' => 'item.update'])->middleware('private');
		Route::delete( 	'items/{item}',       	['uses' => 'ItemController@destroy',		'as' => 'item.destroy'])->middleware('private');
//add {room}
		Route::post(	'rooms',      			['uses' => 'RoomController@store',			'as' => 'room.store'])->middleware('private');
		Route::put(		'rooms/{room}',    		['uses' => 'RoomController@update',			'as' => 'room.update'])->middleware('private');
		Route::delete( 	'rooms/{room}',       	['uses' => 'RoomController@destroy',		'as' => 'room.destroy'])->middleware('private');
//add {group}
		Route::post(	'groups',      			['uses' => 'GroupController@store',		 	'as' => 'group.store'])->middleware('private');
		Route::put(		'groups/{group}',       ['uses' => 'GroupController@update',	 	'as' => 'group.update'])->middleware('private');
		Route::delete( 	'groups/{group}',       ['uses' => 'GroupController@destroy',		'as' => 'group.destroy'])->middleware('private');
	});

