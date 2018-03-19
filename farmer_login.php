<?php
	require('includes/config.php');
	require('includes/header.php');
	require('includes/functions.php');
?>
<body>
	<div class="wrapper">
		<?php require('includes/topbar.php');?>
		<section id="login">
		    <div class="container">
		    	<div class="row">
		    	    <div class="col-md-6" style="margin:0 auto;padding-top:40px;">
		        	    <div class="form-wrap">
		                <h1>Farmer Login</h1>
		                <p class="error"><?=isset($_SESSION['login_error'])?$_SESSION['login_error']:"";?></p>
		                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
		                        <div class="form-group">
		                            <label for="email" class="sr-only">Aadhar Number</label>
		                            <input type="text" name="aadhar" id="aadhar" class="form-control" placeholder="Aadhar Number">
		                            <p class="error"><?=isset($_SESSION['aadhar_err'])?$_SESSION['aadhar_err']:"";?></p>
		                        </div>
		                        <input type="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" name="submit" value="Login">
		                    </form>
		                    <hr>
		        	    </div>
		    		</div> <!-- /.col-xs-12 -->
		    	</div> <!-- /.row -->
		    </div> <!-- /.container -->
		</section>
	</div>
</body>
<?php
require('includes/footer.php')
?>
<?php
if(isset($_POST['submit']))
{
	unset($_SESSION['aadhar_err']);
	unset($_SESSION['login_error']);
	$aadhar = $_POST['aadhar'];
	if($aadhar =='')
	{
		$_SESSION['aadhar_err'] = "Please Enter Aadhar Number";
	}
	if($aadhar !='')
	{
		$chk = check_farmer_login($aadhar);
		if($chk)
		{
			header("Location:".$base_url."crop_list.php");
		}
		else
		{
			$_SESSION['login_error'] = "Invalid Aadhar Number";
		}
	}
}

?>