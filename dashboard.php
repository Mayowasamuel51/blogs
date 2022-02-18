<?php session_start();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard </title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
		<link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-beta3-web/css/all.css">
	</head>
	<body>
		
		<style>
				.box-shadow{
					box-shadow:2px 12px 8px rgb(0, 0,0,0.25) ;
				}
				body{
					margin-bottom: 300px;
				}
			
		</style>
		<!-- //
		able to display the user infomation like ..  name  and email
		able to send stories to other writers
		able to see when someone has sent a blog/stioes to u //
		able to upload stories
		able to delete stories
		able to see the stroites or blog they post
		able to see the blog and strioes the sent
		-->
		
		<div class="pt-1 pl-2 columns box-shadow ">
			<h1 class="title  column pl-3">Blogs.com</h1>
		
		</div>
	</div>
	<div  class="columns">
		<div class="is-flex mt-1 column is-offset-2">
			<h1 class="title  pt-1  is-size-4"><p>Hi  </p>   <?php echo "  <h1 class='pl-3 has-text-weight-semibold is-size-4'> "  .$_SESSION['username']."  </h1>";?></h1>
		</div>
		
	</div>
	<div class="column">
		<div class="dropdown is-active">
			<div class="dropdown-trigger">
				<button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
				<span>YOUR MENU</span>
				<span class="icon is-small">
					<i class="fas fa-angle-down" aria-hidden="true"></i>
				</span>
				</button>
			</div>
			<div class="dropdown-menu" id="dropdown-menu" role="menu">
				<div class="dropdown-content">
					<a href="#" class="dropdown-item has-text-weight-semibold">
						Settings
					</a>
					<a class="dropdown-item has-text-weight-semibold">
						<i class="fas fa-paper-plane mr-4"></i>Sent
					</a>
					<a href="#" class="dropdown-item is-active has-text-weight-semibold">
						<i class="fas fa-book mr-4"></i> Darfts
					</a>
					<a href="showmessage/message.php" class="dropdown-item has-text-weight-semibold"><i  class="fas fa-message pr-4"></i>
						Notification
					<hr class="dropdown-divider">
					<a href="#" class="dropdown-item">
						<form action="uploadBlog/uploadDatabase/logout.php" method="post">
							<button class="
					button is-dark "name="">Logout</button>
						</form>
					</a>
					
			
				</div>
			</div>
		</div>
 

		<!-- this is were the user stories  will be uploaded to .... after the user has sent to the database -->



					<?php 
					include $_SERVER['DOCUMENT_ROOT'].'\jamb/ZBLOG/Database/conn.php';
					$sql_statement = "  SELECT time,date,blogtitle,blogcontent,wirter from uploadblog where email = '".$_SESSION['email']."'  ";
					$querybase = mysqli_query($conn,$sql_statement);
			

					while($row =mysqli_fetch_assoc($querybase)){
						$_SESSION['blogtitle'] = $row['blogtitle'];
						$_SESSION['blogcontent'] = $row['blogcontent'];
						$_SESSION['time'] = $row['time'];
						$_SESSION['date'] = $row['date'];
						$_SESSION['wirter'] = $row['wirter'];
						// echo $_SESSION['blogtitle'];
						echo "
						<div class='columns mt-3'>

							<div class='card column is-6 is-offset-3'>	
							Type:  Blog 

								<div class='card-header'><div class='card-header-title'>Title: "   .$_SESSION['blogtitle'].  "  Wirte By ".$_SESSION['wirter']."</div></div>
								<div class='card-content'>	
									".$_SESSION['blogcontent']."

								<div class='is-flex mt-5'>
										<p class='has-text-weight-semibold'>Date Uploaded   " .$_SESSION['date']."</p>
										<p class='has-text-weight-semibold pl-6'>Time Uploaded    " .$_SESSION['time']."</p>
								</div>
								</div>
								

							</div>
							</div>
							";
					


					}





					?>


<?php 
					include $_SERVER['DOCUMENT_ROOT'].'\jamb/ZBLOG/Database/conn.php';
					$sql_statement = "  SELECT time,date,storytitle,storycontent from uploadstory where email = '".$_SESSION['email']."'  ";
					$query = mysqli_query($conn,$sql_statement);
			

					while($row =mysqli_fetch_assoc($query)){
						$_SESSION['storytitle'] = $row['storytitle'];
						$_SESSION['storycontent'] = $row['storycontent'];
						$_SESSION['time'] = $row['time'];
						$_SESSION['date'] = $row['date'];
						// $_SESSION['wirter'] = $row['wirter'];
						// echo $_SESSION['blogtitle'];
						echo "
						<div class='columns mt-3 '>

							<div class='card column is-6 is-offset-3 has-background-success'>	
							Type:  Story

								<div class='card-header'><div class='card-header-title'>Title: "   .$_SESSION['storytitle'].  " </div></div>
								<div class='card-content'>	
									".$_SESSION['storycontent']."

								<div class='is-flex mt-5'>
										<p class='has-text-weight-semibold'>Date Uploaded   " .$_SESSION['date']."</p>
										<p class='has-text-weight-semibold pl-6'>Time Uploaded    " .$_SESSION['time']."</p>
								</div>
								</div>
								

							</div>
							</div>
							";
					


					}





					?>


		
		<div class="columns">
			<div class="column has-text-centered">
				<a href="uploadBlog/upload.php" class="button is-primary"><i class="fas fa-upload   mr-5"></i>     UPLOAD BLOG  </a>
			</div>
		</div>
		
	<form action="uploadBlog/uploadDatabase/uploadtransfer.php" method="post">
			<div class="columns">
			<div class="column is-6 is-offset-3 tops">
				<div class="add"></div>
				<div class="card">
					<div class="card-header">
						<div class="card-header-title">Send Message </div>
					</div>
					<div  class="card-content">
						<textarea class="textarea mb-5 is-9-desktop note" rows="4" cols="4"></textarea>
						<label for="" class="has-text-weight-semibold">  Email </label>
						<input type="text" class="input column is-9-desktop  is-primary email " placeholder="Email ">
						<div class="spinner mt-4"></div>
						<div class="show"></div>
						<button class="transfer-btn button is-primary mt-3 px-6 has-text-weight-bold">send</button>
					</div>
				</div>
			</div>
			

	</form>















<script src="uploadBlog/jquery-3.6.0.min.js"></script>
<script src="uploadBlog/transfer.js"></script>

		</body>
	</html>