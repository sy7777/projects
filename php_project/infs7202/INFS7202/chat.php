<?php
        include( 'server.php' );
        if (!isset($_SESSION['Username'] ) ) {
                header( "location:login.php" );
                exit;
        }
?>
<!doctype html>
<html>
<head>
        <meta charset="utf-8">
        <title>Lets Chat</title>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/chat.css" rel="stylesheet" type='text/css' media="all"/>
        <link rel="stylesheet" type="text/css" href="css/menu_style.css"/>
        <link rel="stylesheet" type="text/css" href="css/style_login.css"/>
        <script src="https://cdn.bootcss.com/jquery/1.10.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/chat.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
        <?php
                include( 'server.php' );
                //session_start();
                if ( isset( $_SESSION['Username'] ) ) {
                } else {
                        header( 'location:chat.php' );
                }
        ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
                $(document).ready(function () {
                        $(document).bind('keypress', function (e) {
                                if (e.keyCode == 13) {
                                        $('#my_form').submit();
                                        $('#comment').val("");
                                }
                        });
                });
        </script>
        <script type="text/javascript">
                function post() {
                        var comment = document.getElementById("comment").value;
                        var name = document.getElementById("Username").value;
                        if (comment && name) {
                                $.ajax
                                ({
                                        type: 'post',
                                        url: 'commentajax.php',
                                        data:
                                                {
                                                        user_comm: comment,
                                                        user_name: name
                                                }, success: function (response) {
                                                document.getElementById("comment").value = "";
                                        }
                                });
                        }

                        return false;
                }
        </script>
        <script>
                function autoRefresh_div() {
                        $("#result").load("load.php").show();// a function which will load data from other file after x seconds
                }

                setInterval('autoRefresh_div()', 1000);
        </script>
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


                <li class="nav-item">
                        <a href="javascript:;">More<span class="a_ico"></span></a>
                        <ul>
                                <li><a href="image.php">Upload Pictures</a></li>
                                <li><a href="contact.html">contact</a></li>
                                <li><a href="pdf.php">PDF</a></li>
                        </ul>
                </li>
        </ul>
</div>
<div id="logout">
        <a href="logout.php" style="text-decoration:none; color: white;"><i class="fa fa-sign-out"
                                                                            aria-hidden="true"></i>Logout</a>
</div>

<div id="container">

        <div id="session-name">
                Your Name: <input type="text" value="<?= $_SESSION['Username'] ?>" class="session-text" disabled>
        </div>

        <div id="result-wrapper">
                <div id="result">
                        <?php
                                include( "load.php" );
                        ?>
                </div>
        </div>

        <form method='post' action="chat.php" onsubmit="return post();" id="my_form" name="my_form">
                <div id="form-container">
                        <div class="form-text">
                                <input type="text" style="display:none" id="Username"
                                       value="<?= $_SESSION['Username'] ?>">
                                <textarea name="comment" id="comment"></textarea>
                        </div>
                        <div class="form-btn">
                                <input type="submit" value="send" id="btn send" name="send"/>
                        </div>
                </div>
        </form>

</div>
</body>
</html>