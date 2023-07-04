
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="icon" type="images/jpg" href="images/iconfortitlebar.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
	<title>FindMyItem</title>
</head>
<body>

 <div>
   <header>
       <nav>
    <ul class="menu">
        <li ><a href="home1.php">HOME</a></li>
        <li  class="active"><a href="about.php">ABOUT</a> </li>
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
        <li><a href="contact1.php">CONTACT US</a></li>
        <li><?php if(isset($_SESSION['Userlogin']))?><a href="logout.php" id="logout">LOGOUT</a></li>
</ul>
    </nav>
    <header>
    </div> 

	 <div class="about-page">
	 	<div class="container">
	 		<div class="title-container">
	 		<h2 class="title-head">Who We Are...</h2>
	 		<div class="title-desc">
	 			FindMyItem is a lost and found management system for CARD-MRI Development Institute, Inc. 

	 			Its interactive platform provides assistance and monitoring of concerns or reports of the users. 

	 			Together, we are committed to grow with you as we offer the best experiences of using our system.
	 		</div>
	 	</div>
	 		<h2 class="title">Features</h2>
	 		<div class="border"></div>
	 		<div class="feature-container">
	 			<div class="feature-box">
	 				<div class="feature-icon">
	 					<i class="fas fa-tasks"></i>
	 				</div>
	 				<div class="feature-title">
	 					<h3>Item Management</h3></div>
	 				<div class="feature-desc">
	 					Can view, add, update and delete information of found, lost, and claim items quickly via admin dashboard. Enable user to view list of lost or found items. Users upload images for easier recognition. 
	 				</div>
	 			</div> 

	 			<div class="feature-box">
	 				<div class="feature-icon">
	 					<i class="fas fa-check-double"></i>
	 				</div>
	 				<div class="feature-title">
	 					<h3>Manage Claims</h3></div>
	 				<div class="feature-desc">
	 					Promote transparency by showing detailed history of claimed items. Keep user updated about items claimed, the item info, claimant, returnee and processing officer.
	 				</div>
	 			</div> 
	 			
	 			<div class="feature-box">
	 				<div class="feature-icon">
	 					<i class="fas fa-cogs"></i>
	 				</div>
	 				<div class="feature-title">
	 					<h3>Organize Process</h3>
	 				</div>
	 				<div class="feature-desc">
	 					Facilitate all transactions in a standardized interface. Verify posts and claims to ensure legality. Keeping users informed in every step of the process from filing to item returning.
	 				</div>
	 			</div> 

	 			<div class="feature-box">
	 				<div class="feature-icon">
	 					<i class="fas fa-users"></i>
	 				</div>
	 				<div class="feature-title">
	 					<h3>Manage Users</h3>
	 				</div>
	 				<div class="feature-desc">
	 					Add and approve pending accounts once verified as qualified user of the system. Set roles if user or admin. 
	 				</div>
	 			</div> 


	 			<div class="feature-box">
	 				<div class="feature-icon">
	 					<i class="fas fa-user-lock"></i>
	 				</div>
	 				<div class="feature-title">
	 					<h3>Secured Data
	 					</h3>
	 				</div>
	 				<div class="feature-desc">
	 					Every data provided to the system was ensured with security and confidentiality.
	 				</div>
	 			</div> 

	 			<div class="feature-box">
	 				<div class="feature-icon">
	 					<i class="fas fa-print"></i>
	 				</div>
	 				<div class="feature-title"><h3>Print Reports</h3></div>
	 				<div class="feature-desc">
	 					Enable the admin to print a copy of reports for compilation of hard files. Serve as duplicate of every transaction.
	 				</div>
	 			</div> 

	 		</div>
	 	</div>
	 </div>
</body>
</html>