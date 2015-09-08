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

Route::get('cms',['as'=> 'cms' , function()
{
	return View::make('layouts.cms');
}]);

Route::group(['prefix' => 'cms/article/'], function()
{

/* route article.list */

Route::get('', ['as' => 'article.list' , function(){

	$query = Article::select('*');

		foreach (Input::only('id', 'date', 'title', 'publish') as $key => $value)
		{
			if (strlen($value) > 0)
			{
				$query->where($key, 'LIKE', "%$value%");
			}
		}

		$query->orderBy('id', 'DESC');

		$articles = $query->paginate(15);

		return View::make('cms.article.list')
			->with('articles', $articles);
}]);




});