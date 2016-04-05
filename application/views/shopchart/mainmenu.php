    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
						<?php foreach($menus as $menu){?>
							<?php $myclass = ($this->uri->segment(2)===$menu["id"])?"active":"";?>
							<li class="<?php echo $myclass;?>"><a href="<?php echo base_url();?>shop/<?php echo $menu["id"];?>"><?php echo $menu["name"];?></a></li>
						<?php }?>
						
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
