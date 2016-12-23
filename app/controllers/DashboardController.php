<?php

class DashboardController extends \BaseController {
	

	public function index()
	{
		if(AuthCheck(Session::get('accessTokenExpired'))){

		
			if(Session::get('accessToken')){

				return View::make('dashboard.index', ['user' => Session::get('displayName')]);
			}else{
				return Redirect::back()->withErrors('Invalid Content , please try again');
			}
				
		}else{
			
			return Redirect::to('login');	
		}
	
	}
	
	public function create(){
		
		return 'display form to create new dashboard';
	}
	
	public function store(){
		# POST /questions
			
	}
	
	public function show($id){
	
	}
	
	public function edit($id){
		# GET => /question/id/edit
			
	}
	
	public function update($id){
		# PUT/PATCH /questions/id
			
	}
	
	public function destroy($id){
		# DELETE => /questions/id
			
	}


}


