<?php
	function getbackendcatalogs($active = '1',$orderby = "name",$order = "asc"){
		$ci = & get_instance();
		$query = "select id,name,image,sellprice,exhibit,buyprice,dellprice,showinfront,description from catalogs ";
		$query.= "where active='".$active."' ";
		$query.= " order by '".$orderby."' '".$order."' ";
		$result = $ci->db->query($query);
		return $result->result();
	}
	function getcatalogs($active = '1',$offset=0,$segment=8,$orderby = "name",$order = "asc"){
		$ci = & get_instance();
		$query = "select id,name,image,sellprice,exhibit,buyprice,dellprice,showinfront,description from catalogs ";
		$query.= "where active='".$active."' ";
		$query.= " order by '".$orderby."' '".$order."' ";
		$query.= " limit $offset,$segment";
		$result = $ci->db->query($query);
		return $result->result();
	}
	function getcatalog($id){
		$ci = & get_instance();
		$query = "select id,name,image,sellprice,exhibit,buyprice,dellprice,showinfront,description from catalogs ";
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
	function getfirstproducts($active = '1',$orderby = "name",$order = "asc"){
		$ci = & get_instance();
		$query = "select id,name,image,sellprice,buyprice,dellprice,description from catalogs ";
		$query.= "where active='".$active."' ";
		$query.= " order by '".$orderby."' '".$order."' limit 1,4";
		$result = $ci->db->query($query);
		return $result->result();		
	}
	function getfrontproducts($active = '1',$orderby = "name",$order = "asc"){
		$ci = & get_instance();
		$query = "select id,name,image,sellprice,buyprice,dellprice,description from catalogs ";
		$query.= "where active='".$active."' ";
		$query.= "and showinfront='1' ";
		$query.= " order by '".$orderby."' '".$order."'";
		$result = $ci->db->query($query);
		return $result->result();		
	}
	function getexhibits($active = '1',$orderby = "name",$order = "asc"){
		$ci = & get_instance();
		$query = "select id,name,image,sellprice,buyprice,dellprice,description from catalogs ";
		$query.= "where active='".$active."' ";
		$query.= "and exhibit='1' ";
		$query.= " order by '".$orderby."' '".$order."'";
		$result = $ci->db->query($query);
		return $result->result();		
	}
	function getrelated($id,$active = '1',$orderby = "name",$order = "asc"){
		$ci = & get_instance();
		$query = "select c.id,c.name,c.image,c.sellprice,c.buyprice,c.dellprice,c.description from catalogs a ";
		$query.= "left outer join catalog_related b on b.catalog_id=a.id ";
		$query.= "left outer join catalogs c on c.id=b.related_id ";
		$query.= "where c.active='".$active."' ";
		$query.= "and a.id='".$id."' ";
		$query.= " order by '".$orderby."' '".$order."'";
		$result = $ci->db->query($query);
		return $result->result();		
	}
	function getamount(){
		$ci = & get_instance();
		$query = "select count(id)jml from catalogs ";
		$query.= "where active='1' ";
		$result = $ci->db->query($query);
		$out = $result->result()[0];		
		return $out->jml;		
	}
?>
