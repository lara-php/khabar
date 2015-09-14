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
