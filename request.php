<?php
include_once("proccess6.php");
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['UserLogin'])){
    include_once("connection/connection.php");
    $con = connection();
    $id=$_GET['ID'];
    $username=$_SESSION['username'];

    $sql1="SELECT found_item.found_id,found_item.date,found_item.time,found_item.date_found,found_item.time_found,found_item.photo,found_item.place_found,found_item.item_category,
    found_item.item_name,found_item.item_brand,found_item.add_description,found_item.status,
    user_account.firstname,user_account.lastname
    FROM found_item
    INNER JOIN user_account ON found_item.user_id=user_account.id
    WHERE found_id = '$id'
    ORDER BY found_item.found_id";
    $user1 = $con -> query($sql1) or die ($con->error);
    $row1 = $user1 -> fetch_assoc();
   
    $sql="SELECT * FROM user_account WHERE username = '$username'";
$user = $con -> query($sql) or die ($con->error);
$row = $user -> fetch_assoc();

if(isset($_POST['Signup'])){
    $date_request=  $_POST['date_request'];
   $time_request =  $_POST['time_request'];
   $mislayer = $_POST['mislayer']." ". $_POST['mislayer1'];
   $finder =  $_POST['finder']." ". $_POST['finder1'];
   $i_n =  $_POST['item_name'];
   $i_b =  $_POST['item_brand'];
   $d= $_POST['descrition'];
   $image = $_POST['userimage'];
   $p_f =  $_POST['place_found'];
   $s = $_POST['status'];
   $v = $_POST['verified'];
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
<div class="regform"><h1>Request Form for Claim Item</h1></div>
<div class="main">
<form action="" method="POST" id="Signup" name="Signup" class="group-input" enctype="multipart/form-data"> 
<input type="hidden" class="code" name="user_id" placeholder="<?php echo $row['id'];?>" id="Age" size="5" value = "<?php echo $row['id'];?>"  required>
<div id="name">
    <h2 class="name">Date Request</h2>
    <input type="text"class="firstname" name="date_request" id="firstname" 
    value="<?php echo $date;?>" > <br>
<label class="firstlabel">Request Date</label>
<input type="text" class="lastname" name="time_request" id="lastname"
value="<?php echo $time1;?>" > 
<label class="lastlabel">Request Time</label>
</div>
  <div id="name">
    <h2 class="name">Mislayer</h2>
    <input type="text"class="firstname" name="mislayer" placeholder="<?php echo $row['firstname'];?>" id="firstname" 
    value="<?php echo $row['firstname'];?>" > <br>
<label class="firstlabel">First Name</label>
<input type="text" class="lastname" name="mislayer1" placeholder="<?php echo $row['lastname'];?>" id="lastname"
value="<?php echo $row['lastname'];?>" > 
<label class="lastlabel">Last Name</label>
</div>
< <div id="name">
    <h2 class="name">Finder</h2>
    <input type="text"class="firstname" name="finder" placeholder="<?php echo $row1['firstname'];?>" id="firstname" 
    value="<?php echo $row1['firstname'];?>" > <br>
<label class="firstlabel">First Name</label>
<input type="text" class="lastname" name="finder1" placeholder="<?php echo $row1['lastname'];?>" id="lastname"
value="<?php echo $row1['lastname'];?>" > 
<label class="lastlabel">Last Name</label>
</div>
<div id="name">
    <h2 class="name">Item Details</h2>
    <input type="text" class="firstname" name="item_category" placeholder="<?php echo $row1['item_category'];?>" id="username" value="<?php echo $row1['item_category'];?>">  <br>
<label class="firstlabel">Item Category</label>
<input type="text" class="lastname" name="item_name" placeholder="<?php echo $row1['item_name'];?>" id="password" value="<?php echo $row1['item_name'];?>">
<label class="lastlabel">Item Name</label>
</div>
<h2 class="name">Item Brand</h2>
<input type="text" class="email" name="item_brand" placeholder="<?php echo $row1['item_brand'];?>" id="Email" value="<?php echo $row1['item_brand'];?>" required>
<h2 class="name">Descrition</h2>
<input type="text" class="email" name="descrition" placeholder="<?php echo $row1['add_description'];?>" id="Email" value="<?php echo $row1['add_description'];?>" required>
<h2 class="name">Place Found</h2>
<input type="text" class="email" name="place_found" placeholder="<?php echo $row1['place_found'];?>" id="Email" value="<?php echo $row1['place_found'];?>" required>
<h2 class="name">Status</h2>
<input type="text" class="email" name="status" placeholder="On Going Proccess" id="Email" value="On Going Proccess" required>
<h2 class="name">Remarks</h2>
<input type="text" class="email" name="verified" placeholder="For Verification Proccess" id="Email" value="For Verification Proccess" required>
<h2 class="name">Photo</h2>
    <input type="hidden" name="userimage" value="<?php echo $row1['photo'];?>" ><br>
    <img src="upload/<?php echo $row1['photo'];?>" onclick="triggerClick()" id="profileDisplay" width="150"; hieght="150px"; ><br>

<button onclick="popUp()" type="submit" class="sub-btn" name ="Signup" value="submit form"> SUBMIT</button>
<div class ="container">
 <button type="" class="sub-btn" onclick="window.location.replace('home.php');">CANCEL</button>
 </div>   
 </form>
         
</div>
<script src="scripts.js"></script>
<script>function popUp()
{
    alert("Successfully submitted");
}</script>
</body>

</html>
<?php
}else{
    echo '<script>alert("This Site is Secured Please Login First ")</script>' ;
}
?>