<?php
	require('includes/config.php');
	require('includes/header.php');
	require('includes/functions.php');
?>
<body>
	<div class="wrapper">
		<?php require('includes/topbar.php');?>
		<div class="container">
			<div class="row">
				<!-- <div class="filter-button-group button-group js-radio-button-group">
					<button class="button" data-filter=".tomato">Tomato</button>
					<button class="clear" data-filter="">Clear</button>
				</div> -->
				<div class="search-filter">
					<h4>Filter By</h4>
					<?php
					$crops = get_farmer_crops($_SESSION['user']['id']);
					?>
					<ul>
						<?php
							foreach ($crops as $key => $value)
							{
								?>
								<li data-filter=".<?=$value['filter_name'];?>"><?=$value['crop'];?></li>
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
									<?=$value['crop'];?>
								</div><br>
								<div class="buy-btn">
									<a href="<?=$base_url;?>update_product.php?id=<?=$value['crop_id'];?>" class="btn btn-success">Update Now</a>
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
include 'includes/footer.php';
?>