<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>login form</title>
        <link rel="stylesheet" href="style.css" type="text/css" >

    </head>
    <body>
        <form action="login.php" method="POST">
            <table border="1" align="center">
                <caption>Login Form </caption>
                <tr>
                    <td class="td1">User Id</td>
                    <td><input type="text" name="id" id="id" </td>
                </tr>
                <tr>
                    <td class="td2">Password</td>
                    <td><input type="text" name="pass" id="Pass"</td>
                </tr>
                <tr>
                    <td class="td3">User name</td>
                    <td><input type="text" name="username" id="username" </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="login">
                    <input type="submit" name="register" value="Register"></td>
                </tr>
          

        </form>
        <?php
if (isset($_GET["message"]))
{ print "<tr>";
print "<td colspan='2' align='center'>";
	print $_GET["message"];
	print "</td>";
print "</tr>";
 
	
}
?>
  </table>
    </body>
</html>