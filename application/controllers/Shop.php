<?php
class Shop extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper("user");
		$this->load->helper("catalogs");
		$this->load->helper("members");
	}
	function index(){
		$data["products"] = getcatalogs("1","name","asc");
		$this->load->view("shopchart/shopchart",$data);
	}
	function addtochart(){
		$arraydata = $this->arraydata();
		$params = $this->input->post();
		array_push($arraydata,array("id"=>$params["id"],"product"=>$params["product"],"sellprice"=>$params["sellprice"],"image"=>$params["image"]));
		//$arr = array("product"=>$params["product"]);
		$arr = array("product"=>$arraydata);
		$this->session->set_userdata($arr);
		echo "prodcut ".$params["product"];
	}
	function getsessiondata(){
		return $this->session->userdata();
	}
	function getchart(){
		$data = $this->getsessiondata();
		foreach( $data["product"] as $key=>$val){
			if(isset($val)){
				foreach($val as $k=>$v){
					echo "x ".$k . " - " . $v . "<br />";
				}
			}
		}
	}
	function arraydata(){
		$data = $this->session->userdata();
		if(isset($data["product"])){
			return $data["product"];
		}else{
			return array();
		}
	}
	function resetchart(){
		$this->session->unset_userdata("product");
		$this->session->set_userdata(array("product"=>array()));
	}
	function chart(){
		$data["products"] = getcatalogs("1","name","asc");
		$data["carts"] = getcart();
		$this->load->view("shopchart/cart",$data);
	}
	function checkout(){
		$data["products"] = getcatalogs("1","name","asc");
		$data["carts"] = getcart();
		$member = memberhaslogin();
		if(!$member){
			redirect(base_url()."shop/login");
		}
		$data["member"] = $member;
		$this->load->view("shopchart/checkout",$data);
	}
	function login(){
		$data["products"] = getcatalogs("1","name","asc");
		$data["carts"] = getcart();
		$data["haslogin"] = memberhaslogin();
		$this->load->view("shopchart/login",$data);
	}
	function signin(){
		$params = $this->input->post();
		$user = memberchecklogin($params["email"],$params["password"]);
		if(!$user){
			echo "Cannot Login";
		}else{
			echo "Login success ".$user->name;
			$data["member"] = $user;
			redirect(base_url()."shop/checkout");
		}		
	}
	function gallery(){
		//$data["products"] = getfirstproducts();
		$data["products"] = getcatalogs();
		$this->load->view("shopchart/shop",$data);
	}
	function logout(){
		memberlogout();
		$this->resetchart();
		redirect(base_url()."shop/gallery");
	}
} 
