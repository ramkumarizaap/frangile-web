<?php
	require('includes/config.php');
	require('includes/header.php');
	require('includes/functions.php');
	if($_SESSION['user'])
	{
		$orders = get_orders($_SESSION['user']['id']);
	}
?>
<body>
	<div class="wrapper">
		<?php require('includes/topbar.php');?>
		<div class="container">
				<h2>My Orders</h2>
				<div class="row" style="margin-top: 20px;">
					<div class="col-md-12 table-responsive">						
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Crop Name</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	<?php
              	if($orders)
              	{
              		foreach ($orders as $key => $value)
              		{
              			?>
              			<tr>
		                  <td><?=$value['crop_name'];?></td>
		                  <td><?=$value['date'];?></td>
		                  <td><label class="label label-success">Rs.<?=$value['total'];?></label></td>
		                  <td><label class="label label-danger"><?=$value['status'];?></label></td>
		                  <td><a href="<?=$base_url."order_view.php?id=".$value['order_id'];?>" class="btn btn-xs btn-warning">View</a></td>
                		</tr>
                		<?php
                	}
                }
                else
                {
                	echo "<tr><td colspan=5>No Orders Found.</td></tr>";
                }
                ?>
              </tbody>
            </table>
                            
					</div>
				</div>
		</div>
	</div>
</body>
