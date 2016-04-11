<h2>Anda mungkin tertarik...</h2>
<ul class="products">
	<?php foreach(getexhibits() as $exhibit){?>
	<li class="product">
		<a href="<?php echo base_url();?>shop/singleproduct/<?php echo $exhibit->id;?>">
			<img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="<?php echo $exhibit->image;?>">
			<h3><?php echo $exhibit->name;?></h3>
			<span class="price"><span class="amount"><?php echo number_format($exhibit->sellprice,2);?></span></span>
		</a>

		<a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="<?php echo base_url();?>shop/singleproduct/<?php echo $exhibit->id;?>">Select options</a>
	</li>
	<?php }?>
</ul>
