<?php
class SessionsController extends BaseController{
	
	public function create(){
		
		# Loged in
		if(AuthCheck(Session::get('accessTokenExpired'))){
		 	
			return Redirect::to('dashboard');
		# No Login
		}else{
			
			return View::make('sessions.create');
		}
			
	}
	
	public function store(){
	
		# Authen User and Pass
		$input = Input::all();
		
		$remember = (Input::has('remember')) ? true : false;
		
		$path   = "/meo/rest/passport/login";
		$method = "portalLogin";
		$body   = json_encode(array("loginAcct"=>Input::get('username'),"password"=>Input::get('password')));
		
		$object = getDataAPI($path, $method, $query="", $body, $accesstoken="", $secretkey="");
		
		if(isset($object->body)){
			
			Session::flush();
			Session::put('displayName', Input::get('username'));
			Session::put('accessToken', $object->body->token->accessToken);
			Session::put('accessTokenExpired', $object->body->token->accessTokenExpired);
			Session::put('secretKey', $object->body->token->secretkey);
			MenuController::loadMenu();
			$isFirstLogin = (isset($object->body->isFirstLogin) ? $object->body->isFirstLogin : "");
			
			
			
			if($isFirstLogin==0){	
				return Redirect::to('dashboard')->with('changePwd', 1);
			}else{
			    return Redirect::to('dashboard');
			}
		}else{
			return Redirect::back()->withErrors(trans('sessions.INVALID_USERNAME_PWD'));
		}
	}

	public function show(){
		$method = Input::get("method");
		$loginAcct = Input::get("loginAcct");
		$userType = Input::get("userType");
		$timestamp = Input::get("timestamp");
		
		$object = getDataAPI("/meo/rest/passport/password/public", "meo.password.forget", "&loginAcct=".$loginAcct."&userType=".$userType."&timestamp=".$timestamp."", "","","");

		if(isset($object->error->errMsg)){
			print_r($object->error->errMsg);
			echo "<br><br><a href=\"#\" onClick=\"history.back();\"><< Back</a>";
		} else {
			return Redirect::to('login')->with('msg', trans('sessions.PLS_CHECK_EMAIL'));
		}
		
	}

	public function destroy(){
		
		$accessToken = Session::get('accessToken');
    	$secretKey = Session::get('secretKey');
		
		$object = getDataAPI("/meo/rest/passport/logout", "meo.passport.logout", "", "", $accessToken, $secretKey);
		
		if(isset($object->doneTime)){
			Session::flush(); 
			if(Input::get('cp')!=""){
				return Redirect::to('login')->with('msg', trans('sessions.CHANGE_COMPLETED'));	
			}else{
				return Redirect::to('login');	
			}
		}
	}
}
?>
