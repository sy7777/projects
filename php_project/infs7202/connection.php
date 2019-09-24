<?php
        if (!session_id()) session_start();
        // $db = mysqli_connect( 'localhost', 'root', 'qzl201200', '119' );
			$db = mysqli_connect( 'localhost', 'root', '20905', 'registration' );
        if ( ! $db ) {
                die( "Connection failed: " . mysqli_connect_error() );

        }
?>