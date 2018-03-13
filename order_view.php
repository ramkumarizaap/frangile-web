<?php
	require('includes/config.php');
	require('includes/header.php');
	require('includes/functions.php');
	if($_SESSION['user'])
	{
		$orders = get_order_by_id($_GET['id']);
		$address = $orders['address1']." ".$orders['address2']." ".$orders['city']." ".$orders['state']." ".$orders['zip'];
		 $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
		 $geo = json_decode($geo, true);
		 $latitude="";$longitude="";
		 if ($geo['status'] == 'OK')
		 {
      $latitude = $geo['results'][0]['geometry']['location']['lat'];
      $longitude = $geo['results'][0]['geometry']['location']['lng'];
   	}
	}
?>
<body>
	<input type="hidden" name="latitude" value="<?=$latitude;?>">
	<input type="hidden" name="longitude" value="<?=$longitude;?>">
	<div class="wrapper">
		<?php require('includes/topbar.php');?>
		<div class="container">
			<div class="col-md-8" style="margin:0 auto;margin-top: 20px;">
				<b>Order ID - #<?=$orders['id'];?></b>
				<div class="row" style="margin-top:20px;">
					<div class="col-md-12">
						<div class="col-md-2 float-left">
							<img src="<?=$base_url;?>assets/images/fruits/<?=$orders['image'];?>" style="width:100%;height:100px;">
						</div>
						<div class="col-md-3 float-left">
							<h4><b><?=$orders['crop_name'];?></b></h4>
							<p>Qty : <?=$orders['quantity'];?></p>
						</div>
						<div class="col-md-2 float-left">
							<p>Status</p>
							<p><span class="btn btn-warning">COMPLETED</span></p>
						</div>
						<div class="col-md-4 float-right">
							<p>Expected Delivery Date</p>
							<h4><?=date("d M Y",strtotime($orders['ordered_date']));?></h4>
						</div>
					</div>
				</div>
				<div class="farmer-list row">
					<h3>Seller Details</h3>
					<div class="col-md-12">
						<p>Seller Name : <b><?=$orders['farmer_name'];?></b></p>
						<p>Phone : <b><?=$orders['phone'];?></b></p>
						<p>Address : <b><?=$orders['address1'].", ".$orders['address2'].", ".$orders['city'].", ".$orders['state'].", ".$orders['zip'];?></b></p>
					</div>
					<div id="map"></div>
					<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDg9ysr-jzELGOJc3QVXC0aoiNJ4fmIsf0&callback=initMap">
			    </script>

				 <script>
			      function initMap(lat,long) {
			        var uluru = {lat: <?=$latitude;?>, lng:<?=$longitude;?>};
			        var map = new google.maps.Map(document.getElementById('map'), {
			          zoom: 14,
			          center: uluru
			        });
			        var marker = new google.maps.Marker({
			          position: uluru,
			          map: map
			        });
			      }
			    </script>
				</div>
			</div>
		</div>
	</div>
</body>
<?php
	require 'includes/footer.php';
?>