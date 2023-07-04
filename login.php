
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/jpg" href="images/iconfortitlebar.png" />
    <link rel="stylesheet" href="loginStyle.css">
    <title>Find My Item</title>
   

</head>
<body>

    <div class="a">
        <div class="b">
            <h1 >  <img  src="images/iconfortitlebar.png" height="60px" width="60px" 
            alt="Development of Lost and Found Items Web-Droid Assistance and Monitoring System">  FindMyItem</h1>
            <p>Lost and Found Web-Droid System for CARD MRI Development, Inc.</p>
        
        </div> 

        <div class="f-box">
            <form action="" method="POST" id="Login" name="Login" class="group-input">
            <?php
if(!isset($_SESSION)){
    session_start();
}

include_once("connection/connection.php");
$con = connection();
if(isset($_POST['Login'])){

   $username = $_POST['username'];
    $password = $_POST['password'];
   $approval = 'approved';
   $admin = 'admin';
   
    $sql="SELECT * FROM user_account WHERE approval = '$approval' AND (username = '$username' AND password ='$password')";

    $user= $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
  $total=$user->num_rows;

  $sql1="SELECT * FROM user_account WHERE (approval = '$approval' AND access = '$admin') AND (username = '$username' AND password ='$password')";

    $user1= $con->query($sql1) or die ($con->error);
    $row1 = $user1->fetch_assoc();
  $total1=$user1->num_rows;

    if($total1 > 0){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access']; 
       echo header("Location:home.php");     
    }else if($total > 0){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access']; 
       echo header("Location:home1.php");    
    } else{
       echo "<p style=' color: red; text-align:center;'>Invalid username or password!</p>"; 
    }
    
}

?>
                <input type="text" class="input-field" name="username" placeholder="Username" required>
                <input type="password" class="input-field" name="password" placeholder="Password" required>
               <br>
               <br>
               <br>
                <button type="submit" class="sub-btn" name="Login">Log in</button>
                <br>
                <h2>or</h2>
                <br>
                <form action="" method="POST" class="group-input1">
                <a type="submit" class="sub-btn1" href="signup.php">Sign up</a> </form>
            </form>
        </div>
    </div>

<?php
$_SESSION['username']= $_POST['username'];
?>
</body>
</html>