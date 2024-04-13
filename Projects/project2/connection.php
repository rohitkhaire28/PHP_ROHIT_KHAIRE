<?php


$connect = mysqli_connect("localhost","root", "","project 2");

if(!$connect)
{
	echo "Database not connected, contact to system administrators";
}
?>