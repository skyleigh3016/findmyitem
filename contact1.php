<!-- <?php include 'sendmail.php'; ?> -->
<?php

include 'sendmail.php';

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
    <link rel="stylesheet" href="contact.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,700&display=swap" rel="stylesheet">


	<title>Contact Us</title>
</head>
<body>

	<!--alert message here-->
	<?php echo $alert; ?>
	<!--alert message here-->

<div>
   <header>
       <nav>
    <ul class="menu">
        <li ><a href="home1.php">HOME</a></li>
        <li ><a href="about1.php">ABOUT</a> </li>
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
                <li><a href="lossitem.php">List of Loss Item</a></li>
        <li><a href="insertlossitem.php">Filling for Loss Item</a></li>
                </ul>
                </li>
                    <li><a href="#">Found Items</a>
                    <ul class ="submenu2">
                <li><a href="founditem.php">List of Found Item</a></li>
        <li><a href="fillingfounditem.php">Filling for Found Item</a></li>
                </ul>
                </li>
                    </ul>  
                    
                    </li>
        <li  class="active"><a href="contact.php">CONTACT US</a></li>
        <li><?php if(isset($_SESSION['Userlogin']))?><a href="logout.php" id="logout">LOGOUT</a></li>
</ul>
    </nav>
</header>
    </div> 

	<div class="contact">
		<div class="content">
			<h2>Get in touch with us.</h2>
		</div>
		<div class="container">
			<div class="contactInfo">
				<p>
				For more inquiries, comments and suggestions you may reach us out here:
			</p>
				<div class="box">
					<div class="icon"><i class="fas fa-map-marker-alt"></i></div>
					<div class="text">
						<h3>Address</h3>
						<p>Brgy. Tranca, Bay Laguna</p>
					</div>
				</div>
				<div class="box">
					<div class="icon"><i class="fas fa-phone-alt"></i></div>
					<div class="text">
						<h3>Phone</h3>
						<p>+63-918-637-4129</p>
				</div>
				</div>
				<div class="box">
					<div class="icon"><i class="fas fa-envelope"></i></div>
					<div class="text">
						<h3>Email</h3>
						<p>findmyitembsis@gmail.com</p>
					</div>
				</div>
				<div class="box">
					<div class="icon"><i class="fab fa-facebook-f"></i></div>
					<div class="text">
						<h3>Facebook Page</h3>
						<p><a href="https://www.facebook.com/FindMyItemBSIS" target="fb.me/FindMyItemBSIS">fb.me/FindMyItemBSIS</a></p>
					</div>
				</div>
				</div>
			<div class="contactForm">
			<h2>Send Message</h2>
				<form method="post">
					<div class="inputBox">
						<input type="text" name="name" value="<?php echo $row['firstname'];?>   <?php echo $row['lastname'];?>" required="required">
						<!-- <span><?php echo $row['firstname'];?>   <?php echo $row['lastname'];?></span> -->
					</div>
					<div class="inputBox">
						<input type="text" name="email" value="<?php echo $row['email'];?>" required="required">
						<!-- <span>Email</span> -->
					</div>
					<div class="inputBox">
						<textarea name="message" required="required" ></textarea>
						<span>Message</span>
					</div>
					<div class="inputBox">
						<button class="btn" name="submit">Send</button>
				</div>
				</form>
			</div>
		</div>
	</div>


<script type="text/javascript">
	if(window.history.replaceState){
		window.history.replaceState(null, null, window.location.href);
	}
</script>

</body>
</html>
<?php
}else{
    echo '<script>alert("This Site is Secured Please Login First ")</script>' ;
}
?>