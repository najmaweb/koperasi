<?php
class Shop extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper("catalogs");
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
		$this->load->view("shopchart/checkout",$data);
	}
	function gallery(){
		//$data["products"] = getfirstproducts();
		$data["products"] = getcatalogs();
		$this->load->view("shopchart/shop",$data);
	}
} 
