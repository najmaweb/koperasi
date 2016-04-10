<h2 class="sidebar-title">Recent Posts</h2>
<ul>
	<?php foreach(getfirstproducts() as $prd){?>
		<li><a href="<?php echo base_url()?>shop/singleproduct/<?php echo $prd->id;?>"><?php echo $prd->name;?></a></li>
	<?php }?>
</ul>
