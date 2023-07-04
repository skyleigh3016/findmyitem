<?php
include_once("process10.php");
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['UserLogin'])){
    include_once("connection/connection.php");
    $con = connection();
    $id=$_GET['ID'];
    $username=$_SESSION['username'];
    
    $sql1="SELECT * FROM user_account WHERE username = '$username'";
$user1 = $con -> query($sql1) or die ($con->error);
$row1 = $user1 -> fetch_assoc();

   
    $sql="SELECT * FROM `claim_item` WHERE claim_id = '$id'";
$user = $con -> query($sql) or die ($con->error);
$row = $user -> fetch_assoc();

if(isset($_POST['Signup'])){
  
   $vdate =  $_POST['date'];
   $vtime =  $_POST['time'];
   $vby =  $_POST['vby'];
   $rby =  $_POST['rby'];
   $f =  $_POST['f'];
   $idetails =  $_POST['idetails'];
   $iname =  $_POST['iname'];
   $pf =  $_POST['pf'];
   $descrition =  $_POST['descrition'];
   $approval = $_POST['status'];
   $age =  $_POST['remark'];
   $image = $_POST['userimage'];
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
<div class="regform"><h1>Claimed Form</h1></div>
<div class="main">
<form action="" method="POST" id="Signup" name="Signup" class="group-input" enctype="multipart/form-data"> 
<input type="hidden" class="code" name="user_id" placeholder="<?php echo $row['claim_id'];?>" id="Age" size="5" value = "<?php echo $row['claim_id'];?>"  required>
<div id="name">
    <h2 class="name">Date</h2>
    <input type="text"class="firstname" name="date" placeholder="<?php echo $date;?>" id="firstname" 
    value="<?php echo $date;?>" > <br>
<label class="firstlabel">Approved Date</label>
<input type="text" class="lastname" name="time" placeholder="<?php echo $time1;?>" id="lastname"
value="<?php echo $time1;?>" > 
<label class="lastlabel">Approved  Time</label>
</div>
<h2 class="name">Admin</h2>
<input type="text" class="email" name="vby" placeholder="<?php echo $row1['firstname'];?> <?php echo $row1['lastname'];?>," id="Email" value ="<?php echo $row1['firstname'];?> <?php echo $row1['lastname'];?>" required>
<h2 class="name">Requested By</h2>
<input type="text" class="email" name="rby" placeholder="<?php echo $row['mislayer'];?>"  value="<?php echo $row['mislayer'];?>" id="Email" required>
<h2 class="name">Finder</h2>
<input type="text" class="email" name="f" placeholder="<?php echo $row['finder'];?>" value="<?php echo $row['finder'];?>" id="Email" required>
<div id="name">
    <h2 class="name"> Item Details</h2>
    <input type="text"class="firstname" name="idetails" placeholder="<?php echo $date;?>" id="firstname" 
    value="<?php echo $row['item_claimed'];?>" > <br>
<label class="firstlabel">Item Brand</label>
<input type="text" class="lastname" name="iname" placeholder="<?php echo $time1;?>" id="lastname"
value="<?php echo $row['brand_claimed'];?>" > 
<label class="lastlabel">Item Brand</label>
</div>
<h2 class="name">Place Found</h2>
<input type="text" class="email" name="pf" placeholder="<?php echo $row['place_found'];?>" value="<?php echo $row['place_found'];?>" id="Email" required>
<h2 class="name">Description</h2>
<input type="text" class="email" name="descrition" placeholder="<?php echo $row['description_claimed'];?>" value="<?php echo $row['description_claimed'];?>" id="Email" required>


<h2 class="name">status</h2>
<select class="option" name="status" id="access" required>
    <option disable="disable" selected ="selected">--choose option</option>
    <option value="Claimed Item">Claimed Item</option>
    <option value="Unclaimed Item">Unclaimed Item</option>
</select>
<h2 class="name">Photo</h2>
    <input type="hidden" name="userimage" value="<?php echo $row['photo'];?>" ><br>
    <img src="upload/<?php echo $row['photo'];?>" onclick="triggerClick()" id="profileDisplay" width="150"; hieght="150px"; ><br>

<button type="submit" class="sub-btn" name ="Signup" value="submit form">Submit</button>
<button type="submit" class="sub-btn" name ="cancel" value="submit form"><a href="approvedreq.php">CANCEL</a></button>  
 </form>
         
</div>
<script src="scripts.js"></script>
</body>

</html>
<?php
}else{
    echo '<script>alert("This Site is Secured Please Login First ")</script>' ;
}
?>