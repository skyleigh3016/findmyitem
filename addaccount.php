<?php
include_once("process1.php");
$con = connection();
if(isset($_POST['Signup'])){
    
   
   echo "<pre>", print_r($_FILES['userimage']['name']), "</pre>";
   $userimageName = time() .'_'. $_FILES['userimage']['name'];
    $rdate =  $_POST['date'];
    $rtime =  $_POST['time'];
    $firstname =  $_POST['firstname'];
    $lastname =  $_POST['lastname'];
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $email =  $_POST['email'];
    $age =  $_POST['age'];
    $gender =  $_POST['gender'];
    $access=  "User";
    $approval = "pending";


$user = "SELECT username FROM user_account WHERE username = '$username'";
$userd= $con->query($user) or die ($con->error);
$rowuser = $userd->fetch_assoc();
$totaluser=$userd->num_rows;

$emaildd = "SELECT email FROM user_account WHERE email = '$email'";
$emaild= $con->query($emaildd) or die ($con->error);
$rowuser = $emaild->fetch_assoc();
$totalemail=$emaild->num_rows;

if($totaluser > 0){
    echo '<script>alert("Username Exist")</script>';   
}

 else if($totalemail > 0){
    echo '<script>alert("Email Address Exist")</script>';   
}else{
    $sql="INSERT INTO `user_account`(`date`, `time`,`userimage`,`firstname`, `lastname`,`username`,`password`,`email`,`age`,`gender`,`access`,`approval`) 
        VALUES ('$rdate','$rtime','$userimageName', '$firstname','$lastname','$username','$password','$email','$age','$gender','$access','$approval' )";
    $con->query($sql) or die ($con->error);
    echo header("location: index1.php");
}
}
date_default_timezone_set('Asia/Manila');
$time = time();
$date = date('F d, Y');
$time1 = date('g: i a')
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset = "UTF-8">
<meta name="viewport" content = "width = device-wodth, initial-scale = 1.0">
<meta http-equiv ="X-UA-Compatible" content = " ie=edge">
    <link rel="icon" type="images/jpg" href="images/iconfortitlebar.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Find My Item</title>
    <link rel="stylesheet" href="signupstyle.css">
   
</head>

<body>
<div class="regform"><h1>Add Account User</h1></div>
<div class="main">
<form action="" method="POST" id="Signup" name="Signup" class="group-input" enctype="multipart/form-data"> 
  <div id="name">
    <h2 class="name">Date</h2>
    <input type="text"class="firstname" name="date" placeholder="<?php echo $date;?>" id="firstname" 
    value="<?php echo $date;?>" > <br>
<label class="firstlabel">TXN Date</label>
<input type="text" class="lastname" name="time" placeholder="<?php echo $time1;?>" id="lastname"
value="<?php echo $time1;?>" > 
<label class="lastlabel">TXN Time</label>
</div>
<div id="name">
    <h2 class="name">Name</h2>
    <input type="text"class="firstname" name="firstname" placeholder="First Name" id="firstname" required> <br>
<label class="firstlabel">first name</label>
<input type="text" class="lastname" name="lastname" placeholder="Last Name" id="lastname" required> 
<label class="lastlabel">last name</label>
</div>
<div id="name">
    <h2 class="name">Account</h2>
    <input type="text" class="firstname" name="username" placeholder="Username" id="username" required>  <br>
<label class="firstlabel">Username</label>
<input type="password" class="lastname" name="password" placeholder="Password" id="password" required>
<label class="lastlabel">Password</label>
</div>


<h2 class="name">Email</h2>
<input type="text" class="email" name="email" placeholder="Email" id="Email" required>
<h2 class="name">Gender</h2>
<select class="option" name="gender" id="access" required>
    <option disable="disable" selected ="selected">--Choose Option</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>
<h2 class="name">Identity</h2>
<select class="option" name="access" id="access" required>
    <option disable="disable" selected ="selected">--Choose Option</option>
    <option value="Teacher">Staff</option>
    <option value="Faculty">Faculty</option>
    <option value="Student">Student</option>
    <option value="Visitor">Visitor</option>
</select>
<h2 class="name"> Age</h2>
<input type="age" class="code" name="age" placeholder="Age" id="Age" size="5" required>

<br>

<h2 class="name">Profile Image</h2>
    <input type="file" name="userimage" onchange="displayImage(this)" id="userimage" text-color="white";><br>
    <img src="#" onclick="triggerClick()" id="profileDisplay" width="150"; hieght="150px"; ><br>

<button type="submit" class="sub-btn" name ="Signup" value="submit form"> ADD  </button>
<div class ="container">
 <button type="" class="sub-btn" onclick="window.location.replace('index1.php');">CANCEL</button>
 </div>   
 </form>
         
</div>
<script src="scripts.js"></script>
</body>

</html>