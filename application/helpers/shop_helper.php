<?php
	function getmenu(){
		$ci = & get_instance();
		$menu = array(array("id"=>"home","name"=>"Home"),array("id"=>"gallery","name"=>"Shop Page"),array("id"=>"singleproduct","name"=>"Single Product"),array("id"=>"cart","name"=>"Cart"),array("id"=>"checkout","name"=>"Check Out"),array("id"=>"category","name"=>"Category"),array("id"=>"others","name"=>"Others"),array("id"=>"contact","name"=>"Contact"));
		return $menu;
	}
?>
