<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/styles.css" rel="stylesheet">
</head>

<body>
	<?php
	if (isset($_POST['sbm'])) {
		$mail = $_POST['email'];
		$pass = $_POST['password'];
		$sql = "SELECT * FROM users WHERE email = '$mail' AND password = '$pass'";
		$query = mysqli_query($connect,$sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows > 0) {
			$_SESSION['mail'] = $mail;
			$_SESSION['pass'] = $pass;
			header('location: index.php');
		}else{
			$error = '<div class="alert alert-danger">Tài khoản không hợp lệ !</div>';
		}
	}	
	?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<?php if(isset($error)){echo $error;} ?>
				<div class="panel-body">
					<form role="form" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" required placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type="submit" name="sbm" class="btn btn-dark">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
</body>

</html>