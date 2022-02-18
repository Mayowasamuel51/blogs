<?php  
session_start();
if(isset($_POST['title']) && isset($_POST['time'])  && isset($_POST['date'])  && isset($_POST['content'])){
	include $_SERVER['DOCUMENT_ROOT'].'\jamb/ZBLOG/Database/conn.php';
	$title = mysqli_real_escape_string($conn, $_POST['title']);

	$time =mysqli_real_escape_string($conn, $_POST['time']);

	$date =mysqli_real_escape_string($conn, $_POST['date']);


	$content =mysqli_real_escape_string($conn, $_POST['content']);

	$wirter =  mysqli_real_escape_string($conn, $_POST['wirter']);



	$insertdase = "INSERT INTO uploadblog(email,blogtitle,time, date, blogcontent,wirter)
			VALUES('".$_SESSION['email']."', '".$title."','".$time."','".$date."','".$content."', '".$_SESSION['wirter']."')";
	$querybase = mysqli_query($conn,$insertdase);
	if ($querybase == true ) {
		echo "<div class='title'>
				<h3>YOUR BLOG  HAS BEEN UPLOADED</h3>
		</div";
	}else{
		echo "false";
	}




// 		$stmt = mysqli_stmt_init($conn);
// 		$insertdase = "INSERT INTO uploadblog(email,blogtitle,time, date, blogcontent)
// 			VALUES(?,?,?,?,?)";




// 		if(!mysqli_stmt_prepare($stmt,$sql_statement)){
// 			header('location:\jamb/ZBLOG/login_sigh/sigh.php?Error with Database  ');
// 			exit();
// 		}else{
			
// 		}






// 		mysqli_stmt_bind_param($stmt,'ss',$email,$fullname);
// 		mysqli_stmt_execute($stmt);
// 		$resultFrombase = mysqli_stmt_get_result($stmt);

// 		if($row = mysqli_fetch_assoc($resultFrombase)){
// 			echo "
// 				<div class='notification has-background-warning has-text-weight-semibold mb-4'  >THIS USER IS ALREADY REGISTED
				
// 				</div>

// 				 ";
// 		}
// 		else{
// 			$insertdase = "INSERT INTO myblog(username,email,password)
// 			VALUES(?,?,?)";


// 			if(!mysqli_stmt_prepare($stmt,$insertdase)){
// 				echo "
// 				<div class='notification has-background-warning has-text-weight-semibold mb-4'  >ERRO WITH INSERTING
				
// 				</div>

// 				 ";
// 			}

// 			else{
// 				$password_hased = password_hash($password, PASSWORD_DEFAULT);
// 				mysqli_stmt_bind_param($stmt,'sss',$fullname,$email,$password_hased);
// 				mysqli_stmt_execute($stmt);
// 				echo " 
// <div class=' has-background-success has-text-weight-semibold is-size-4 is-4'>
// 	<h1>Your Account has been Created Procced to login  </h1>
// </div>
//     ";



// 			}
			
// 		}






































}



