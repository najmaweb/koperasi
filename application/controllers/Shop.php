<?php
class Shop extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper("user");
		$this->load->helper("catalogs");
		$this->load->helper("members");
		$this->load->helper("shop");
		$this->load->helper("general");
	}
	function index(){
		$data["title"] = "Gallery";
		$offset = ($this->uri->total_segments()>2)?$this->uri->segment(3):1;
		$data['pageamount'] = ceil(getamount()/8);
		$data["products"] = getcatalogs('1',$offset,4,"name","asc");
		$data["products2"] = getcatalogs('1',$offset+4,4,"name","asc");
		$data["menus"] = getmenu();
		$data['offset'] = $offset;
		$this->load->view("shopchart/shop",$data);
	}
	function addtochart(){
		$arraydata = $this->arraydata();
		$params = $this->input->post();
		array_push($arraydata,array(
			"id"=>$params["id"],
			"product"=>$params["product"],
			"sellprice"=>$params["sellprice"],
			"image"=>$params["image"],
			"amount"=>$params["amount"]
			));
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
	function cart(){
		$data["title"] = "Cart";
		$data["carts"] = getcart();
		$data["menus"] = getmenu();
		$this->load->view("shopchart/cart",$data);
	}
	function checkout(){
		$data["title"] = "Checkout";
		$data["products"] = getcatalogs("1",1,8,"name","asc");
		$data["carts"] = getcart();
		$member = memberhaslogin();
		/*if(!$member){
			redirect(base_url()."shop/login");
		}*/
		$data["member"] = $member;
		$data["menus"] = getmenu();

		$this->load->view("shopchart/checkout",$data);
	}
	function login(){
		$data["products"] = getcatalogs("1",1,8,"name","asc");
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
		$data["title"] = "Gallery";
		$offset = ($this->uri->total_segments()>2)?$this->uri->segment(3):1;
		$data['pageamount'] = ceil(getamount()/8);
		$data["products"] = getcatalogs('1',$offset,4,"name","asc");
		$data["products2"] = getcatalogs('1',$offset+4,4,"name","asc");
		$data["menus"] = getmenu();
		$data['offset'] = $offset;
		$this->load->view("shopchart/shop",$data);
	}
	function singleproduct(){
		$data["title"] = "Single Product";
		$id = $this->uri->segment(3);
		$data["product"] = getcatalog($id);
		$data["menus"] = getmenu();
		$this->load->view("shopchart/single-product",$data);
	}
	function logout(){
		memberlogout();
		$this->resetchart();
		//redirect(base_url()."shop");
	}
	function checklogin(){
		$result =  memberhaslogin();
		if($result){
			echo "haslogin";
		}else{
			echo "hasnotlogin";
		}
	}
	function gettotal(){
		$out = gettotal();
		echo '{"productamount":'.$out["amount"].',"cartamount":'.$out["total"].'}';
	}
	function xxx(){
		foreach(getcountries() as $xx){
			echo $xx->name;
		}
	}
	function savetransaction(){
		echo "save transaction";
		$params = $this->input->post();
		foreach($params as $key=>$val){
			echo $key . " " . $val . "<br />";
		}
	}
} 
