<?php 
session_start();
echo $_SESSION['blogtitle'];
echo "<br>";

if (isset($_POST['find'])) {
	include $_SERVER['DOCUMENT_ROOT'].'\jamb/ZBLOG/Database/conn.php';
	
	$input_title = trim(mysqli_real_escape_string($conn,$_POST['input_title']));

	// a user sholud be able to access there own blogs or stories ......
	// $start_statement =  "SELECT *  from uploadblog where ".$_SESSION['blogtitle']." = ".$input_title." ";
	// $start_query =mysqli_query($conn, $start_statement);
	// $query_find = mysqli_fetch_assoc($start_query);


	// if($query_find) {
	//  // echo $query_find['blogtitle'];
	// 	$_SESSION['blogtitle'] = $query_find['blogtitle'];

	// 	echo $_SESSION['blogtitle'];
	// // if ($_SESSION['blogtitle']) {
	// // 	echo $_SESSION['blogtitle'];
		
	// // }else{
	// // 	echo "not found";
	// // }
	
	// }	
		












	$sql_statement ="SELECT blogtitle  from uploadblog where ".$_SESSION['blogtitle']."  REGEXP '".$input_title."'  ";
	$querybase =mysqli_query($conn, $sql_statement);


	$row_data = mysqli_fetch_assoc($querybase);

	if($row_data== true){

		 echo "
	 <html lang='en'>
	<head>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		<title>Dashboard </title>
		<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css'>
	
	</head>
	<body>
		<div class='columns mt-6'>
			<div class='notification has-background-success has-text-weight-semibold mb-4  column is-offset-4  is-4'  >
			".$row_data['blogtitle']."
		<h1 class='has-text-weight-semibold  has-text-centered mb-4'></h1>
				
		</div>
		</div>
	</body>
	</html>

		 ";











	}else{
		echo "bad input";
	}































}