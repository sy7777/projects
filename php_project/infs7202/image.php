<?php
        if (!session_id()) session_start();
        if (!isset( $_SESSION['Username'] ) ) {
                header( "location:login.php" );
        }
?>

<!DOCTYPE html>
<html>
<head>
        <title> Image Insert Update Delete </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/menu_style.css"/>
        <link href="css/bootstrap_login.css" rel="stylesheet" type='text/css' media="all"/>
        <link href="css/style_login.css" rel="stylesheet" type='text/css' media="all"/>
        <script src="https://cdn.bootcss.com/jquery/1.10.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body style="color:#8baee5;">
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
<br/><br/>
<div class="container" style="width:900px;">
        <h3 align="center"> Image Insert Update Delete</h3>
        <br/>
        <div align="right">
                <input type="text" value="<?php echo date('Y-m-d');?>" id="datetimepicker" style="height:30px;line-height:30px;width:110px;text-align:center" readonly >
                <button type="button" name="add" id="add" class="btn btn-success">Add</button>
                <a href='pdf.php'>PDF</a>
        </div>
        <br/>
        <div id="image_data">

        </div>
</div>
</body>
</html>

<div id="imageModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add Image</h4>
                        </div>
                        <div class="modal-body">
                                <form id="image_form" method="post" enctype="multipart/form-data">
                                        <p><label>Select Image</label>
                                                <input type="file" name="image" id="image"/></p><br/>
                                        <input type="hidden" name="action" id="action" value="insert"/>
                                        <input type="hidden" name="image_id" id="image_id"/>
                                        <input type="submit" name="insert" id="insert" value="Insert"
                                               class="btn btn-info"/>

                                </form>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                </div>
        </div>
</div>

<script>
        $(document).ready(function () {
                $('#datetimepicker').datetimepicker({
                        format: 'yyyy-mm-dd',
                        autoclose:true,
                        minView:'month',
                });
                fetch_data();
                $('#datetimepicker').datetimepicker().on('changeDate', function(ev){
                        var ws_date = $("#datetimepicker").val();
                        fetch_data(ws_date);
                        });
                function fetch_data(ws_date =null) {
                        var action = "fetch";
                        $.ajax({
                                url: "action.php",
                                method: "POST",
                                data: {action: action,ws_date:ws_date},
                                success: function (data) {
                                        $('#image_data').html(data);
                                }
                        })
                }

                $('#add').click(function () {
                        $('#imageModal').modal('show');
                        $('#image_form')[0].reset();
                        $('.modal-title').text("Add Image");
                        $('#image_id').val('');
                        $('#action').val('insert');
                        $('#insert').val("Insert");
                });
                $('#image_form').submit(function (event) {
                        event.preventDefault();
                        var image_name = $('#image').val();
                        if (image_name == '') {
                                alert("Please Select Image");
                                return false;
                        }
                        else {
                                var extension = $('#image').val().split('.').pop().toLowerCase();
                                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                                        alert("Invalid Image File");
                                        $('#image').val('');
                                        return false;
                                }
                                else {
                                        $.ajax({
                                                url: "action.php",
                                                method: "POST",
                                                data: new FormData(this),
                                                contentType: false,
                                                processData: false,
                                                success: function (data) {
                                                        alert(data);
                                                        fetch_data();
                                                        $('#image_form')[0].reset();
                                                        $('#imageModal').modal('hide');
                                                }
                                        });
                                }
                        }
                });
                $(document).on('click', '.update', function () {
                        $('#image_id').val($(this).attr("id"));
                        $('#action').val("update");
                        $('.modal-title').text("Update Image");
                        $('#insert').val("Update");
                        $('#imageModal').modal("show");
                });
                $(document).on('click', '.delete', function () {
                        var image_id = $(this).attr("id");
                        var action = "delete";
                        if (confirm("Are you sure you want to remove this image from database?")) {
                                $.ajax({
                                        url: "action.php",
                                        method: "POST",
                                        data: {image_id: image_id, action: action},
                                        success: function (data) {
                                                alert(data);
                                                fetch_data();
                                        }
                                })
                        }
                        else {
                                return false;
                        }
                });
        });
</script>
