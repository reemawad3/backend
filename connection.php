<?php
try
{
	$conn = new PDO("mysql:host=localhost;dbname=childcare", "root", "");//This statement is creating an object of the PDO class. root is user name and password is blank.
	print "Connection Successful" . "<br>";
}
catch (PDOException $e)//PDOException is a class for catching exceptions/errors
{
	print $e->getMessage();
	exit();
}
?>