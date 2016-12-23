<?php

class UsersController extends \BaseController {
	
	protected $user;
	protected $privilege;
	
	public function __construct(User $user, Privilege $privilege){
		
		$this->user = $user;
		$this->privilege = $privilege;
	}
	
	# User list root/users
	public function index(){
		if(AuthCheck(Session::get('accessTokenExpired'))){						
			$body = "";
			$path   = "/meo/rest/passport/authority";
			$method = "meo.user.system.list";
			
			$page = Input::get("page");
			$userId = Input::get("id");
    		$staffName = urlencode(Input::get("name"));
			$staffEmail = Input::get("email");
			
			$url = Request::url()."?";
			$query = "";
			$params = array();

			if(!empty($userId)){
				$params["userId"] = $userId;
				$url .= "userId=".$userId;
			}
			if(!empty($roleName)){
				$params["staffName"] = $staffName;
				$url .= "staffName=".$staffName;
			}

			if(empty($page)){$page = 1;}
		    $pageSize = 15;
			$query  .= "&pageNo=".$page."&pageSize=".$pageSize;
			$body = json_encode(array("userId"=>$userId,"userName"=>$staffName,"pageNo"=>$page,"pageSize"=>$pageSize,"email"=>$staffEmail));
			$object = getDataAPI($path, $method, $query, $body, Session::get('accessToken'), Session::get('secretKey'));

			if(isset($object->body)){

				$userList = $object->body->result;
				$previousPage='';
				$nextPage='';			
				
				$viewParams = ['user' => Session::get('displayName'), 'userList' => $userList];

				# Start Pagination
				if(isset($object->body->totalSize)){
					$start = ($object->body->currentPage - 1) * $pageSize + 1;
					$end = min($object->body->currentPage * $pageSize , $object->body->totalSize);
					$totalSize = $start.' to '.$end.' of '.$object->body->totalSize;
					$viewParams["totalSize"] = (($object->body->totalSize > 0) ? $totalSize.'' : '0 of 0 row');
				}
					
				if($page > 1){
					$viewParams["previousPage"] = $url."&page=".($page - 1);
				}
					
				if(isset($object->body->pageNum)){
					$pagination="";
					for($pnum = 1; $pnum<=$object->body->pageNum; $pnum++){
							
						(isset($page) ? $active = ($pnum==$page ? 'class="active"' : '') : $active = '');
							
						$pagination .= "<li ".$active."><a href='".$url."page=".$pnum."' >".$pnum."</a></li>";
					}
					$viewParams["pagination"] = $pagination;
				}
					
				if(count($userList) > 0){
					$viewParams["nextPage"] = $url."&page=".($page + 1);
				}
				# End Pagination
					return View::make('users.index', $viewParams);
			}else{
				
				if(isset($object->error->errMsg)){
					if($object->error->errCode==9011002){
					  return Redirect::to('logout');
				}else{
					  return Redirect::back()->withErrors($object->error->errMsg);
				}
				}


			}
			
		}else{	
				return Redirect::to('login');	
		}
	}		
	
	# Edit user
	public function edit($id){
		if(AuthCheck(Session::get('accessTokenExpired'))){

			$path   = "/meo/rest/passport/authority";
			$method = "meo.user.system.get";
		
			$object = getDataAPI($path, $method, "&userId=".$id."", $body="", Session::get('accessToken'),"");
			$objectRole = getDataAPI("/meo/rest/passport/authority", "meo.role.list", "&pageNo=1&pageSize=1000", $body="", Session::get('accessToken'),"");

			if(isset($object->body)){
				return View::make('users.edit', ['user' => Session::get('displayName'), 'users' => $object->body, 'roles' => $objectRole->body->result]);
			}else{
				if(isset($object->error->errMsg)){
					if($object->error->errCode==9011002){
					  return Redirect::to('logout');
				}else{
					  return Redirect::back()->withErrors($object->error->errMsg);
				}
				}
			}
			
		}else{
				return Redirect::to('login');	
		}
	}

	
	# Update user
	public function update(){

		$path   = "/meo/rest/passport/authority";
		$method = "meo.user.system.modify";
		if (isset($_POST["userId"])) {
			$body = json_encode(array("roleIds"=>array($_POST["roleIds"]), "userId"=>($_POST["userId"]), "genderId"=>$_POST["gender"], "userName"=>$_POST["userName"], "email"=>$_POST["email"],"department"=>1,"staffType"=>1,"avatarUrl"=> "D:/app/yong/product"));
		} else {
			$body = json_encode(array("roleIds"=>array($_POST["roleIds"]),"genderId"=>$_POST["gender"], "userName"=>$_POST["userName"], "email"=>$_POST["email"],"department"=>1,"staffType"=>1,"avatarUrl"=> "D:/app/yong/product"));
		}

		$object = getDataAPI($path, $method, "", $body, Session::get('accessToken'),"");

		if (empty($object->error->errCode)) {
			if (isset($_POST["userId"])) {
				return Redirect::to('system/users')->with('msg', trans('users.UPDATE_COMPLETED'));
			} else {
				return Redirect::to('system/users/profile')->with('msg', trans('users.UPDATE_MYPROFILE_COMPLETED'));
			}
		} else {
			return Redirect::back()->withErrors($object->error->errMsg);
		}
	}
	
