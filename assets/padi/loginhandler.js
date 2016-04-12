var hostname = "http://koperasi/";
$.ajax({
	url:hostname+"shop/checklogin",
	type:"post"
})
.done(function(res){
	console.log("RES check ligin",res);
	if(res==='haslogin'){
		console.log("return true");
		$("#btnlogout").show();
		$("#btnlogin").hide();
		$("#logger").hide();
	};
	if(res==='hasnotlogin'){
		$("#btnlogout").hide();
		$("#btnlogin").show();
		$("#logger").show();
		console.log("return false");
	}
})
.fail(function(err){
	console.log("Err",err);
});

$("#modallogin").click(function(){
	console.log("login clicked");

	$.ajax({
		url:hostname+"shop/signin",
		data:{email:$("#loginemail").val(),password:$("#loginpassword").val()},
		type:"post"
	})
	.done(function(res){
		console.log("Res login",res);
		if(res==="Cannot Login"){
			console.log("Password / email salah");
			$("#kwarning").modal();
		}else{
			$("#btnlogout").show();
			$("#btnlogin").hide();
			$("#logger").hide();
		}
	})
	.fail(function(err){
		console.log("Err",err);
	});
});
