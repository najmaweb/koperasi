<?php
	function getlessons($active = '1'){
		$ci = & get_instance();
		$query = "select id,name,image,grade_id,description from lessons ";
		$query.= "where active='".$active."'";
		$result = $ci->db->query($query);
		return $result->result();
	}
	function getlesson($id){
		$ci = & get_instance();
		$query = "select id,name,image,grade_id,description from lessons ";
		$query.= "where id=".$id;
		$result = $ci->db->query($query);
		return $result->result()[0];
	}
	function getlessonarray(){
		$out = array();
		foreach(getlessons() as $lesson){
			$out[$lesson->id] = $lesson->name;
		}
		return $out;
	}
?>
