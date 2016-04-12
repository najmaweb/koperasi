<?php
function baseurl(){
	return "http://koperasi/";
}
function shopname(){
	return "Hello Kitty";
}
function shoptitle(){
	return "Toko Hello Kitty";
}
function getcountries(){
	$ci = & get_instance();
	$query = "select * from countries";
	$res = $ci->db->query($query);
	return $res->result();
}
