<?php
	function getmenu(){
		$ci = & get_instance();
		$menu = array(array("id"=>"gallery","name"=>"Home"),array("id"=>"cart","name"=>"Cart"),array("id"=>"checkout","name"=>"Check Out"),array("id"=>"contact","name"=>"Contact"));
		return $menu;
	}
	function gettotal(){
		$ci = & get_instance();
		$data = $ci->session->userdata();
		$total = 0;
		$amount = 0;
		if(isset($data["product"])){
			foreach($data["product"] as $prd){
				$total = $prd["sellprice"]+$total;
				$amount += 1;
			}
			return array("amount"=>$amount,"total"=>$total);
		}else{
			return array("amount"=>0,"total"=>0);
		}
	}
?>
