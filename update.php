<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin"){

 }else{
    echo header("Location:home.php");
}
include_once("connection/connection.php");
$con = connection();

$id=$_GET['ID'];

$sql = "SELECT * FROM user_account WHERE id = '$id'";
$user = $con -> query($sql) or die ($con->error);
$row = $user -> fetch_assoc();

if(isset($_POST['Signup'])){

    $firstname =  $_POST['firstname'];
    $lastname =  $_POST['lastname'];
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $email =  $_POST['email'];
    $age =  $_POST['age'];
    $gender =  $_POST['gender'];
    $access= $_POST['access'];
    $approval =$_POST['approval'];
$sql="UPDATE user_account SET firstname = '$firstname', lastname = '$lastname', username = '$username', 
password = '$password',email = '$email', age = '$age', gender = '$gender', access = '$access', 
approval = '$approval' WHERE id = '$id'"; 
$con->query($sql) or die ($con->error);
echo header("location: index1.php?ID=".$id);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset = "UTF-8">
<meta name="viewport" content = "width = device-wodth, initial-scale = 1.0">
<meta http-equiv ="X-UA-Compatible" content = " ie=edge">
    <link rel="icon" type="images/jpg" href="images/iconfortitlebar.png" />
    <title>Find My Item</title>
    <link rel="stylesheet" href="signupstyle.css">
   
</head>

<body>
<div class="regform"><h1>Update Form</h1></div>
<div class="main">
<form action="" method="POST" id="Signup" name="Signup" class="group-input"> 
  <div id="name">
    <h2 class="name">Name</h2>
    <input type="text"class="firstname" name="firstname" placeholder="First Name" id="firstname" 
    value="<?php echo $row['firstname'];?>" required> <br>
<label class="firstlabel">first name</label>
<input type="text" class="lastname" name="lastname" placeholder="Last Name" id="lastname" 
value="<?php echo $row['lastname'];?>" required> 
<label class="lastlabel">last name</label>
</div>
<div id="name">
    <h2 class="name">Account</h2>
    <input type="text" class="firstname" name="username" placeholder="Username" id="username"
    value="<?php echo $row['username'];?>" required>  <br>
<label class="firstlabel">Username</label>
<input type="text" class="lastname" name="password" placeholder="Password" id="password"
value="<?php echo $row['password'];?>" required>
<label class="lastlabel">Password</label>
</div>


<h2 class="name">Email</h2>
<input type="text" class="email" name="email" placeholder="Email" id="Email"
value="<?php echo $row['email'];?>" required>
<<h2 class="name">Gender</h2>
<select class="option" name="gender" id="access" required>
    <option disable="disable" selected ="selected"><?php echo $row['gender'];?></option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>
<h2 class="name">Access</h2>
<select class="option" name="access" id="access"  required>
    <option disable="disable" selected ="selected"><?php echo $row['access'];?></option>
    <option value="User">User</option>
    <option value="Admin">Admin</option>
</select>
<h2 class="name">Approval</h2>
<select class="option" name="approval" id="access" required>
    <option disable="disable" selected ="selected"><?php echo $row['approval'];?></option>
    <option value="pending">Pending</option>
    <option value="approved">Approved</option>
</select>
<h2 class="name">Others</h2>
<input type="age" class="code" name="age" placeholder="Age" id="Age" size="5"
value="<?php echo $row['age'];?>" required>
<label class="area-code"> Age</label>
</label><br><br>
    
<button type="submit" class="sub-btn" name ="Signup" value="submit form">Update</button>
<div class ="container">
 <button type="" class="sub-btn" onclick="window.location.replace('home.php');">CANCEL</button>
 </div>   
 </form>
         
</div>
<script src="scripts.js"></script>
</body>

</html>