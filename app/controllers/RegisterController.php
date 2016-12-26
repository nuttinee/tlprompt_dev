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

	public function index(){

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

	public function store(){
	
		# Authen User and Pass
		$input = Input::all();
		$username = Input::get('username');

		#echo '<pre>'.print_r($username,true).'</pre>'; exit();
		
		$path   = "/CaOperation/rest/login";
		$method = "checkRegister";
		$body = "username=".$username;
		
		$object = getDataAPI($path, $method, $query="", $body);
		//echo '<pre>'.print_r($username,true).'</pre>'; exit();
		
		if(isset($object->dataExcept)){
			//return json_encode($object);
			return View::make('ajax.popup-check-card-id', ['username' => $username, 'status' => '1']);
		}else{
			return View::make('ajax.popup-check-card-id', ['username' => $username, 'status' => '2']);
		}
	}

}
