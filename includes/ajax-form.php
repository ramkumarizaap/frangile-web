<?php
require 'config.php';
if(isset($_POST))
{
	$output=array();
	$user_id = $_SESSION['user']['id'];
	$farmer_id = $_POST['farmer_id'];
	$crop_id = $_POST['crop_id'];
	$qty = $_POST['quantity'];
	$chk_qty = mysqli_query($con,"select * from farmer_crops where crop_id='".$crop_id."' and farmer_id='".$farmer_id."'");
	$r = mysqli_fetch_array($chk_qty);
	if($r['quantity'] < $qty)
	{
		$output['status'] = "error";
		$output['msg'] = "Quantity is greater than available quantity.";
	}
	else
	{
		$price = $r['price'];
		$total = $r['price'] * $qty;
		$new_qty = $r['quantity'] - $qty;
		$ins = mysqli_query($con,"insert into orders(user_id,crop_id,farmer_id,quantity,price,total_price)values('".$user_id."','".$crop_id."','".$farmer_id."','".$qty."','".$price."','".$total."')");
		$up = mysqli_query($con,"update farmer_crops set quantity='".$new_qty."' where crop_id='".$crop_id."' and farmer_id='".$farmer_id."'");
		$output['status'] = "success";
		$output['msg'] = "Order placed successfully.";
	}
	echo json_encode($output);
}
?>