	# Create User root/user/create
	public function create()
	{
		if(AuthCheck(Session::get('accessTokenExpired'))){

			$path   = "/meo/rest/passport/authority";
			$method = "meo.role.list";

			$object = getDataAPI($path, $method, "&pageNo=1&pageSize=1000", $body="", Session::get('accessToken'),"");

			if(isset($object->body->result)){
				return View::make('users.create', ['user' => Session::get('displayName'), 'roles' => $object->body->result]);
			}else{
				if(isset($object->error->errMsg)){
					if($object->error->errCode==9011002){
					  return Redirect::to('logout');
				}else{
					  return Redirect::back()->withErrors($object->error->errMsg);
				}
				}
			}
	
		}else{			
			return Redirect::to('login');	
		}
	}
	
	# Get paramiter and save data
	public function store(){
		$path   = "/meo/rest/passport/authority";
		$method = "meo.user.system.add";
		$body = json_encode(array("roleIds"=>array($_POST["roleIds"]), "genderId"=>$_POST["gender"], "userName"=>$_POST["userName"], "department"=>1,"staffType"=>1,"email"=>$_POST["email"],"avatarUrl"=> "D:/app/yong/product"));
		$object = getDataAPI($path, $method, "", $body, Session::get('accessToken'),"");

		if (empty($object->error->errCode)) {
			return Redirect::to('system/users')->with('msg', trans('users.CREATE_COMPLETED'));
		} else {
			return Redirect::back()->withErrors($object->error->errMsg);
		}
	}

	public function show($id){
		if(AuthCheck(Session::get('accessTokenExpired'))){

			$object = getDataAPI("/meo/rest/passport/authority", "meo.user.system.get", "&userId=".$id."", $body="", Session::get('accessToken'),Session::get('secretKey'));

			if(isset($object->body)){
				return View::make('users.show', ['user' => Session::get('displayName'), 'users' => $object->body]);
			}else{
				if(isset($object->error->errMsg)){
					if($object->error->errCode==9011002){
					  return Redirect::to('logout');
				}else{
					  return Redirect::back()->withErrors($object->error->errMsg);
				}
				}
			}
			
		}else{	
				return Redirect::to('logout');	
		}
	}
	
	public function destroy($id){
		$flag = explode("|",$id);
		if ($flag[1] == 1) {
			$path   = "/meo/rest/passport/authority";
			$method = "meo.password.user.system.reset";
			
			$id = str_replace("|1","",$id);

			//$object = getDataAPI($path, $method, "&userId=100000109001", "", Session::get('accessToken'),"");
			$object = getDataAPI($path, $method, "&userId=".$id."", "", Session::get('accessToken'),"");

			if (empty($object->error->errCode)) {
				return Redirect::to('system/users')->with('msg', trans('users.RESET_COMPLETED'));
			} else {
				return Redirect::back()->withErrors($object->error->errMsg);
			}
		} else 
		if ($flag[1] == 2) {
			$path   = "/meo/rest/passport/authority";
			$method = "meo.user.system.delete";

			$id = str_replace("|2","",$id);

			$object = getDataAPI($path, $method, "&userId=".$id."", "", Session::get('accessToken'),"");

			if (empty($object->error->errCode)) {
				return Redirect::to('system/users')->with('msg', trans('users.DEL_COMPLETED'));
			} else {
				return Redirect::back()->withErrors($object->error->errMsg);
			}
		}
	}
	
}
