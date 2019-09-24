<?php
        include( 'server.php' );
        if(isset($_SESSION['Username'])) {
                echo $_SESSION['Username'];
                $_SESSION['Username'];
                exit;
        }
        ?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Log in</title>
        <link rel="stylesheet" type="text/css" href="css/menu_style.css"/>
        <link href="css/bootstrap_login.css" rel="stylesheet" type='text/css' media="all"/>
        <link href="css/style_login.css" rel="stylesheet" type='text/css' media="all"/>

        <script src="https://cdn.bootcss.com/jquery/1.10.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
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
        <h1 class="w3ls">Log in Form</h1>
        <div class="content-agileits">
                <form action="login.php" method="post" data-toggle="validator" role="form">
                        <?php include( 'errors.php' ); ?>
                        <div id="login_error" class="form-group agileits w3">
                                <label for="username" class="control-label">Username</label>
                                <input type="text" name="Username" class="form-control" id="username Username"
                                       placeholder="Userame" data-error="Enter Your Uername" required>
                                <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group agile w3-agile">
                                <label for="inputPassword" class="control-label">Password</label>
                                <div class="form-inline row">
                                        <div class="form-group col-sm-6">
                                                <input type="password" name="Password" data-minlength="6"
                                                       class="form-control" id="inputPassword Password"
                                                       placeholder="Password" required>
                                                <div class="help-block">Minimum of 6 characters</div>
                                        </div>
                                </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" name="login" id="login" class="btn btn-lg">Submit</button>
                        </div>
                        <p class="footer">
                                Not yet a member? <a href="register.php">Register</a>
                        </P>
                </form>
        </div>

</content>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>
</body>
</html>