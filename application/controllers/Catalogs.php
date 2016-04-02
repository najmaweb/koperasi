<?php
class Catalogs extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper("catalogs");
	}
	public function add(){
		if(islogin()){
			$this->load->view("catalogs/registration");
		}
	}
	public function index(){
		if(islogin()){
			$data["objs"] = getcatalogs();
			$this->load->view("catalogs/catalogs",$data);
		}
	}
	public function profile(){
		$data["obj"] = getcatalog($this->uri->segment(3));
		$this->load->view("catalogs/profile",$data);
	}
	public function save(){
		$params = $this->input->post();
		$query = "insert into catalogs (name,image,description) values ('".$params["name"]."','".$params["image"]."','".$params["description"]."')";
		$this->db->query($query);
		echo $this->db->insert_id();
	}
	public function setactive(){
		$params = $this->input->post();
		$query = "update catalogs set active='".$params["active"]."' where id='".$params["id"]."'";
		$this->db->query($query);
		echo $query;		
	}
	public function update(){
		$params = $this->input->post();
		$query = "update catalogs set name='".$params["name"]."',image='".$params["image"]."',description='".$params["description"]."' where id='".$params["id"]."'";
		$this->db->query($query);
		echo $query;
	}
	public function view(){
		$this->load->view("catalogs");
	}
}
