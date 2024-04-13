<?php

if(isset($_POST["resetbtn"]))
{


$connect = mysqli_connect("localhost", "root", "", "project4");

$un = $_POST["username"];
$mob = $_POST["mobile"];

 $qry = "SELECT * FROM `user` WHERE username = '$un' AND mobile = '$mob'";

$result =  mysqli_query($connect, $qry);
$data = mysqli_fetch_assoc($result);
$id = $data["id"];

$row = mysqli_num_rows($result);


if($row>0)
{
 $pwd = randomPassword();
 $qry = "UPDATE `user` SET `password`= '$pwd' WHERE id = '$id'";
 $result =  mysqli_query($connect, $qry);
 echo "Pasword Reset Successfully";
}
else
{
	echo "Invalid Username or Mobile Number";
}

}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890#$@';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<form method="post">

<table cellspacing="40">
	<tr> 
		<td> Username </td>
		<td> <input type="text" name="username"> </td>
	</tr>
	<tr> 
		<td> Mobile </td>
		<td> <input type="tel" name="mobile"> </td>
	</tr>
	<tr> 
		<td colsopan="2" align="centre"> <button name="resetbtn"> Reset Password </button> </td>
		
	</tr>
	<tr>
		<td colspan="2"> Password - <font color="blue"> <?php echo $pwd ?> </font>, kindly copy  password, Password changed</td>
	</tr>
</table>
</form>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>