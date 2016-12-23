<?php

class SystemController extends \BaseController {
	
	protected $user;
	
	public function __construct(User $user){
		
		$this->user = $user;

	}

	public function index(){
			
		if(Auth::check()){ 
		
        	$user = User::find(Auth::user()->user_id);
			
			$privileges = $this->privilege->all();
	
			return View::make('system.index', ['user' => $user]);
	
		}else{
			
			return Redirect::to('login');	
		}
	
	}
	
	public function create()
	{
		return 'display form to create new system';
	}
	
	public function store(){
		# POST /questions
			
	}
	
	public function show($id){
		# GET => /questions/id
			
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
?>