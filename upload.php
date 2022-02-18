<?php session_start();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard </title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
		<!-- <link rel="stylesheet" type="text/css" href="fontawesome-free-6.0.0-beta3-web/css/all.css"> -->
	</head>
	<body>
<form action="uploadDatabase/uploadblog.php" method="post">
	<div class="columns mt-4 ">

		<div class="column is-6   is-offset-3 col">
			<div class="shift"></div>
			
			<h1  class="has-text-weight-semibold mb-3 ">Upload Blog</h1>
			<p class="has-text-weight-semibold pb-2 pt-1">Blog Title </p>
			<input type="text" placeholder="blog title" class="input title">
			<p class="has-text-weight-semibold pb-2 pt-1">Time </p>
			<input type="time" placeholder="blog title" class="input time ">
			<p class="has-text-weight-semibold pb-2 pt-1">Date</p>
			<input type="date" class="input date">
			<p class="has-text-weight-semibold pb-2 pt-1">Blog Content</p>
			<textarea class="textarea content" placeholder="10 lines of textarea" rows="10"></textarea>

			<p class="has-text-weight-semibold pb-2 pt-1">Wirter </p>
			<input type="text" placeholder="blog title" class="input wirter">


			<div class="spinner"></div>
			<div class="show"></div>
			<button class="submit mt-5 has-text-weight-semibold button is-primary">finsh blog</button>
		</div>
	</div>
		

</form>








<form action="uploadDatabase/uploadstory.php" method="post">
	<div class="columns mt-6">
		<div class="column is-6   is-offset-3 tops">
			<div class="add"></div>
			<h1  class="has-text-weight-semibold mb-6 ">Upload  Story</h1>
			<p class="has-text-weight-semibold pb-2 pt-1">Story  Title </p>
			<input type="text" placeholder="Story  title" class="input title">

			<p class="has-text-weight-semibold pb-2 pt-1">Time </p>
			<input type="time" placeholder="blog title" class="input time">

			<p class="has-text-weight-semibold pb-2 pt-1 time">Date</p>
			<input type="date" class="input date ">

			<p class="has-text-weight-semibold pb-2 pt-1">Story Content</p>

			<textarea class="textarea content" placeholder="10 lines of textarea" rows="10"></textarea>


			
			<div class="spinner"></div>
			<div class="shows"></div>
			<button type="submit" class="submit_story mt-5 has-text-weight-semibold button is-dark">finsh story</button>
		</div>
		
	</div>
		

</form>











<script src="jquery-3.6.0.min.js"></script>
<script src="worker.js"></script>
<script src="story.js"></script>
</body>
</html>