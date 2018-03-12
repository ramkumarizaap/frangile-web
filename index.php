<?php
	require('includes/config.php');
	require('includes/header.php');
?>
<body>
	<div class="wrapper">
	<?php require('includes/topbar.php');?>
	<div class="banner">
		<div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
        <div data-thumb="assets/images/slides/thumbs/bridge.jpg" data-src="assets/images/slides/bridge.jpg">
        </div>
        <div data-thumb="../images/slides/thumbs/leaf.jpg" data-src="assets/images/slides/leaf.jpg">
        </div>
        <div data-thumb="../images/slides/thumbs/road.jpg" data-src="assets/images/slides/road.jpg">
        </div>
        <div data-thumb="../images/slides/thumbs/sea.jpg" data-src="assets/images/slides/sea.jpg">
        </div>
        <div data-thumb="../images/slides/thumbs/shelter.jpg" data-src="assets/images/slides/shelter.jpg">
        </div>
        <div data-thumb="../images/slides/thumbs/tree.jpg" data-src="assets/images/slides/tree.jpg">
        </div>
    </div>
	</div>
	<div class="clearfix"></div><br>
	<div class="container">
		<div class="row">
			<!-- <div class="filter-button-group button-group js-radio-button-group">
				<button class="button" data-filter=".tomato">Tomato</button>
				<button class="clear" data-filter="">Clear</button>
			</div> -->
			<div class="search-filter">
				<h4>Filter By</h4>
				<ul>
					<li data-filter=".tomato">Tomato</li>
					<li data-filter=".onion">Onion</li>
					<li data-filter=".potato">Potato</li>
					<li data-filter=".beans">Beans</li>
					<li data-filter="">Clear All</li>
				</ul>
			</div>
			<div class="crops">
				<div class="row header-title">
					<h2 class="title">Crops</h2>
				</div>
				<div class="row">
					<div class="crop-item tomato">
						<div class="col-md-12">
							<div class="crop-img">
								<img src="<?=$base_url;?>assets/images/fruits/tomato.jpg">
							</div>
							<div class="crop-title">
								Tomato
							</div>
							<div class="crop-qty">
								Qty : 12
							</div>
							<div class="buy-btn">
								<a href="<?=$base_url;?>product.php?id=1" class="btn btn-success">Buy Now</a>
							</div>
						</div>
					</div>
					<div class="crop-item onion">
						<div class="col-md-12">
							<div class="crop-img">
								<img src="<?=$base_url;?>assets/images/fruits/onion.jpg">
							</div>
							<div class="crop-title">
								Onion
							</div>
							<div class="crop-qty">
								Qty : 12
							</div>
							<div class="buy-btn">
								<a href="<?=$base_url;?>product.php?id=2" class="btn btn-success">Buy Now</a>
							</div>
						</div>
					</div>
					<div class="crop-item potato">
						<div class="col-md-12">
							<div class="crop-img">
								<img src="<?=$base_url;?>assets/images/fruits/potato.jpg">
							</div>
							<div class="crop-title">
								Potato
							</div>
							<div class="crop-qty">
								Qty : 12
							</div>
							<div class="buy-btn">
								<a href="#" class="btn btn-success">Buy Now</a>
							</div>
						</div>
					</div>
					<div class="crop-item beans">
						<div class="col-md-12">
							<div class="crop-img">
								<img src="<?=$base_url;?>assets/images/fruits/beans.jpg">
							</div>
							<div class="crop-title">
								Beans
							</div>
							<div class="crop-qty">
								Qty : 12
							</div>
							<div class="buy-btn">
								<a href="#" class="btn btn-success">Buy Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

<?php
require('includes/footer.php');
?>