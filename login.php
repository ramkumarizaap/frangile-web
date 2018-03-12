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
		                <h1>Login</h1>
		                <p class="error"><?=isset($_SESSION['login_error'])?$_SESSION['login_error']:"";?></p>
		                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
		                        <div class="form-group">
		                            <label for="email" class="sr-only">Email</label>
		                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
		                            <p class="error"><?=isset($_SESSION['email_err'])?$_SESSION['email_err']:"";?></p>
		                        </div>
		                        <div class="form-group">
		                            <label for="key" class="sr-only">Password</label>
		                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
		                            <p class="error"><?=isset($_SESSION['password_err'])?$_SESSION['password_err']:"";?></p>
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
if(isset($_POST['submit']))
{
	unset($_SESSION['email_err']);
	unset($_SESSION['login_error']);
	unset($_SESSION['password_err']);
	$email = $_POST['email'];
	$password = $_POST['password'];
	if($email =='')
	{
		$_SESSION['email_err'] = "Please Enter Email-ID";
	}
	if($email =='')
	{
		$_SESSION['password_err'] = "Please Enter Password";
	}
	if($email !='' && $password!='')
	{
		$chk = check_login($email,$password);
		if($chk)
		{
			header("Location:".$base_url);
		}
		else
		{
			$_SESSION['login_error'] = "Invalid Username or Password";
		}
	}
}
?>