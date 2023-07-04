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
    <link rel="stylesheet" href="test.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
    <title>FindMyItem</title>
</head>
<body>
    <div>
   <header>
       <nav>
    <ul class="menu">
        <li  class="active"><a href="#">HOME</a></li>
        <li><a href="about1.php">ABOUT</a> </li>
        <li><a href="#">SERVICES</a>
<ul class = submenu>
                
                <li><a href="#">Claimed Item</a>
                    <ul class ="submenu2">  
                <li><a href="ongoing.php">For Process of Request</a></li>
                <li><a href="verified1.php">For Verification of Request</a></li>
                <li><a href="approved.php">Approved Request</a></li>
                <li ><a href="listofclaimed.php">Claimed Item</a></li>
                </ul>
                </li>
                    <li><a href="insertlossitem.php">Lost Items </a> 
                <ul class ="submenu2">
                <li><a href="lossitem1.php">List of Loss Item</a></li>
        <li><a href="insertlossitem.php">Filling for Loss Item</a></li>
                </ul>
                </li>
                    <li><a href="#">Found Items</a>
                    <ul class ="submenu2">
                <li><a href="founditem1.php">List of Found Item</a></li>
        <li><a href="fillingfounditem.php">Filling for Found Item</a></li>
                </ul>
                </li>
                    </ul>  
                    
                    </li>
        <li><a href="contact1.php">CONTACT US</a></li>
        <li><?php if(isset($_SESSION['Userlogin']))?><a href="logout.php" id="logout">LOGOUT</a></li>
        <li class="user" ><a href="#"><?php echo $row['firstname'];?>  <?php echo $row['lastname'];?> <img src="upload/<?php echo $row['userimage']; ?>" width="30" alt="HTML tutorial" ></a></li>
</ul>
    </nav>
    <header>
    </div> 
    <div class="detective"><img src="images/detective.jpg"  alt="detective"></div> 
    <div class="icon">
        <h1 >  <img  src="images/iconfortitlebar.png" height="50px" width="50px" 
        alt="Development of Lost and Found Items Web-Droid Assistance and Monitoring System">  FindMyItem</h1>
    </div>
    <div class="welcome" id="home">
        <h2>Welcome......<?php echo $row['firstname'];?>!</h2>
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