<?php 

Route::group(['prefix'=>'admin','before' => 'admin','middleware' => 'admin'], function ()
{
	Route::get( 'users',             		['uses' => 'AdminController@listUsers',    'as' => 'users']);
	Route::get( 'groups',            		['uses' => 'AdminController@listGroups',   'as' => 'groups']);
	Route::get( 'items',             		['uses' => 'AdminController@listItems',    'as' => 'items']);
	Route::get( 'rooms',             		['uses' => 'AdminController@listRooms',    'as' => 'rooms']);
	Route::get( 'posts',             		['uses' => 'AdminController@listPosts',    'as' => 'posts']);

	Route::get( 'news',             		['uses' => 'AdminController@listNews',     'as' => 'news']);
	Route::get( 'tags',              		['uses' => 'AdminController@listTags',     'as' => 'tags']);
	Route::get( 'roles',             		['uses' => 'AdminController@listroles',    'as' => 'roles']);
	Route::get( 'elements',          		['uses' => 'AdminController@listelements', 'as' => 'elements']);

	Route::post('role',               		['uses' => 'AdminController@addRole',      'as' => 'add_news']);
	Route::post('role',               		['uses' => 'AdminController@addRole',      'as' => 'add_role']);
	Route::post('tag',                		['uses' => 'AdminController@addRole',      'as' => 'add_tag']);
	Route::post('element',            		['uses' => 'AdminController@addRole',      'as' => 'add_element']);

	Route::put('roles/{id}/update',         ['uses' => 'AdminController@updateRole',   'as' => 'update_news']);
	Route::put('roles/{id}/update',         ['uses' => 'AdminController@updateRole',   'as' => 'update_role']);
	Route::put('tags/{id}/update',          ['uses' => 'AdminController@updateRole',   'as' => 'update_tag']);
	Route::put('elements/{id}/update',      ['uses' => 'AdminController@updateRole',   'as' => 'update_element']);

	Route::delete('roles/{id}/destroy',     ['uses' => 'AdminController@removeRole',   'as' => 'remove_news']);
	Route::delete('roles/{id}/destroy',     ['uses' => 'AdminController@removeRole',   'as' => 'remove_role']);
	Route::delete('tags/{id}/destroy',      ['uses' => 'AdminController@removeRole',   'as' => 'remove_tag']);
	Route::delete('elements/{id}/destroy',  ['uses' => 'AdminController@removeRole',   'as' => 'remove_element']);
});




