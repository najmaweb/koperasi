<?php
class Main extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper("user");
		$this->load->helper("catalogs");
	}
	function login(){
		$this->load->view("commons/login");
	}
	function changepasswordhandler(){
		$myprofile = getprofile($this->session->userdata["userid"]);
		$email = $myprofile->email;
		$params = $this->input->post();
		if($params["cancelchangepassword"]){
			redirect(base_url()."main");
		}else{
			if($params["password"]===$params["password2"]){
				changepassword($email,$params["password"]);
				redirect(base_url()."main");
			}else{
				echo "Password tidak sama";
			}
		}
	}
	function dashboard(){
		$this->load->view("dashboard");
	}
	function dashboard2(){
		$data["products"] = getcatalogs("1","name","asc");
		$this->load->view("dashboard2",$data);
	}
	function loginhandler(){
		$params = $this->input->post();
		$user = checklogin($params["email"],$params["password"]);
		if(!$user){
			echo "Cannot Login";
		}else{
			echo "Login success ".$user->name;
			
			redirect(base_url()."catalogs");
		}
	}
	function logout(){
		gologout();
	}
	function myprofile(){
		$data["user"] = getprofile($this->session->userdata["userid"]);
		$this->load->view("commons/myprofile",$data);
	}
	function test(){
		echo sha1("test");
		listuser();
	}
	function test2(){
		createuser("pompom","pom@padi.net.id","kue");
	}
	function test3(){
		login("pom@padi.net.id","minum");
	}
	function test4(){
		changepassword("pom@padi.net.id","minum");
	}
	function test5(){
		$this->load->view("commons/confirm");
	}
	function upload(){
		$uploaddir = './media/'; 
		$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
		 
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
			echo "success"; 
		} else {
			echo "error";
		}		
	}
	function pagenotfound(){
		echo "Maaf halaman tidak diketemukan, <a href=".base_url()."main/login>Klik disini untuk login</a>";
	}
}
