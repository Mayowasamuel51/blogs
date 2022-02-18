<?php 
session_start();

include $_SERVER['DOCUMENT_ROOT'].'\jamb/ZBLOG/Database/conn.php';
$sql_statement = "SELECT message, sentby  from messages where email= '".$_SESSION['email']."'  ";




$querybase = mysqli_query($conn,$sql_statement);


while ($row_data = mysqli_fetch_assoc($querybase)) {
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
			<h1 class='has-text-weight-semibold  has-text-centered mb-4'>Message Info </h1>
				<p class='has-text-weight-semibold'>Message::   		"  .$row_data['message']."</p>

				<h1 class='has-text-weight-semibold  mt-6'> Sent By :: ".$row_data['sentby']."</h1>
		</div>
		</div>
	</body>
	</html>

		 ";
}


