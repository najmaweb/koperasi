<?php
function baseurl(){
	return "http://koperasi/";
}
function getcountries(){
	$ci = & get_instance();
	$query = "select * from countries";
	$res = $ci->db->query($query);
	return $res->result();
}
