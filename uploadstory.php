<?php 



session_start();
if(isset($_POST['title']) && isset($_POST['time'])  && isset($_POST['date'])  && isset($_POST['content'])){
	include $_SERVER['DOCUMENT_ROOT'].'\jamb/ZBLOG/Database/conn.php';
	$title = mysqli_real_escape_string($conn, $_POST['title']);

	$time =mysqli_real_escape_string($conn, $_POST['time']);

	$date =mysqli_real_escape_string($conn, $_POST['date']);


	$content =mysqli_real_escape_string($conn, $_POST['content']);



	$insertdase = "INSERT INTO uploadstory(email,storytitle,time, date, storycontent)
			VALUES('".$_SESSION['email']."', '".$title."','".$time."','".$date."','".$content."')";
	$querybase = mysqli_query($conn,$insertdase);
	if ($querybase == true ) {
		echo "<div class='title'>
				<h3>YOUR Story  HAS BEEN UPLOADED</h3>
		</div";
	}else{
		echo "false";
	}




}