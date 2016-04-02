<?php
	function getcatalogs($active = '1',$orderby = "name",$order = "asc"){
		$ci = & get_instance();
		$query = "select id,name,image,sellprice,buyprice,dellprice,description from catalogs ";
		$query.= "where active='".$active."' ";
		$query.= " order by '".$orderby."' '".$order."' ";
		$result = $ci->db->query($query);
		return $result->result();
	}
	function getcatalog($id){
		$ci = & get_instance();
		$query = "select id,name,image,sellprice,buyprice,dellprice,description from catalogs ";
		$query.= "where id=".$id;
		$result = $ci->db->query($query);
		return $result->result()[0];
	}
	function getcart(){
		$ci = & get_instance();
		$data = $ci->getsessiondata();
		if(isset($data["product"])){
			return $data["product"];
		}else{
			return array();
		}
	}

?>
