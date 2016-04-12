$.ajax({
	url:"http://koperasi/shop/gettotal",
	dataType:"json"
})
.done(function(res){
	$("#cartamount").html(res.cartamount);
	$("#productamount").html(res.productamount);
})
.fail(function(err){
	console.log("heheh",err);
});
$(".user-menu #btnlogin").click(function(){
	$("#loginwindow").modal();
});
$(".user-menu #btnlogout").click(function(){
	$.ajax({
		url:"http://koperasi/shop/logout"
	})
	.done(function(res){
		console.log("res logout",res);
		$("#btnlogout").hide();
		$("#btnlogin").show();
		$("#logger").show();
	})
	.fail(function(err){
		console.log("Err",err);
	});
});
$(".showlogin").click(function(){
	$("#loginwindow").modal();
});
