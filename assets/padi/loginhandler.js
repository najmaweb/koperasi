$("#modallogin").click(function(){
	console.log("login clicked");
	$.ajax({
		url:"http://koperasi/shop/signin",
		data:{email:"puji@padi.net.id",password:"puji"},
		type:"post"
	})
	.done(function(res){
		console.log("Res login",res);
		$("#btnlogout").show();
		$("#btnlogin").hide();
		
	})
	.fail(function(err){
		console.log("Err",err);
	});
});
