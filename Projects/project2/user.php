<?php

include("connection.php");

session_start();

if(!isset($_SESSION["sid"]))
{
	header("location:login.php");
}


$id = $_SESSION["sid"];

$qry = "select * from login where id = '$id'";		

$result = mysqli_query($connect, $qry);

$data = mysqli_fetch_assoc($result);

?>


<h1> Welcome <?php echo $data["fullname"]  ?> </h1>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <span>
     <a href="logout.php"><button class="btn btn-primary" style="margin-left: 10px;">logout</button></a>
    </span>

</body>
</html>
