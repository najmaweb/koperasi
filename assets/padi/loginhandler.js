$("#modallogin").click(function(){
	console.log("login clicked");
	$.ajax({
		url:"http://koperasi/shop/signin",
		data:{email:"puji@padi.net.id",password:"puji"},
		type:"post"
	})
	.done(function(res){
		console.log("Res login",res);
		//$(".loginout").html('<li id="btnlogout"><a><i class="fa fa-user loginout"></i> Logout</a></li>');
		$(".loginout").html('<a><i class="fa fa-user loginout"></i> Logout</a>');
		$(".loginout").attr('id',"btnlogout");
	})
	.fail(function(err){
		console.log("Err",err);
	});
});
