<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

        if($_POST) {
                include( 'PHPMailer.php' );
                include( 'SMTP.php' );
                $mail = new PHPMailer( true );                              // Passing `true` enables exceptions
                try {
                        //Server settings
                        $sendmail = '409627622@qq.com'; //sender address
                        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host       = 'smtp.qq.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth   = true;                               // Enable SMTP authentication
                        $mail->Username   = '409627622@qq.com';                 // SMTP username
                        $mail->Password   = 'dbjowbyufadabggc';                           // SMTP password
                        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port       = 465;                                    // TCP port to connect to

                        //Recipients
                        $mail->setFrom(  $sendmail , $_POST['name'] );
                        $mail->addAddress( $_POST['email'], $_POST['name']);     // Add a recipient
                        $mail->addReplyTo(  $sendmail , 'Information' );

                        //Content
                        $mail->isHTML( true );                                  // Set email format to HTML
                        $mail->Subject = $_POST['name'];
                        $mail->Body    =  $_POST['message'];
                        $mail->AltBody = $_POST['message'];
						//$mail->SMTPDebug=1;
                        $mail->send();
                        echo 'Send Successfully';
                } catch ( Exception $e ) {
                        echo 'Sorry：', $mail->ErrorInfo;
                }
        }
        ?>