<?php
include("connection.php");
//session_start();
//if (isset($_POST['send'])){
/*	$Username = $_POST['Username'];
	$comment = $_POST['comment'];
	$query = "INSERT INTO comments(Username, comment, post_time) VALUES('$Username', '$comment',CURRENT_TIMESTAMP)";*/
/*	$run = $con->query($query);
	while($row = $run->fetch_array()) :
		?>
			<div id="chats">
				<span style="color:green;"><?php echo $row['name']; ?></span> :
				<span style="color:brown;"><?php echo $row['msg']; ?></span>
				<p style="float:right"><?php echo date("j/m/Y g:i:sa", strtotime($time))?></p>
			</div>
			<?php */

 	//$run = mysqli_query($db, $query);
	 $comm = mysqli_query($db,"SELECT * from comments");
 while($row=mysqli_fetch_array($comm)){
	$Username=$row['Username'];
 	$comment=$row['comment'];
    $time=$row['post_time'];
?>
 <div class="chats">
	<strong><?php echo $Username?>:</strong> 
	<?php echo $comment?> <p style="float:right">
	<?php echo date("j/m/Y g:i:sa", strtotime($time))?></p>
</div> 
<?php
}
?>