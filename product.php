<?php
	require('includes/config.php');
	require('includes/header.php');
	require('includes/functions.php');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$crop = get_crop_by_id($id);
		$farmers = get_farmers_by_crop($id);
		$user = get_user_data();
	}
	else
	{
		header("Location:".$base_url);
	}
?>
<body>
	<div class="wrapper">
		<?php require('includes/topbar.php');?>
		<div class="container product-page">
				<h1 class=crop-title><?=$crop['name'];?></h1>
				<div class="crop-image">
					<img src="<?=$base_url."assets/images/fruits/".$crop['image'];?>">
				</div>
				<div class="farmers">
					<h2>Available Famrers for <b><?=$crop['name'];?></b></h2>
					<ul>
						<?php
						if($farmers)
						{
							foreach ($farmers as $key => $value)
							{
								?>
								<li>
									<div class="farmer-name">
										<b><?=$value['farmer_name'];?></b>
									</div>
									<div class="farmer-name">
										Available Qty : <b><?=$value['quantity'];?></b>
									</div>
									<div class="farmer-name">
										Price : <b>Rs.<?=$value['price'];?></b>
									</div>
									<div class="farmer-name">
										<a href="#myModal" data-toggle="modal" class="btn btn-danger">Order Now</a>
									</div>
								</li>
							<?php
							}
						}
						else
						{
							echo "<h4>No Farmers Found</h4>";
						}
						?>
					</ul>
				</div>
		</div>
	</div>
	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Quantity Needed</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	<?php
      	if($user=='' || $user==null)
      	{
      		?>
      			<div class="row">
      				<div class="col-md-12">
      					<p>Please login to make order.</p>
      					<a href="<?=$base_url;?>" class="btn btn-warning">Login Now</a>
      				</div>
      			</div>
      		<?php
      	}
      	else
      	{
      		?>
      		<div class="form-group">
      		<div class="col-md-12">
      			<label class="control-label">Quantity</label>
      		</div>
      		<div class="col-md-4">
      			<input type="text" class="form-control">
      		</div>
      		</div>
      		<?php
      	}
      	?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php
      	if($user!='' || $user!=null)
      	{
      		?>
        	<button type="button" class="btn btn-danger">Order</button>
        		<?php
        }
        ?>
      </div>
    </div>

  </div>
</div>
</body>
<?php
	require('includes/footer.php');
?>