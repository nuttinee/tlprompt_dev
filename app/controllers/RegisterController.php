<?php

class RegisterController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		if(Session::get('displayName')){

			if(Session::get('displayName')){

				return View::make('register.index', ['user' => Session::get('displayName')]);
			}else{
				return Redirect::back()->withErrors('Invalid Content , please try again');
			}
				
		}else{
			
			return Redirect::to('login');	
		}
	
	}

}
