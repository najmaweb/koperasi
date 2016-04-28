<h2 class="sidebar-title">Products</h2>
<?php foreach(getfrontproducts() as $prd){?>
	<div class="thubmnail-recent">
		<a href="<?php echo base_url();?>shop/singleproduct/<?php echo $prd->id;?>"><img src="<?php echo $prd->image;?>" class="recent-thumb" alt=""></a>
		<h2><a href="<?php echo base_url();?>shop/singleproduct/<?php echo $prd->id;?>"><?php echo $prd->name;?></a></h2>
		<div class="product-sidebar-price">
			<ins><?php echo number_format($prd->sellprice);?></ins> <del><?php echo number_format($prd->dellprice);?></del>
		</div>                             
	</div>
<?php }?>
