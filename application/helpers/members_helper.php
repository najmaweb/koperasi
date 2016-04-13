<?php
	function memberhaslogin(){
		$ci = & get_instance();
		//if(isset($ci->session->userdata("member"))){
		if(null!==($ci->session->userdata("member"))){
			return $ci->session->userdata("member");
		}
		return false;
	}
	function memberchecklogin($email,$password){
		$ci = & get_instance();
		$query = "select * from members ";
		$query.= "where email='".$email."' ";
		$result = $ci->db->query($query);
		if($result->num_rows()>0){
			$row = $result->result()[0];
			if($row->password===sha1($password.$row->salt)){
				$ci->session->set_userdata(array('member'=>array(
				"fname"=>$row->fname,
				"lname"=>$row->lname,
				"userid"=>$row->id,
				"email"=>$row->email,
				"address"=>$row->address,
				"city"=>$row->city,
				"phone"=>$row->phone,
				"img"=>$row->img,
				"description"=>$row->description,
				"createdate"=>$row->createdate
				)));
				return $row;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function memberlogout(){
		$ci = & get_instance();
		$ci->session->unset_userdata("member");
	}
?>
