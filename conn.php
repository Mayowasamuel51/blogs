<?php 



$localhost = '127.0.0.1:3308';
$username = 'root';
$password = '';
$dataname  = 'blog.com';


$conn = mysqli_connect($localhost,$username,$password,$dataname);
if($conn){
	return $conn;
}else{
	echo "false";
}




// CREATE TABLE myblog (
//     userid int(11) AUTO_INCREMENT  PRIMARY key  not  null,
//     username text not null,
//     email text not null,
//     password text not null
    
//     )