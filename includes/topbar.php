<div class="row top-header">
	<div class="col-md-12">
		<div class="col-md-4 float-left">
			<?php if(!isset($_SESSION['user'])){?>
			<ul class="header-menu">
				<li><a href="<?=$base_url;?>login.php">Sign In</a></li>
				<li><a href="<?=$base_url;?>signup.php">Sign Up</a></li>
				<li><a href="<?=$base_url;?>farmer_login.php">Farmer Login</a></li>
			</ul>
			<!-- <div id="google_translate_element"></div> -->
			<?php }?>
		</div>
		<div class="user-dropdown col-md-3 float-right">
			<h3>Welcome, 
				<span class="name"><?=isset($_SESSION['user'])?$_SESSION['user']['name']:"Guest";?></span>
			</h3>
			<?php if(isset($_SESSION['user'])){?>
			<ul class='user-menu'>
				<?php if($_SESSION['user']['role']=="1"){?>
					<li><a href="<?=$base_url;?>orders.php">My Orders</a></li>
					<?php }else if($_SESSION['user']['role']=='2'){?>
					<li><a href="<?=$base_url;?>my_orders.php">My Orders</a></li>
					<?php }?>
				<li><a href="<?=$base_url;?>logout.php">Logout</a></li>
			</ul>
			<?php }?>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<div class="row logo">
	<div class="col-md-12">
		<img src="<?=$base_url;?>assets/images/logo.png">
		<h2>New Frangile Purchasing</h2>
	</div>
</div>
<div class="row nav-menu">
	<div class="col-md-8 menu-div">
		<ul>
			<?php if(isset($_SESSION['user']) && $_SESSION['user']['role']=="2"){?>
			<li><a href="<?=$base_url;?>crop_list.php">Crops</a></li>
			<li><a href="<?=$base_url;?>my_orders.php">My Orders</a></li>
			<?php 
				}else {?>
				<li><a href="<?=$base_url;?>">Crops</a></li>
				<?php }?>
		</ul>
	</div>
</div>