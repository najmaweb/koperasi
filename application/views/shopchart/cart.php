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
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->


    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="#">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>

                    <div class="single-sidebar">
						<?php $this->load->view("shopchart/sidebar-product");?>
                    </div>

                    <div class="single-sidebar">
						<?php $this->load->view("shopchart/sidebar-recentpost");?>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <!--<form method="post" action="#">-->
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<span id="resetcart" class="button">Reset Cart</span>
                                        <?php foreach($carts as $product){?>
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="#">×</a>
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="<?php echo $product["image"];?>"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="single-product.html"><?php echo $product["product"];?></a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount" thisval="<?php echo $product["sellprice"];?>"><?php echo number_format($product["sellprice"],2);?></span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="button" class="minus buttonReducer" value="-">
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="0" step="1">
                                                    <input type="button" class="plus buttonAdder" value="+">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount"><?php echo number_format($product["sellprice"],2);?></span>
                                            </td>
                                        </tr>
                                        <?php }?>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <div class="coupon">
                                                    <label for="coupon_code">Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                                </div>
                                                <input type="submit" value="Update Cart" name="update_cart" class="button" id="updatecart">
                                                <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            <!--</form>-->

                            <div class="cart-collaterals">


                            <div class="cross-sells">
								<?php $this->load->view("shopchart/interesteds");?>
                            </div>


                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">£15.00</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">£15.00</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <form method="post" action="#" class="shipping_calculator">
								<?php $this->load->view("shopchart/shippingcalculator");?>
                            </form>


                            </div>
                        </div>
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
    <script src="<?php echo base_url();?>assets/ustora/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/ustora/js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="<?php echo base_url();?>assets/ustora/js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="<?php echo base_url();?>assets/ustora/js/main.js"></script>
    <script src="<?php echo base_url();?>assets/padi/loginhandler.js"></script>
    <script src="<?php echo base_url();?>assets/padi/shop.js"></script>
    <script>
		(function($){
			$(".cart_item").each(function(){
				var that = $(this);
				console.log(that.find(".sellprice").html());
			});
			$("#resetcart").click(function(){
				$.ajax({
					url:"<?php echo base_url();?>shop/resetchart",
					type:"post"
				})
				.done(function(res){
					console.log("Res",res);
				})
				.fail(function(err){
					console.log("Err",err);
				});
			});
			$(".buttonAdder").click(function(){
				that = $(this);
				preval = parseInt(that.prev().val());
				that.prev().val(preval+1);
				console.log("increased",that.prev().val());
					var itemprice = that.parent().parent().prev().find(".amount").attr("thisval");
					var totalprice = that.parent().parent().next().find(".amount").html();
					that.parent().parent().next().find(".amount").html((parseInt(itemprice)*parseInt(that.prev().val())).toLocaleString());
			});
			$(".buttonReducer").click(function(){
				that = $(this);
				nexval = parseInt(that.next().val());
				if(nexval>0){
					that.next().val(nexval-1);
					console.log("decreased",that.next().val());
					var itemprice = that.parent().parent().prev().find(".amount").attr("thisval");
					var totalprice = that.parent().parent().next().find(".amount").html();
					that.parent().parent().next().find(".amount").html((parseInt(itemprice)*parseInt(that.next().val())).toLocaleString());
				}
			});
			$("#updatecart").click(function(){
				console.log("bebbeb");
				$(".cart_item").each(function(x,y){
					
				});
			});
		}(jQuery))
    </script>
  </body>
</html>
