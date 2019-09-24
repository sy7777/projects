<?php
        // var_dump( $_POST );
        if ( isset( $_POST["action"] ) ) {
                // $connect = mysqli_connect( "localhost", "root", "qzl201200", "119" );
                $connect = mysqli_connect( "localhost", "root", "20905", "registration" );
                if ( $_POST["action"] == "fetch" ) {
                        if ( $_POST['ws_date'] ) {
                                $start = $_POST['ws_date'] . ' 00:00:00';
                                $end   = $_POST['ws_date'] . ' 23:59:59';
                                $query = "SELECT * FROM tbl_images WHERE  add_time  between '" . $start . "' and '" . $end . "' ORDER BY id DESC";
                        } else {
                                $query = "SELECT * FROM tbl_images ORDER BY id DESC";
                        }
                        $result = mysqli_query( $connect, $query );
                        $output = '
                                   <table class="table table-bordered table-striped">  
                                    <tr>
                                     <th width="10%">Add time</th>
                                     <th width="70%">Image</th>
                                     <th width="10%">Change</th>
                                     <th width="10%">Remove</th>
                                    </tr>
                                  ';
                        if($result) {
                                while ( $row = mysqli_fetch_array( $result ) ) {
                                        $output .= '
                                    <tr>
                                     <td>' . $row["add_time"] . '</td>
                                     <td>
                                      <img src="data:image/jpeg;base64,' . base64_encode( $row['name'] ) . '" height="60" width="75" class="img-thumbnail" />
                                     </td>
                                     <td><button type="button" name="update" class="btn btn-warning bt-xs update" id="' . $row["id"] . '">Change</button></td>
                                     <td><button type="button" name="delete" class="btn btn-danger bt-xs delete" id="' . $row["id"] . '">Remove</button></td>
                                    </tr>
                                   ';
                                }
                        }
                        $output .= '</table>';
                        echo $output;
                }

                if ( $_POST["action"] == "insert" ) {

                        $file = addslashes( file_get_contents( $_FILES["image"]["tmp_name"] ) );
//echo $file ;
                        $query = "INSERT INTO tbl_images(name,add_time) VALUES ('$file','" . date( 'Y-m-d H:i:s', time() ) . "')";
                        if ( mysqli_query( $connect, $query ) ) {
                                echo 'Image Inserted into Database';
                        } else {
                                die( "Connection failed: " . mysqli_error( $connect ) );
                                echo 123123;
                        }

                }
                if ( $_POST["action"] == "update" ) {
                        $file  = addslashes( file_get_contents( $_FILES["image"]["tmp_name"] ) );
                        $query = "UPDATE tbl_images SET name = '$file' WHERE id = '" . $_POST["image_id"] . "'";
                        if ( mysqli_query( $connect, $query ) ) {
                                echo 'Image Updated into Database';
                        }
                }
                if ( $_POST["action"] == "delete" ) {
                        $query = "DELETE FROM tbl_images WHERE id = '" . $_POST["image_id"] . "'";
                        if ( mysqli_query( $connect, $query ) ) {
                                echo 'Image Deleted from Database';
                        }
                }
        }
?>
