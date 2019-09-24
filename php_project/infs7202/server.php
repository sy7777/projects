<?php
        include( 'connection.php' );
        $Username = "";
        $Email    = "";
        $errors   = array();
        if ( isset( $_POST['register'] ) ) {
                $Username   = mysqli_real_escape_string( $db, $_POST['Username'] );
                $Email      = mysqli_real_escape_string( $db, $_POST['Email'] );
                $Password_1 = mysqli_real_escape_string( $db, $_POST['Password_1'] );
                $Password_2 = mysqli_real_escape_string( $db, $_POST['Password_2'] );
                $Phone      = mysqli_real_escape_string( $db, $_POST['Phone'] );

                if ( empty( $Username ) || empty( $Email ) || empty( $Password_1 ) ) {
                        array_push( $errors, "Fill the field. " );
                        exit();
                } else {
                        $search = "SELECT * FROM users WHERE Username='" . $Username . "'";
                        $result = mysqli_query( $db, $search );
                        if ( mysqli_fetch_assoc( $result ) ) {
                                array_push( $errors, "Username already exist." );
                        } else {
                                $sql = "INSERT INTO users (Username, Password, Phone, Email)
	 		VALUES('$Username', '$Password_1', '$Phone', '$Email')";
                                /*
                                错误提示
                                上面的SQL代码错误，数据库字段有个status，而且不能为空，这里没有给status值
                                */
                                if ( mysqli_query( $db, $sql ) ) //高版本的PHP不支持mysql_query,请使用mysqli_query,多了一个i
                                {
                                        echo "insert successfully!";
                                } else {
                                        echo "insertion failed! SQL: $sql<br> Error:" . mysqli_error();
                                } //这里也是一样的少了一个i
                                $result = mysqli_query( $db, $sql );
                                header( "location:login.php" );
                        }
                }
        }

        if ( isset( $_POST['login'] ) ) {
                $Username = mysqli_real_escape_string( $db, $_POST['Username'] );
                $Password = mysqli_real_escape_string( $db, $_POST['Password'] );

                $query  = "SELECT * FROM users WHERE Username='$Username' AND Password='$Password'";
                $result = mysqli_query( $db, $query );

// 	if(mysqli_fetch_assoc($result){
// 		header("location:index.php");	
// 	}else{
// 		array_push($errors, "wrong name or password");
// 	}
// }
                $fetch    = mysqli_fetch_assoc( $result );
                $Username = $fetch['Username'];

                $num = mysqli_num_rows( $result );

                if ( $num != 0 ) {
                        $_SESSION['Username'] = $Username;
                        $_SESSION['success']  = "You are now logged in";
                        header( "location:chat.php" );
                } else {
                        array_push( $errors, "wrong name or password" );
                }
        }

        if ( isset( $_GET['logout'] ) ) {
                session_destroy();
                unset( $_SESSION['Username'] );
                header( 'location:login.php' );
        }
?>