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
function get_farmer_crops($id)
{
	global $con;
	$i=0;$result = array();
	$sql = mysqli_query($con,"select a.*,a.id as row_id,b.name as crop,b.image,b.id as crop_id from farmer_crops a,crops b where a.crop_id=b.id and a.farmer_id='".$id."'");
	while ($r=mysqli_fetch_array($sql))
	{
		$result[$i]['id'] = $r['row_id'];
		$result[$i]['crop'] = $r['crop'];
		$result[$i]['crop_id'] = $r['crop_id'];
		$result[$i]['filter_name'] = strtolower($r['crop']);
		$result[$i]['quantity'] = strtolower($r['quantity']);
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

function get_farmer_crop_by_id($id='')
{
	global $con;
	$result = array();
	$sql = mysqli_query($con,"select a.*,a.id as row_id,b.name as crop,b.image from farmer_crops a,crops b where a.crop_id=b.id and a.crop_id='".$id."'");
	$r=mysqli_fetch_array($sql);
	$result['id'] = $r['id'];
	$result['row_id'] = $r['row_id'];
	$result['name'] = $r['crop'];
	$result['image'] = $r['image'];
	$result['quantity'] = $r['quantity'];
	$result['price'] = $r['price'];
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
function check_login($mail,$password)
{
	global $con;
	$sql = mysqli_query($con,"select * from users where email='".$mail."' and password='".$password."'");
	if(mysqli_num_rows($sql))
	{
		$r = mysqli_fetch_array($sql);
		$_SESSION['user'] = $r;
		return true;
	}
	else
	{
		return false;
	}
}
function check_farmer_login($aadhar)
{
	global $con;
	$sql = mysqli_query($con,"select * from users where uid='".$aadhar."'");
	if(mysqli_num_rows($sql))
	{
		$r = mysqli_fetch_array($sql);
		$_SESSION['user'] = $r;
		return true;
	}
	else
	{
		return false;
	}
}
function check_email($mail)
{
	global $con;
	$sql = mysqli_query($con,"select * from users where email='".$mail."'");
	if(mysqli_num_rows($sql))
	{
		return true;
	}
	else
	{
		return false;
	}
}
function user_register($mail,$password,$name,$phone)
{
	global $con;
	$sql = mysqli_query($con,"insert into users(name,phone,email,password,role)values('".$name."','".$phone."','".$mail."','".$password."',2)");
	if($sql)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function get_orders($user_id='')
{
	global $con;$result = array();$i=0;
	$sql = mysqli_query($con,"select a.*,a.id as order_id,b.name as crop_name from orders a,crops b where a.user_id='".$user_id."' and a.crop_id=b.id");
	if(mysqli_num_rows($sql))
	{
		while($r = mysqli_fetch_array($sql))
		{
			$res[$i]['order_id'] = $r['order_id'];
			$res[$i]['crop_name'] = $r['crop_name'];
			$res[$i]['date'] = date("d/m/Y h:i a",strtotime($r['created_date']));
			$res[$i]['total'] = $r['total_price'];
			$res[$i]['status'] = "Completed";
			$i++;
		}
		return $res;
	}
	else
	{
		return false;
	}
}
function get_order_by_id($id='')
{
	global $con;
	$sql = mysqli_query($con,"select a.*,b.*,b.name as crop_name,a.created_date as ordered_date,c.name as farmer_name,c.city,c.state,c.address1,c.address2,c.phone,c.zip from orders a,crops b,users c where a.crop_id=b.id and a.id='".$id."' and a.farmer_id=c.id");
	if(mysqli_num_rows($sql))
	{
		$r = mysqli_fetch_array($sql);
		return $r;
	}
	else
	{
		return false;
	}
}
?>