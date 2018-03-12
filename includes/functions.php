<?php
function get_crops()
{
	global $con;
	$i=0;$result = array();
	$sql = mysqli_query($con,"select * from crops");
	while ($r=mysqli_fetch_array($sql))
	{
		$result[$i]['id'] = $r['id'];
		$result[$i]['name'] = $r['name'];
		$result[$i]['filter_name'] = strtolower($r['name']);
		$result[$i]['image'] = $r['image'];
		$i++;
	}
	return $result;
}
function get_crop_by_id($id='')
{
	global $con;
	$result = array();
	$sql = mysqli_query($con,"select * from crops where id='".$id."'");
	$r=mysqli_fetch_array($sql);
	$result['id'] = $r['id'];
	$result['name'] = $r['name'];
	$result['filter_name'] = strtolower($r['name']);
	$result['image'] = $r['image'];
	return $result;
}

function get_farmers_by_crop($id='')
{
	global $con;
	$i=0;$result = array();
	$sql = mysqli_query($con,"select a.*,a.id as row_id,b.* from farmer_crops a ,users b where a.crop_id='".$id."' and a.farmer_id=b.id");
	while ($r=mysqli_fetch_array($sql))
	{
		$result[$i]['id'] = $r['row_id'];
		$result[$i]['farmer_name'] = $r['name'];
		$result[$i]['farmer_id'] = $r['farmer_id'];
		$result[$i]['crop_id'] = $r['crop_id'];
		$result[$i]['quantity'] = $r['quantity'];
		$result[$i]['price'] = $r['price'];
		$result[$i]['created_date'] = $r['created_date'];
		$i++;
	}
	return $result;
}
function get_user_data()
{
	if(isset($_SESSION['user']))
	{
		return $_SESSION['user'];
	}
	else
		return null;
}
?>