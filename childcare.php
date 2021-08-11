<?php
session_start();
print "hello: ".$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
<title>HTML</title>
<link rel="stylesheet" href="style.css" type="text/css" media="all"> 
</head>
<body>
<form action="database_start.php" method="post">
<table border="1" align="center">
<caption>Padstow Cildcare Center <br> Child Form</caption><!-- Inline stylesheet -->
<tr>
<td class="td1">Child Id:</td>
<td ><input type="text" name="childid" id="childid" value="<?php if (isset($_SESSION['courseid'])) print $_SESSION['courseid'];?>"</td>
</tr>
<tr>
<td class="td2">Child first Name:</td>
<td><input type="text" name="firstname" id="firstname" value="<?php if (isset($_SESSION['coursename'])) print $_SESSION['coursename'];?>"></td>
</tr>
<tr>
<td class="td2">Child last Name:</td>
<td><input type="text" name="lastname" id="lastname" value="<?php if (isset($_SESSION['coursename'])) print $_SESSION['coursename'];?>"></td>
</tr
<tr>
<td class="td3">Child Gender:</td>
<td><input type="radio" name="gender" id="gender" value="male"> Male
  <input type="radio" name="gender" id="gender" value="female"> Female</td>
</tr>
<tr>
<td class="td3">Child DOB:</td>
<td><input type="text" name="childDOB" id="DOB" value="<?php if (isset($_SESSION['childDOB'])) print $_SESSION['childDOB'];?>"></td>
</tr>
<tr>
<td colspan = "5" align="center">

<input type="submit" name="add" value="Add">
<input type="submit" name="delete" value="Delete">
<input type="submit" name="search" value="Search">
<input type="submit" name="update" value="Update">
<input type="submit" name="viewall" value="Viewall">
</td>
</tr>
</table>
</form>
<?php
if (isset($_GET["message"]))
{
	print $_GET["message"];
}
?>
</body>
</html>
