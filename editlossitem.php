<?php
include_once("process2.php");
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['UserLogin'])){
    include_once("connection/connection.php");
    $con = connection();
    $id=$_GET['ID'];
    $username=$_SESSION['username'];
    
    $sql1="SELECT loss_item.loss_id,loss_item.date,loss_item.time,loss_item.date_loss,loss_item.time_loss,loss_item.photo,loss_item.place_loss,loss_item.item_category,
    loss_item.item_name,loss_item.item_brand,loss_item.add_description,loss_item.status,
    user_account.firstname,user_account.lastname
    FROM loss_item
    INNER JOIN user_account ON loss_item.user_id=user_account.id
    WHERE loss_id = '$id'
    ORDER BY loss_item.loss_id";
   $user1 = $con -> query($sql1) or die ($con->error);
   $row1 = $user1 -> fetch_assoc();

if(isset($_POST['Signup'])){
   echo "<pre>", print_r($_FILES['userimage']['name']), "</pre>";
   $userimageName = time() .'_'. $_FILES['userimage']['name'];
   $rtime =  $_POST['date'];
   $firstname =  $_POST['time'];
   $lastname =  $_POST['date_loss'];
   $username =  $_POST['time_loss'];
   $password =  $_POST['place_item_loss'];
   $email =  $_POST['item_category'];
   $age =  $_POST['item_name'];
   $gender =  $_POST['item_brand'];
   $access= $_POST['add_descrition'];
   $approval = $_POST['status'];
   
   $sql="UPDATE loss_item SET date = ' $rtime', time = ' $firstname', photo = '$userimageName', 
   date_loss = ' $lastname',time_loss = ' $username', place_loss = ' $password', item_category = '$email', 
   item_name = '$age',item_brand = ' $gender', add_description = '$access', status = ' $approval' 
   WHERE loss_id = $id"; 
   $con->query($sql) or die ($con->error);
   echo header("location: managefounditem.php?ID=".$id);
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
<div class="regform"><h1>Update Loss Item</h1></div>
<div class="main">
<form action="" method="POST" id="Signup" name="Signup" class="group-input" enctype="multipart/form-data"> 
<input type="hidden" class="code" name="user_id" placeholder="<?php echo $row['id'];?>" id="Age" size="5" value = "<?php echo $row['id'];?>"  required>
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
    <input type="text"class="firstname" name="firstname" placeholder="<?php echo $row1['firstname'];?>" id="firstname" 
    value="<?php echo $row1['firstname'];?>" > <br>
<label class="firstlabel">First Name</label>
<input type="text" class="lastname" name="lastname" placeholder="<?php echo $row1['lastname'];?>" id="lastname"
value="<?php echo $row1['lastname'];?>" > 
<label class="lastlabel">Last Name</label>
</div>
<div id="name">
    <h2 class="name">Found Date</h2>
    <input type="text"class="firstname" name="date_loss" placeholder="<?php echo $row1['date_loss'];?>" id="firstname" value="<?php echo $row1['date_loss'];?>"> <br>
<label class="firstlabel">Date Found</label>
<input type="text" class="lastname" name="time_loss" placeholder="<?php echo $row1['time_loss'];?>" id="lastname" value="<?php echo $row1['time_loss'];?>"> 
<label class="lastlabel">Time Found</label>
</div>
<h2 class="name">Place Found</h2>
<select class="option" name="place_item_loss" id="access">
    <option disable="disable" selected ="selected"><?php echo $row1['place_loss'];?></option>
    <option value="canteen">canteen</option>
    <option value="building 1 room 2">building 1 room 2</option>
    <option value="building 1 room 3">building 1 room 3</option>
</select>
<div id="name">
    <h2 class="name">Item Details</h2>
    <input type="text" class="firstname" name="item_category" placeholder="<?php echo $row1['item_category'];?>" id="username" value="<?php echo $row1['item_category'];?>">  <br>
<label class="firstlabel">Item Category</label>
<input type="text" class="lastname" name="item_name" placeholder="<?php echo $row1['item_name'];?>" id="password" value="<?php echo $row1['item_name'];?>">
<label class="lastlabel">Item Name</label>
</div>


<h2 class="name">Item Brand</h2>
<input type="text" class="email" name="item_brand" placeholder="<?php echo $row1['item_brand'];?>" id="Email" value="<?php echo $row1['item_brand'];?>" required>
<h2 class="name">Add Description</h2>
<input type="text" class="email" name="add_descrition" placeholder="<?php echo $row1['add_description'];?>" id="Email" value="<?php echo $row1['add_description'];?>" required>
<h2 class="name">Status</h2>
<select class="option" name="status" id="access" required>
    <option disable="disable" selected ="selected"><?php echo $row1['status'];?></option>
    <option value="Found Item">Found Item</option>
    <option value="Return Found Item">Return Found Item</option>
</select>

<h2 class="name">Photo</h2>
    <input type="file" name="userimage" onchange="displayImage(this)" id="userimage" text-color="white";><br>
    <img src="upload/<?php echo $row1['photo'];?>" onclick="triggerClick()" id="profileDisplay" width="150"; hieght="150px"; ><br>

<button type="submit" class="sub-btn" name ="Signup" value="submit form">UPDATE</button>
<div class ="container">
 <button type="" class="sub-btn" ><a href = "managefounditem.php" >CANCEL</a></button>
 </div>   
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