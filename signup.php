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
		                <h1>Signup</h1>
		                <p class="error">
		                	<?php 
		                		if(isset($_SESSION['signup_error']))
		                			{
		                				?>
		                				<div class="alert alert-danger dismissible">
		                					<?=$_SESSION['signup_error'];?>
		                				</div>
		                				<?php
		                				unset($_SESSION['signup_error']);
		                			}
		                			if(isset($_SESSION['signup_success']))
		                			{
		                				?>
		                				<div class="alert alert-success dismissible">
		                					<?=$_SESSION['signup_success'];?>
		                				</div>
		                				<?php
		                				unset($_SESSION['signup_success']);
		                			}
		                			?>
		                </p>
		                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
		                    	<div class="form-group">
                            <label for="email" class="sr-only">Name</label>
                            <input type="name" name="name" id="name" class="form-control" placeholder="Name">
                            <p class="error"><?=isset($_SESSION['name_err'])?$_SESSION['name_err']:"";?></p>
		                      </div>
	                        <div class="form-group">
                            <label for="email" class="sr-only">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                            <p class="error"><?=isset($_SESSION['phone_err'])?$_SESSION['phone_err']:"";?></p>
	                        </div>
	                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email-ID">
                            <p class="error"><?=isset($_SESSION['email_err'])?$_SESSION['email_err']:"";?></p>
	                        </div>
	                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            <p class="error"><?=isset($_SESSION['password_err'])?$_SESSION['password_err']:"";?></p>
	                        </div>
		                       <input type="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" name="submit" value="Register">
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
	$email = $_POST['email'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	if($email =='')
	{
		$_SESSION['email_err'] = "Please Enter Email-ID";
	}
	if($password =='')
	{
		$_SESSION['password_err'] = "Please Enter Password";
	}
	if($name =='')
	{
		$_SESSION['name_err'] = "Please Enter Name";
	}
	if($phone =='')
	{
		$_SESSION['phone_err'] = "Please Enter Phone Number";
	}
	if($email !='' && $password!='')
	{
		$chk_user = check_email($email);
		if($chk_user)
		{
			$_SESSION['signup_error'] = "Email already exists.";
		}
		else
		{
			$register = user_register($email,$password,$name,$phone);
			if($register)
				$_SESSION['signup_success'] = "Registered Successfully.";
			else
				$_SESSION['signup_error'] = "Can't able to register.";
		}
	}
	// header("Location:".$base_url."signup.php");
}
else
{
	if(isset($_SESSION['password_err']) || isset($_SESSION['name_err']) || isset($_SESSION['phone_err']) || isset($_SESSION['email_err']) || isset($_SESSION['signup_error']))
	{
		unset($_SESSION['signup_error']);
		unset($_SESSION['password_err']);
		unset($_SESSION['name_err']);
		unset($_SESSION['email_err']);
		unset($_SESSION['phone_err']);
	}
}
?>