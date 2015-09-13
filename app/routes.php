<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*  */



Route::get('index',['as'=> 'index' ,function()
{
	
	return View::make('index');
}]);


Route::get('article/{id}', ['as'=> 'article' ,function($id)
{
	$article=Article::find($id);
	//$date = jDate::forge()->format('datetime');
	return View::make('article')->with('article',$article );
	//->with('date', $date);
	
}]);


