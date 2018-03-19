<?php
	require('includes/config.php');
	require('includes/header.php');
	require('includes/functions.php');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$crop = get_farmer_crop_by_id($id);
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
				<h5>Available Quantity : <?=$crop['quantity'];?> kg</h5>
				<h5>Price : Rs.<?=$crop['price'];?></h5>
				<a href="#qtyModal" data-toggle="modal" data-row-id="<?=$crop['row_id'];?>" class="btn btn-danger quantity-modal">Update Now</a>
		</div>
	</div>
	<div id="qtyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  	<form id="QuantityForm" action="" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      	<?php
      	if($user=='' || $user==null)
      	{
      		?>
      			<div class="row">
      				<div class="col-md-12">
      					<p>Please login to update crop.</p>
      					<a href="<?=$base_url;?>farmer_login.php" class="btn btn-warning">Login Now</a>
      				</div>
      			</div>
      		<?php
      	}
      	else
      	{
      		?>
      		<input type="" name="row_id">
	      		<div class="form-group">
		      		<div class="col-md-12">
		      			<label class="control-label">Quantity</label>
		      		</div>
		      		<div class="col-md-4">
		      			<input type="text" name="quantity" value="<?=$crop['quantity'];?>" class="form-control">
		      		</div>
		      		<div class="col-md-12">
		      			<label class="control-label">Price</label>
		      		</div>
		      		<div class="col-md-4">
		      			<input type="text" name="price" value="<?=$crop['price'];?>" class="form-control">
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
        	<button type="submit" class="btn btn-danger">Order</button>
        		<?php
        }
        ?>
      </div>
    </div>
  </form>
  </div>
</div>
</body>
<?php
	require('includes/footer.php');
?>