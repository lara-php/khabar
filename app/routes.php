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
	//Weather::renderByName('Hamden, CT');
	return View::make('index');
}]);
/*category*/
Route::get('category/{id}', ['as'=> 'category' ,function($id)
{
	$category=Category::find($id);
	$articles=$category->articles()->orderBy('date','desc')->paginate(4);
	


	return View::make('category')
					->with('category',$category )
					->with('articles',$articles );
					
}]);

/* login  */

Route::get('user/add', ['as'=>'user.add' , function(){

	return View::make('user.add');
}]);
Route::post('user/register', ['as'=>'user.register' , function(){

	$rules = [
			  'username'			  =>'required|max:8',
			  'password'              =>'required|confirmed|max:8',
			  
			  'email'                 =>'required|email|unique:users',
			 'email_confirmation'=>'required|same:email'
			  ];

	$validation = Validator::make(Input::all(),$rules);

	if($validation -> fails())
	{
		Input::flash();



		return Redirect::route('user.add')
											->withErrors($validation);
	}

	$user = new User;
	$user ->username =Input::get('username');
	$user ->password =Hash::make(Input::get('password'));
	$user ->email    =Input::get('email');
	$user ->save();

	
	
	Session::flash('inserted', true);

	return Redirect::route('user.add');
									

}]);

Route::get('loginError', ['as' => 'loginError' , function(){
	return View::make('user.loginError');
}]);

Route::post('login', ['before' => 'csrf', 'as'=> 'login', function(){

	
	$remember = (Input::has('remember'))  ? true : false;
	
	
	if(Auth::attempt(['username'=>Input::get('username'),'password'=>Input::get('password') ],$remember))
	{
		return  Redirect::route('index');
	}

	Session::flash('loginError', true);

	return Redirect::route('loginError');
		
}]);

Route::get('logout', ['as' => 'logout', function(){
	Auth::logout();

	return Redirect::route('index');
}]);

Route::get('user/passwordRemind', ['as'=> 'password.remind', function(){

	return View::make('user.passwordRemind');
}]);

Route::post('RemindersController', ['as' => 'RemindersController', 'uses' => 'RemindersController@postRemind']);

Route::get('user/passwordReset', ['as'=> 'password.reset', function(){

	return View::make('user.passwordReset');
}]);
Route::post('RemindersController', ['as' => 'RemindersController', 'uses' => 'RemindersController@postReset']);


Route::get('article/{id}', ['as'=> 'article' ,function($id)
{
	$article=Article::find($id);
	//$date = jDate::forge()->format('datetime');
	return View::make('article')->with('article',$article );
	//->with('date', $date);
	
}]);

Route::get('category/{id}', ['as'=> 'category' ,function($id)
{
	$category=Category::find($id);
	$articles=$category->articles()->orderBy('date','desc')->paginate(4);
	


	return View::make('category')
					->with('category',$category )
					->with('articles',$articles );
					
}]);
/* login  */

Route::get('user/add', ['as'=>'user.add' , function(){

	return View::make('user.add');
}]);
Route::post('user/register', ['as'=>'user.register' , function(){

	$rules = [
			  'username'			  =>'required|max:8',
			  'password'              =>'required|confirmed|max:8',
			  
			  'email'                 =>'required|email|unique:users',
			 'email_confirmation'=>'required|same:email'
			  ];

	$validation = Validator::make(Input::all(),$rules);

	if($validation -> fails())
	{
		Input::flash();



		return Redirect::route('user.add')
											->withErrors($validation);
	}

	$user = new User;
	$user ->username =Input::get('username');
	$user ->password =Hash::make(Input::get('password'));
	$user ->email    =Input::get('email');
	$user ->save();

	
	
	Session::flash('inserted', true);

	return Redirect::route('user.add');
									

}]);

Route::get('loginError', ['as' => 'loginError' , function(){
	return View::make('user.loginError');
}]);

Route::post('login', ['before' => 'csrf', 'as'=> 'login', function(){

	
	$remember = (Input::has('remember'))  ? true : false;
	
	
	if(Auth::attempt(['username'=>Input::get('username'),'password'=>Input::get('password') ],$remember))
	{
		return  Redirect::route('index');
	}

	Session::flash('loginError', true);

	return Redirect::route('loginError');
		
}]);

Route::get('logout', ['as' => 'logout', function(){
	Auth::logout();

	return Redirect::route('index');
}]);

Route::get('user/passwordRemind', ['as'=> 'password.remind', function(){

	return View::make('user.passwordRemind');
}]);

Route::post('RemindersController', ['as' => 'RemindersController', 'uses' => 'RemindersController@postRemind']);

Route::get('user/passwordReset', ['as'=> 'password.reset', function(){

	return View::make('user.passwordReset');
}]);
Route::post('RemindersController', ['as' => 'RemindersController', 'uses' => 'RemindersController@postReset']);

/*Route::controller('password', 'RemindersController');

Password::remind(Input::only('email'), function($message)
{
    $message->subject('Password Reminder');
});*/


/* route cms*/

Route::get('cms', function(){
	return View::make('layouts.cms');
});

/* route article.list */
Route::group(['prefix' => 'cms/article/'], function()
{
Route::get('', ['as' => 'article.list' , function(){

	$articles= Article::orderBy('id', 'desc')->paginate(5);

	return View::make('cms.article.list')
										->with('articles' , $articles);
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

	$validation = Validator::make(Input::all(),$rules);

	if($validation -> fails())
	{
		Input::flash();

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

});

/* route category.list */
Route::get('cms/category', ['as' => 'category.list' , function(){

	$categories= Category::paginate(5);

	return View::make('cms.category.list')
										->with('categories' , $categories);
}]);

/* route category.add */
Route::get('cms/category/add', ['as' => 'category.add' , function(){

	

	return View::make('cms.category.add');
										
}]);



/* route category.insert.validation */
Route::post('cms/category/insert', ['as' => 'category.insert' , function(){

	$rules= [
				'name' => 'required|max:255|unique:category'

			];
	$validation = Validator::make(Input::all(), $rules);

	if($validation -> fails())
	{
		Input::flash();

		return Redirect::route('category.add')
											 ->withErrors($validation);
	}

	$category = new Category;
	$category->name=Input::get('name') ;
	$category->save();

	Session::flash('inserted', true);

	return Redirect::route('category.list');

	
										
}]);
/* route category.edit */

Route::get('cms/category/edit/{id}',['as' =>'category.edit' , function($id){

	$category = Category::find($id);

	return View::make('cms/category.edit')
									->with('category' , $category);


}]);

/* route category.update.validation */
Route::post('cms/category/update', ['as' => 'category.update' , function(){

	$rules= [
				'id'   => 'required|exists:category,id' ,
				'name' => 'required|max:255|unique:category'

			];
	$validation = Validator::make(Input::all(), $rules);

	if($validation -> fails())
	{
		Input::flash();

		return Redirect::route('category.edit', Input::get('id'))
											 ->withErrors($validation);
	}

	$category =Category::find(Input::get('id'));
	$category->name=Input::get('name') ;
	$category->save();

	Session::flash('updated', true);

	return Redirect::route('category.list');
									
}]);

/* route category.delete */

Route::get('cms/category/delete/{id}', ['as'=>'category.delete' , function($id){

$category= Category::find($id);
	$category->delete();
	Session::flash('deleted', true);

	return Redirect::route('category.list');

Route::get('article/{id}', ['as'=> 'article' ,function($id)
{
	$article=Article::find($id);
	//$date = jDate::forge()->format('datetime');
	return View::make('article')->with('article',$article );
	//->with('date', $date);
	
}]);


}]);