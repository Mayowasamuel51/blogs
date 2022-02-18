<?php  
session_start();
if(isset($_POST['note']) && isset($_POST['email']) ){
	include $_SERVER['DOCUMENT_ROOT'].'\jamb/ZBLOG/Database/conn.php';
	$note  = mysqli_real_escape_string($conn, $_POST['note']);
	$email  = mysqli_real_escape_string($conn, $_POST['email']);




	// check if this emaill exit in the database 


	$stmt = mysqli_stmt_init($conn);
	$sql_statement = "SELECT email FROM myblog  WHERE  email = ? ";

	if(!mysqli_stmt_prepare($stmt,$sql_statement)){
		echo "<div class='title notification' > Error with the database   </div>";
		exit();
	}else{

		mysqli_stmt_bind_param($stmt,'s',$email);
		mysqli_stmt_execute($stmt);
		$resultFrombase = mysqli_stmt_get_result($stmt);
		$count_user = mysqli_num_rows($resultFrombase);
		if($count_user >0){
			// transfer the note to the disred email
			// $querybase = "SELECT * FROM myblog";
			// $conn_sql  = mysqli_query($conn, $querybase);

			$insert_note = "INSERT into  messages(email, message, sentby) VALUES('".$email."','".$note."', '".$_SESSION['email']."' )";
			$conn_sql  = mysqli_query($conn, $insert_note);
			if ($conn_sql == true) {
				echo  "
				<div class='mt-5 notification has-background-success has-text-weight-semibold mb-4'  >Message Devilverd
			
				</div>

			 ";
			}




		}else{
			echo "
				<div class='mt-5 notification has-background-warning has-text-weight-semibold mb-4'  >THIS USER IS NOT FOUND
			
				</div>

			 ";
		}
	}




}

