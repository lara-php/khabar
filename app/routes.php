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




Route::get('category/{id}', ['as'=> 'category' ,function($id)
{
	$category=Category::find($id);
	$articles=$category->articles()->orderBy('date','desc')->paginate(4);
	


	return View::make('category')
					->with('category',$category )
					->with('articles',$articles );
					
}]);
