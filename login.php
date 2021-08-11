<?php
session_start();
include "connection.php";
$userid =$_POST["id"];
$password=$_POST["pass"];
$sql= "select * from users where id='$userid' and pass='$password'";
$stmt =$conn->query($sql);//Execute the sql query
if ($userid== ""){
	print "user id is requiered";
}
if ($stmt->rowCount()>0){
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row)
		{
            $_SESSION["username"] =$row["username"];
		}
            header("location:childcare.php");
			exit();
}
else{
	 $_SESSION["id"] =$_POST["id"];
	 $_SESSION['username']="";
    header("location:index.php?message= invalid userid/password");	
    exit();

}
?>