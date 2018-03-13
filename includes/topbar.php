<div class="row top-header">
	<div class="col-md-12">
		<div class="col-md-3 float-left">
			<?php if(!isset($_SESSION['user'])){?>
			<ul class="header-menu">
				<li><a href="<?=$base_url;?>login.php">Sign In</a></li>
				<li><a href="<?=$base_url;?>signup.php">Sign Up</a></li>
			</ul>
			<?php }?>
		</div>
		<div class="user-dropdown col-md-3 float-right">
			<h3>Welcome, 
				<span class="name"><?=isset($_SESSION['user'])?$_SESSION['user']['name']:"Guest";?></span>
			</h3>
			<?php if(isset($_SESSION['user'])){?>
			<ul class='user-menu'>
				<li><a href="<?=$base_url;?>orders.php">My Orders</a></li>
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
			<li><a href="<?=$base_url;?>">Crops</a></li>
			<li><a href="#">Farmers</a></li>
			<li><a href="#">Abouts Us</a></li>
			<li><a href="#">Contact Us</a></li>
		</ul>
	</div>
</div>