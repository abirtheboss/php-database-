<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
</head>
<body>
    <?php
// define filepath & file name
define("filepath", "data.txt");
// define variables to empty values  
$fnameErr = $lnameErr = $genderErr = $dobErr = $religionErr = $emailErr = $praErr = $peaErr = $webErr = $phnErr= $usernameErr = $passwordErr = "";  
$fname = $lname = $gender = $dob = $religion = $praddress = $peaddress = $web =$phone = $email = $username = $password = "";  
$flag = false;
$successfulMessage = $errorMessage = "";
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  


//String Validation  
    if (empty($_POST["fname"])) 
    {  
        $fnameErr = " first Name is required"; 
        $flag = True;
    } 
    else
    {
    	$fname=$_POST["fname"];
    }
  
    
    if (empty($_POST["lname"])) 
    {  
        $lnameErr = " Last Name is required";
        $flag = True;  
    } 
     else
     {
     	$lname=$_POST["lname"];
     }
    
    if (empty($_POST["gender"])) 
    {  
        $genderErr = " Gender is required";
        $flag = True;  
    } 
      
      else
     {
     	$gender=$_POST["gender"];
     }

    if (empty($_POST["dob"])) 
    {  
        $dobErr = " Date of birth is required";
        $flag = True;  
    }  
    else
    {

     	$dob=$_POST["dob"];
     

    }

    if (empty($_POST["religion"])) 
    {  
        $religionErr = " Religion is required";
        $flag = True;  
    } 

    else
{
	$religion=$_POST["religion"];
}

    if (empty($_POST["praddress"])) 
    {  
       $praErr = "Present Address is required";
       $flag = True;  
    } 
    else
    {
     $praddress=$_POST["praddress"];
    }
 


if (empty($_POST["Peaddress"])) 
    {  
       $peaErr = "Permanent Address is required";
       $flag = True;  
    } 
    else
    {
     $peaddress=$_POST["Peaddress"];
    }

if (empty($_POST["phone"])) 
    {  
       $phnErr = "Phone No is required";
       $flag = True;  
    } 
    else   
    {
     $phone=$_POST["phone"];
    }

if (empty($_POST["web"])) 
    {  
       $webErr = "Web is required";
       $flag = True;  
    } 
    else   
    {
     $web=$_POST["web"];
    }



    
    }
    if (empty($_POST["email"])) 
    {  
       $emailErr = " Email is required";
       $flag = True;  
    } 


    else
    {
		$email=$_POST["email"];
	}
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
      $servername = "localhost";
$dname = "root";
$pass = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $dname, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `login` (`fName`, `lName`, `Gender`, `DoB`, `Religion`, `prAdd`, `ptAdd`, `pNO`, `Email`, `wLink`, `usN`, `pass`) VALUES ('$fname', '$lname', '$gender', '$dob', '$religion', '$praddress', '$peaddress', '$phone', '$email', '$web', '$username', '$password');";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


}

 

  
?> 
<h1>Registration form</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
  <fieldset>
    <legend>Basic Information</legend>
    <span style="color: red">*</span><label for="fname">Enter your first name:</label>
    <input type="text" id="fname" name="fname">
    <span style="color: red"><?php echo $fnameErr; ?> </span> <br><br>
    <span style="color: red">*</span><label for="lname">Enter your Last name:</label>
    <input type="text" id="lname" name="lname">
    <span style="color: red"><?php echo $lnameErr; ?> </span><br><br>
    <span style="color: red">*</span><label for="gender">Gender :</label>
    <input type="radio" name="gender"<?php if (isset($gender) && $gender=="Male") echo "checked";?>value="male">
    <label for="Male">Male</label>
    <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="female">
    <label for="Female">Female</label><br>
    <span style="color: red"><?php echo $genderErr; ?> </span><br>
    <span style="color: red">*</span><label for="DOB">Date of birth:</label>
    <input type="date" id="dob" name="dob"><br>
    <span style="color: red"><?php echo $dobErr; ?> </span><br>
    <span style="color: red">*</span><label for="religion">Choose your Religion:</label>
    <select name="religion" id="religion">
    <option></option>
    <option value="Muslim">Muslim</option>
    <option value="Hindu">Hindu</option>
    <option value="Christian">Christian</option>
    </select>
    <span style="color: red"><?php echo $religionErr; ?> </span><br>
    
  </fieldset>
  <fieldset>
    <legend>Contact Information</legend>
    <label for="Praddress">Enter your Present Address:</label>
    <input type="text"name="praddress" rows="3" cols="30"></textarea><br><br>
    <label for="Peaddress">Enter your Permanent Address:</label>
    <input type="text" name="Peaddress" rows="3" cols="30"></textarea><br><br>
    <label for="phone">Enter your phone number:</label>
    <input type="tel" id="phone" name="phone" ><br><br>
    <span style="color: red">*</span><label for="email">Enter your Email:</label>
    <input type="email" id="email" name="email">
    <span style="color: red"><?php echo $emailErr; ?> </span><br><br>
    <label for="web">Enter your Personal Website link:</label>
    <input type="url" id="web" name="web">
  </fieldset>
    <fieldset>
    <legend>Account Information</legend>
    <span style="color: red">*</span><label for="username">Enter your Username:</label>
    <input type="text" id="username" name="username">
    <span style="color: red"><?php echo $usernameErr; ?> </span><br><br>
    <span style="color: red">*</span><label for="password">Enter your Password:</label>
    <input type="password" id="password" name="password">
    <span style="color: red"><?php echo $passwordErr; ?> </span><br><br>
  </fieldset>
  <br><br><input type="submit" value="Submit">
</form>
 <br>
 <span style="color: green"><?php echo $successfulMessage; ?></span>
<span style="color: red"><?php echo $errorMessage; ?></span>

 <?php
function read() {
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}
?>
</body>
</html>