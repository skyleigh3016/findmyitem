<?php include 'sendmail.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<title>Contact Us</title>
</head>
<body>

	<!--alert message here-->
	<?php echo $alert;  ?>
	<!--alert message here-->



	<div class="contact">
		<div class="logo-box">
			<img src="iconfortitlebar.png" height="40px" width="40px">
				<div class="logo-text">
					<h2>FindMyItem</h2>
				</div>
		</div>
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
						<p>facebook</p>
					</div>
				</div>
				</div>
			<div class="contactForm">
			<h2>Send Message</h2>
				<form method="post">
					<div class="inputBox">
						<input type="text" name="name" required="required">
						<span>Full Name</span>
					</div>
					<div class="inputBox">
						<input type="text" name="email" required="required">
						<span>Email</span>
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