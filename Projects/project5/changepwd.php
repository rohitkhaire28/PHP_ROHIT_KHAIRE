<?php 
 
 if(isset($_POST["changepwdbtn"]))
 {

$connect = mysqli_connect("localhost", "root", "", "project5");
$un = $_POST["username"];
$cpwd =  $_POST["cpassword"];
$npwd =  md5($_POST["npassword"]);

$qry = "SELECT * FROM `user` WHERE username ='$un' AND password ='$cpwd'";

$result = mysqli_query($connect, $qry);
$data = mysqli_fetch_assoc($result);
$id = $data["id"];
$row = mysqli_num_rows($result);
if($row>0)
{

	$qry = "UPDATE `user` SET `password`= '$npwd' WHERE id= '$id'";
	$result = mysqli_query($connect, $qry);
	if($result)
	{
     ?> <script> alert("Password changed succesfully");</script> <?php
	}
	else{
      ?> <script> alert("Something went worng");</script> <?php


	}
}
else
{
 ?> <script> alert("Invalid username or Password");</script> <?php	
}

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card">
				<div class="card-header bg-success text-light">
					passward change from
	</div>
	<div class="card-body">
		<form method="post">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label>Current Password</label>
				<input type="password" name="cpassword" class="form-control">
			</div>
			<div class="form-group">
				<label>New Password</label>
				<input type="password" name="npassword" class="form-control">
			</div>
			<div class="form-group">
				<button class="btn btn-success"
				 name="changepwdbtn">Change Password</button>
				</div>

		</form>
	</div>
</div>
</div>
</div>
</div>



	


						
			

</body>
</html>