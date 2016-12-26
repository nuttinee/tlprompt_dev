<?php

class LoginController extends BaseController {

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
		return View::make('login.index');
	}

	public function store(){
	
		# Authen User and Pass
		$input = Input::all();
		$username = Input::get('username');
		$password = md5(Input::get('password'));

		//echo '<pre>'.print_r($password,true).'</pre>'; exit();
		
		$remember = (Input::has('login_ck_rememberPass')) ? true : false;
		$path   = "/CaOperation/rest/login";
		$method = "checkLoginSecure";
		$body = "username=".$username."&password=".$password."&channel=tlprompt";

		#echo '<pre>'.print_r($body,true).'</pre>'; exit();
		
		$object = getDataAPI($path, $method, $query="", $body);

		#echo '<pre>'.print_r($object,true).'</pre>';
		
		if(isset($object->data)){
			
			Session::flush();
			Session::put('displayName', $object->data[0]->fNameT.' '.$object->data[0]->lNameT);
			
			return Redirect::to('register');

		}else{
			return Redirect::back()->withErrors('Username and password is not correct.')->withInput();
		}
	}

}
