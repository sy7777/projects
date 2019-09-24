<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link rel="stylesheet" type="text/css" href="css/menu_style.css" />
<link href="css/bootstrap_login.css" rel="stylesheet" type='text/css' media="all" />
<link href="css/style_login.css" rel="stylesheet" type='text/css' media="all" />

<script src="https://cdn.bootcss.com/jquery/1.10.0/jquery.min.js"></script>
<script type="text/javascript" src="js/menu.js"></script>

</head>
<body>
<div class="nav">
 <ul>
  <li class="nav-item">
   <a href="javascript:;">Menu<span class="a_ico"></span></a>
   <ul>
   <li><a href="login.php">Log in</a></li>
   <li><a href="register.php">Register</a></li>
   <li><a href="chat.php">Group Chat</a></li>
   </ul>
  </li>


 </ul>
</div>
<content>
	<h1 class="w3ls">Signup Form</h1>
	<div class="content-agileits">
		<form action="register.php" method="post" data-toggle="validator" role="form">
		<?php include('errors.php');?> 			
			<div class="form-group agileits w3">
				<label for="username" class="control-label">Username</label>
				<input type="text" name="Username" value="<?php echo($Username); ?>"class="form-control" id="username" placeholder="Userame" data-error="Enter Your Uername" required>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group w3l agileinfo wthree w3-agileits">
				<label for="inputEmail" class="control-label">Email</label>
				<input type="email" name="Email" value="<?php echo($Email); ?>"class="form-control" id="inputEmail" placeholder="Email" data-error="This email address is invalid" required>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group agileinfo wthree w3-agileits agile">
				<label for="Phone" class="control-label">Phone</label>
				<input type="text" name="Phone" class="form-control" id="Phone" placeholder="Phone" data-error="Enter Your Phone Number" required>
				<div class="help-block with-errors"></div>
			</div>
			<div class="form-group agile w3-agile">
				<label for="inputPassword" class="control-label">Password</label>
				<div class="form-inline row">
					<div class="form-group col-sm-6">
						<input type="password" name="Password_1" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
						<div class="help-block">Minimum of 6 characters</div>
					</div>
				</div>

				<div class="form-group agile w3-agile">
					<label for="inputPassword" class="control-label">Confirm your Password</label>
					<div class="form-inline row">
					<div class="form-group col-sm-6 w3-agile">
						<input type="password"name="Password_2" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm Password" required>
						<div class="help-block with-errors"></div>
					</div>
				</div>
				</div>
				</div>

			<div class="form-group">
				<button type="submit" name="register" class="btn btn-lg">Submit</button>
			</div>
			<p class="footer" >
				Already a member? <a href="login.php">Log in</a>
			</P>
		</form>
    </div>

</content>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>
</body>
</html>