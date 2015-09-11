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

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of e8deadc... cms route
Route::get('loginError', ['as' => 'loginError' , function(){
	return View::make('user.loginError');
}]);



Route::post('login', ['before' => 'csrf', 'as'=> 'login', function(){

	
	$remember = (Input::has('remember'))  ? true : false;
	
	
	if(Auth::attempt(['username'=>Input::get('username'),'password'=>Input::get('password') ],$remember))
	{
		return  Redirect::route('cms.article.list');
	}

	Session::flash('loginError', true);

	return Redirect::route('loginError');
		
}]);



Route::get('logout', ['as' => 'logout', function(){
	Auth::logout();

	return Redirect::route('index');
<<<<<<< HEAD
}]);

<<<<<<< HEAD
Route::get('category/{id}', ['as'=> 'category' ,function($id)
{
	$category=Category::find($id);
	$articles=$category->articles()->orderBy('date','desc')->paginate(4);
	


	return View::make('category')
					->with('category',$category )
					->with('articles',$articles );
					
}]);
=======
Route::get('user/passwordRemind', ['as'=> 'password.remind', function(){

	return View::make('user.passwordRemind');
}]);
=======
>>>>>>> parent of ee9574e... route/login and table


<<<<<<< HEAD
Route::get('user/passwordReset', ['as'=> 'password.reset', function(){

	return View::make('user.passwordReset');
=======
>>>>>>> parent of e8deadc... cms route
}]);
Route::post('RemindersController', ['as' => 'RemindersController', 'uses' => 'RemindersController@postReset']);

>>>>>>> parent of e8deadc... cms route

Route::get('user/passwordRemind', ['as'=> 'password.remind', function(){

	return View::make('user.passwordRemind');
}]);

Route::post('RemindersController', ['as' => 'RemindersController', 'uses' => 'RemindersController@postRemind']);

Route::get('user/passwordReset', ['as'=> 'password.reset', function(){

	return View::make('user.passwordReset');
}]);
Route::post('RemindersController', ['as' => 'RemindersController', 'uses' => 'RemindersController@postReset']);


Route::group(['prefix' => 'cms/article/'], function()
{

/* route article.list */

Route::get('', ['as' => 'article.list' , function(){

	$query = Content::select('*');

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


/* route article.add */

Route::get('add', ['as' => 'article.add' , function(){

	return View::make('cms.article.add');									
}]);

/* route article.insert.validation */

Route::post('insert', ['as' => 'article.insert' , function(){

	$rules = [
			  'date'   =>'required|max:255|date',
			  'title'  =>'required|max:255|unique:article',
			  'publish'=>'required|boolean'
			  ];
<<<<<<< HEAD
=======

	$validation = Validator::make(Input::all(),$rules);

	if($validation -> fails())
	{
		Input::flash();

		return Redirect::route('article.add')
											->withErrors($validation);
	}

	$article = new Article;
	$article ->date    =Input::get('date');
	$article ->title   =Input::get('title');
	$article ->publish =Input::get('publish');
	$article ->save();

	foreach (Input::get('categoryId') as $categoryId ) 
	{
		$categoryArticle =  new categoryArticle ;
		$categoryArticle ->articleId = $article->id;
		$categoryArticle ->categoryId = $categoryId;
		$categoryArticle ->save();
		
	}
	
	Session::flash('inserted', true);

	return Redirect::route('article.list');
									
}]);
/* route article.edit */

Route::get('edit/{id}',['as' =>'article.edit' , function($id){

	$article = Article::find($id);

	return View::make('cms/article.edit')
									->with('article' , $article);


}]);

/* route article.update */

Route::post('update', ['as' => 'article.update' , function(){

	$rules = [
			  'id'   =>'required|exists:article,id',
			  'date'   =>'required|date',
			  'title'  =>'required|max:255',
			  'publish'=>'required'
			  ];
>>>>>>> parent of e8deadc... cms route

	$validation = Validator::make(Input::all(),$rules);

	if($validation -> fails())
	{
		Input::flash();

<<<<<<< HEAD
		return Redirect::route('article.add')
											->withErrors($validation);
	}

	$article = new Article;
	$article ->date    =Input::get('date');
	$article ->title   =Input::get('title');
	$article ->publish =Input::get('publish');
	$article ->save();

	foreach (Input::get('categoryId') as $categoryId ) 
	{
		$categoryArticle =  new categoryArticle ;
		$categoryArticle ->articleId = $article->id;
		$categoryArticle ->categoryId = $categoryId;
		$categoryArticle ->save();
		
	}
	
	Session::flash('inserted', true);

	return Redirect::route('article.list');
									
}]);
/* route article.edit */

Route::get('edit/{id}',['as' =>'article.edit' , function($id){

	$article = Article::find($id);

	return View::make('cms/article.edit')
									->with('article' , $article);


}]);

/* route article.update */

Route::post('update', ['as' => 'article.update' , function(){

	$rules = [
			  'id'   =>'required|exists:article,id',
			  'date'   =>'required|date',
			  'title'  =>'required|max:255',
			  'publish'=>'required'
			  ];

	$validation = Validator::make(Input::all(),$rules);

	if($validation -> fails())
	{
		Input::flash();

=======
>>>>>>> parent of e8deadc... cms route
		return Redirect::route('article.edit', Input::get('id'))
											->withErrors($validation);
	}

	$article = Article::find(Input::get('id'));
	$article ->date    =Input::get('date');
	$article ->title   =Input::get('title');
	$article ->publish =Input::get('publish');
	$article ->save();

	Session::flash('updated', true);

	return Redirect::route('article.list');
									
}]);

/* route article.delete */

Route::get('delete/{id}', ['as'=>'article.delete' , function($id){

	$article= Article::find($id);
	$article->delete();
	Session::flash('deleted', true);

	return Redirect::route('article.list');




}]);
<<<<<<< HEAD
=======
>>>>>>> parent of ee9574e... route/login and table
=======
>>>>>>> parent of e8deadc... cms route

