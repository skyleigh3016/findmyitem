<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['UserLogin'])){
    include_once("connection/connection.php");
    $con = connection();
    $username=$_SESSION['username'];
    
   
    $sql="SELECT * FROM user_account WHERE username = '$username'";
$user = $con -> query($sql) or die ($con->error);
$row = $user -> fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/jpg" href="images/iconfortitlebar.png" />
    <link rel="stylesheet" href="homestyle.css">
    <title>FinfMyItem</title>
</head>
<body>
    <div class="menu">
    <ul>
        <li class="active"><a href="#"> HOME</a></li>
        <li><a href="#">ABOUT</a> </li>
        <li><a href="#">SERVICE</a>
            <div class="sub-menu">
                <ul>
                    <li><a href="index1.php">User Information</a></li>
                    <li><a href="insertlossitem.php">Lost Items </a>
                    <div class ="sub-menu">
                    <ul >
                    <li><a href="#">with transaction</a></li>
                    <li><a href="#">with transaction</a></li>
                    </ul>
                    </div>
                   </li>
                    <li><a href="#">Found Items</a>
                    <div class ="sub-menu">
                    <ul >
                    <li><a href="#">with transaction</a></li>
                    <li><a href="#">with transaction</a></li>
                    </ul>
                    </div>
                </li>
                </ul>
            </div>
        </li>
        <li><a href="#">CONTACT US</a></li>
        <li><?php if(isset($_SESSION['Userlogin']))?><a href="logout.php" id="logout">LOGOUT</a></li>
    </ul>
    </div>
    <div class="detective"><img src="images/detective.jpg"  alt="detective"></div> 
    <div class="icon">
        <h1 >  <img  src="images/iconfortitlebar.png" height="50px" width="50px" 
        alt="Development of Lost and Found Items Web-Droid Assistance and Monitoring System">  FindMyItem</h1>
    </div>
    <div class="welcome" id="home">
        <h2>Welcome...... Mr.<?php echo $row['lastname'];?>!</h2>
        <p style="font-size: 20px;"> Your Lost. We Found.</p>
        <p style="font-size: 20px;"> Lost something? Find anything?</p>
        <p style="font-size: 20px;"> Worry no more, FindMyItem Web-Droid Assistance</p>
        <p style="font-size: 20px;"> and Monitoring System got it for you! </p>
    
    </div>
</body>
</html>
<?php
}else{
    echo '<script>alert("This Site is Secured Please Login First ")</script>' ;
}
?>