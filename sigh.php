<?php
if(isset($_POST['email']) && isset($_POST['pass'])  && isset($_POST['username'])){

	include $_SERVER['DOCUMENT_ROOT'].'\jamb/ZBLOG/Database/conn.php';


	$fullname =trim( mysqli_real_escape_string($conn, $_POST['username']));
	$email =trim( mysqli_real_escape_string($conn, $_POST['email']));
	$password =trim( mysqli_real_escape_string($conn, $_POST['pass']));



		$stmt = mysqli_stmt_init($conn);
		$sql_statement = "SELECT * FROM myblog WHERE email = ?    OR  username = ? ";

		if(!mysqli_stmt_prepare($stmt,$sql_statement)){
			header('location:\jamb/ZBLOG/login_sigh/sigh.php?Error with Database  ');
			exit();
		}

		mysqli_stmt_bind_param($stmt,'ss',$email,$fullname);
		mysqli_stmt_execute($stmt);
		$resultFrombase = mysqli_stmt_get_result($stmt);

		if($row = mysqli_fetch_assoc($resultFrombase)){
			echo "
				<div class='notification has-background-warning has-text-weight-semibold mb-4'  >THIS USER IS ALREADY REGISTED
				
				</div>

				 ";
		}
		else{
			$insertdase = "INSERT INTO myblog(username,email,password)
			VALUES(?,?,?)";


			if(!mysqli_stmt_prepare($stmt,$insertdase)){
				echo "
				<div class='notification has-background-warning has-text-weight-semibold mb-4'  >ERRO WITH INSERTING
				
				</div>

				 ";
			}

			else{
				$password_hased = password_hash($password, PASSWORD_DEFAULT);
				mysqli_stmt_bind_param($stmt,'sss',$fullname,$email,$password_hased);
				mysqli_stmt_execute($stmt);
				echo " 
<div class=' has-background-success has-text-weight-semibold is-size-4 is-4'>
	<h1>Your Account has been Created Procced to login  </h1>
</div>
    ";



			}
			
		}


































}