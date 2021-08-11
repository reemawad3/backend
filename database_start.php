<?php
session_start();
include "connection.php";

if (isset($_POST["add"]))
{
	$childid = $_POST["childid"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$gender=$_POST["gender"];
    $dob=$_POST["childDOB"];
	$sql = "insert into child values('$childid','$firstname','$lastname','$gender','$dob')";
	$stmt = $conn->query($sql);//Execute the sql query
	header("location:childcare.php?message=This child has been added successfully");
	exit();

}
else
if (isset($_POST["delete"]))
{
	$childid = $_POST["childid"];
	$sql = "delete from child where childid = $childid";
	
	$stmt = $conn->query($sql);//Execute the sql query
	header("location:childcare.php?message=This child has been deleted successfully");
	exit();
}
else
if (isset($_POST["update"]))
{
	$childid = $_POST["childid"];
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$gender = $_POST["gender"];
	$dob=$_POST["childDOB"];
	
	$sql = "update child set firstname = '$firstname', lastname='$lastname', gender= $gender, childDOB='$dob'
	where childid = $childid";
	
	$stmt = $conn->query($sql);//Execute the sql query
	header("location:childcare.php?message=child informations has been updated successfully");
	exit();
}
else
if (isset($_POST["viewall"]))
{
	$sql = "select * from child";
	$stmt = $conn->query($sql);//Execute the sql query 
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);//fetching data from table
	$str .= "<table border='1' align='center'>";
	$str .= "<caption style='color:red'>Child Details</caption>";
	$str .= "<tr>";
	$str .= "<th>";
	$str .= "Child Id";
	$str .= "</th>";
	$str .= "<th>";
	$str .= "First Name";
	$str .= "</th>";
	$str .= "<th>";
	$str .= "Last Name";
	$str .= "</th>";
	$str .= "<th>";
	$str .= "Gender";
	$str .= "</th>";
	$str .= "<th>";
	$str .= "childDOB";
	$str .= "</th>";
	$str .= "</tr>";
	foreach ($data as $row)//display the data from the table
	{
		$str .= "<tr>";
		$str .= "<td>";
		$str .= $row["childid"];
		$str .= "</td>";
		$str .= "<td>";
		$str .= $row["firstname"];
		$str .= "</td>";
		$str .= "<td>";
		$str .= $row["lastname"];
		$str .= "</td>";
		$str .= "<td>";
		$str .= $row["gender"];
		$str .= "</td>";
		$str .= "<td>";
		$str .= $row["childDOB"];
		$str .= "</td>";
		$str .= "</tr>";
	}
	$str .= "</table>";
	header("location:childcare.php?message=$str");
	exit();
}
else 
if (isset($_POST["search"]))
{
	$childid = $_POST["childid"];
	$sql = "select * from child where childid='$chilid'";
	$stmt = $conn->query($sql);//Execute the sql query
	if ($stmt->rowCount() > 0)
	{	
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);//fetching data from table
		foreach ($data as $row)//display the data from the table
		{
			
			$_SESSION["childid"] = $row["childid"];//Session variable
			$_SESSION["firstname"] = $row["firstname"];//Session variable
			$_SESSION["lastname"] = $row["lastname"];//Session variable
			$_SESSION["gender"] = $row["gender"];//Session variable
            $_SESSION["childDOB"] = $row["childDOB"];//Session variable
		}
		header("location:childcare.php");
		exit();
	}
	else
	{
		header("location:childcare.php?message=This child does not exist");
		exit();
	}
}
else
if (isset($_POST["reset"]))
{
	$_SESSION["childid"] = "";
	$_SESSION["firstname"] = "";
	$_SESSION["lastname"] = "";
	$_SESSION["gender"] = "";
    $_SESSION["childDOB"] = "";
	header("location:childcare.php");
	exit();
}


?>