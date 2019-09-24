<?php
        if (!session_id()) session_start();
        $db = mysqli_connect( 'localhost', 'root', '45fd3c4ce2f5e493', 'registration' );
        if ( ! $db ) {
                die( "Connection failed: " . mysqli_connect_error() );

        }
?>