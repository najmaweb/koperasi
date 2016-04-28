<!DOCTYPE html>
<html lang="en">
  <head>
	<?php $this->load->view("shopchart/head");?>
  </head>
  <body>
<?php $this->load->view("shopchart/dialogs");?>
<?php $this->load->view("shopchart/headerarea");?>
<?php $this->load->view("shopchart/brandingarea");?>
<?php $this->load->view("shopchart/mainmenu");?>    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2><?php echo shopname();?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <?php foreach($products as $product){?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="<?php echo base_url();?>shop/singleproduct/<?php echo $product->id;?>"><img  src="<?php echo $product->image;?>" alt=""></a>
                        </div>
                        <h2><a href=""><?php echo $product->name;?></a></h2>
                        <div class="product-carousel-price">
                            <ins><sup>IDR</sup><?php echo number_format($product->sellprice);?></ins> <del><sup>IDR</sup><?php echo number_format($product->dellprice);?></del>
                        </div>

                        <div class="product-option-shop">
                            <a class="add_to_cart_button addtochart" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" val="<?php echo $product->name;?>"  myid="<?php echo $product->id;?>" sellprice="<?php echo $product->sellprice;?>" >Add to cart</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="row">
                <?php foreach($products2 as $product){?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <a href="<?php echo base_url();?>shop/singleproduct/<?php echo $product->id;?>"><img  src="<?php echo $product->image;?>" alt=""></a>
                        </div>
                        <h2><a href=""><?php echo $product->name;?></a></h2>
                        <div class="product-carousel-price">
                            <ins><sup>IDR</sup><?php echo number_format($product->sellprice);?></ins> <del><sup>IDR</sup><?php echo number_format($product->dellprice);?></del>
                        </div>

                        <div class="product-option-shop">
                            <a class="add_to_cart_button addtochart" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" val="<?php echo $product->name;?>"  myid="<?php echo $product->id;?>" sellprice="<?php echo $product->sellprice;?>" >Add to cart</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <?php for($x=1;$x<=$pageamount;$x++){?>
								<?php $page = ($x-1)*8?>
								<li><a href="<?php echo base_url();?>shop/gallery/<?php echo $page;?>"><?php echo $x;?></a></li>
							<?php }?>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


	<?php $this->load->view("shopchart/footertop");?>
	<?php $this->load->view("shopchart/footerbottom");?>
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>
    <script src="<?php echo base_url();?>assets/padi/loginhandler.js"></script>
    <script src="<?php echo base_url();?>assets/padi/shop.js"></script>
    <script type="text/javascript">
		(function($){
			$(".add_to_cart_button").click(function(){
				var thisproduct = $(this).attr("val");
				var myid = $(this).attr("myid");
				var sellprice = $(this).attr("sellprice");
				var myimage = $(this).parent().parent().find("img").attr("src");
				console.log("test",$(this).attr("val"));
				$.ajax({
					url:"<?php echo base_url();?>shop/addtochart",
					data:{product:thisproduct,sellprice:sellprice,id:myid,image:myimage,amount:1},
					type:"post"
				})
				.done(function(res){
					console.log("res",res);
				})
				.fail(function(err){
					console.log("err",err);
				});
			});

		}(jQuery))
    </script>
  </body>
</html>
