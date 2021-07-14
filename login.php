<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
<?php 
$usernameErr = $passwordErr = $username = $password = "";
$login = "";
$flag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 


if (empty($_POST["username"])) 
    {  
       $usernameErr = " Username is required";
       $flag = True;  
    } 
	
	else 
	{
			$username=$_POST["username"];
	}

if (empty($_POST["password"])) 
    {  
       $passwordErr = " Password is required";
       $flag = True;  
    } 
	
	else
	{
		$password=$_POST["password"];
		
	}
 
if(!$flag) 
    {

    $databaseHost = 'localhost';//or localhost
$databaseName = 'login'; // your db_name
$databaseUsername = 'root'; // root by default for localhost 
$databasePassword = '';  // by defualt empty for localhost

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


$res = mysqli_query($mysqli,"select* from login where usN='$username'and pass='$password'");
$result=mysqli_fetch_array($res);
if($result)
{
echo "You are login Successfully ";
header("location:welcomepage.php");   // create my-account.php page for redirection 
	
}
else
{
	echo "failed ";
}


    }
}
 

?>



	<h1>Login</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend>Login</legend>

			<span style="color: red">*</span><label for="username">User Name:</label>
			<input type="text" name="username" id="username" >
			<span style="color: red"><?php echo $usernameErr; ?> </span><br><br>

			<span style="color: red">*</span><label for="password">Password:</label>
			<input type="password" name="password" id="password" >
			<span style="color: red"><?php echo $passwordErr; ?> </span><br><br>



			<input type="submit" name="submit" value="Login">
		</fieldset>
	</form>
 <?php
 echo "<p>". $login . "</p>" ;


?>
</body>
</html>