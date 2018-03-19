<?php
	require('includes/config.php');
	require('includes/header.php');
	require('includes/functions.php');
?>
<body>
	<div class="wrapper">
	<?php require('includes/topbar.php');?>
	<?php if((isset($_SESSION['user']) && $_SESSION['user']['role']!='2') || (!isset($_SESSION['user']))){?>
	<div class="banner">
		<div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
        <div data-src="assets/images/slides/slider1.jpg">
        </div>
        <div data-src="assets/images/slides/slider2.jpg">
        </div>
        <div data-src="assets/images/slides/slider3.jpg">
        </div>
        <div data-src="assets/images/slides/slider4.jpg">
        </div>
        <div data-src="assets/images/slides/slider5.png">
        </div>
    </div>
    <?php }?>
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
				<?php
				$crops = get_crops();
				?>
				<ul>
					<?php
						foreach ($crops as $key => $value)
						{
							?>
							<li data-filter=".<?=$value['filter_name'];?>"><?=$value['name'];?></li>
						<?php
						}
					?>
					<li data-filter="">Clear All</li>
				</ul>
			</div>
			<div class="crops">
				<div class="row header-title">
					<h2 class="title">Crops</h2>
				</div>
				<div class="row">
					<?php
					foreach ($crops as $key => $value)
					{
						?>
						<div class="crop-item <?=$value['filter_name'];?>">
						<div class="col-md-12">
							<div class="crop-img">
								<img src="<?=$base_url."assets/images/fruits/".$value['image'];?>">
							</div>
							<div class="crop-title">
								<?=$value['name'];?>
							</div><br>
							<div class="buy-btn">
								<a href="<?=$base_url;?>product.php?id=<?=$value['id'];?>" class="btn btn-success">Buy Now</a>
							</div>
						</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

<?php
require('includes/footer.php');
?>