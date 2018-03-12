<?php
	require('includes/config.php');
	require('includes/header.php');
?>
<body>
	<div class="wrapper">
		<?php require('includes/topbar.php');?>
		<div class="container product-page">
				<h1 class=crop-title>Tomato</h1>
				<div class="crop-image">
					<img src="<?=$base_url;?>assets/images/fruits/tomato.jpg">
				</div>
				<div class="farmers">
					<h2>Available Famrers for <b>Tomato</b></h2>
					<ul>
						<li>
							<div class="farmer-name">
								Ramkumar
							</div>
							<div class="farmer-name">
								Available Qty : 12
							</div>
							<div class="farmer-name">
								Price : 200.00
							</div>
							<div class="farmer-name">
								<a href="#myModal" data-toggle="modal" class="btn btn-danger">Order Now</a>
							</div>
						</li>
						<li>
							<div class="farmer-name">
								<b>Ramkumar</b>
							</div>
							<div class="farmer-qty">
								Available Qty : <b>12</b>
							</div>
							<div class="farmer-price">
								Price : <b>200.00</b>
							</div>
							<div class="farmer-name">
								<a href="#" class="btn btn-danger">Order Now</a>
							</div>
						</li>
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
      	<div class="form-group">
      		<div class="col-md-12">
      			<label class="control-label">Quantity</label>
      		</div>
      		<div class="col-md-4">
      			<input type="text" class="form-control">
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Order</button>
      </div>
    </div>

  </div>
</div>
</body>
<?php
	require('includes/footer.php');
?>