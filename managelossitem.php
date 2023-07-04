<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin"){
include_once("connection/connection.php");
$con = connection();
$username=$_SESSION['username'];


$sql="SELECT loss_item.loss_id,loss_item.date,loss_item.time,loss_item.date_loss,loss_item.time_loss,loss_item.photo,loss_item.place_loss,loss_item.item_category,
loss_item.item_name,loss_item.item_brand,loss_item.add_description,loss_item.status,
user_account.firstname,user_account.lastname
FROM loss_item
INNER JOIN user_account ON loss_item.user_id=user_account.id
ORDER BY loss_item.loss_id";
$user = $con -> query($sql) or die ($con->error);
$row = $user -> fetch_assoc();

$sql1="SELECT * FROM user_account WHERE username = '$username'";
$user1 = $con -> query($sql1) or die ($con->error);
$row1 = $user1 -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/jpg" href="images/iconfortitlebar.png" />
    <link rel="stylesheet" href="loginStyle.css">
    <title>Find My Item</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" 
      crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" 
      crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <style type = "text/css">
      
      body{
          color:#566787;
          background:#f5f5f5;
          font-family: 'Varela Round', sans-serif;
          font:13px;
      }
      .table-wrapper{
          background:#fff;
          padding:20px 25px;
          margin:30px 0;
          border-radius:3px;
          box-shadow:0 1px 1px rgba(0,0,0,.05);
      }
      .table-title{
padding-bottom:15ppx;
background:linear-gradient(to right, #42275a, #734b6d);
color:#fff;
padding:16px 30px;
margin:-20px -25px 10px;
border:3px 3px 0 0;
      }
      .table-title h2{
          margin:5ps 0 0;
          font-size:24px;
      }
      header{
    background: black;
    padding: 8px 0;
}
nav {
    max-width: 1100px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.logo {
font-size:1.5rem;
color: #fff;
font-weight: 700;
}
.menu > li, .menu > a {
    display: inline-block;
}
.menu li {
position: relative;
}
.menu a{
    text-decoration: none;
    color: #fff;
    display: block;
    padding: 10px 1.5rem;
    transition: background-color .22s ease, color .22s ease;
}
.menu a:hover {
    background-color:  #2bab0d;
    color: #fff;
}
.submenu{
position: absolute;
background-color: black;
width: 140px;
left: 0;
display: none;
}
.submenu2{
    position: absolute;
    left: 100%;
    width: 180px;
    top:0;
    background-color: black;
    display: none;
}
.menu li:hover > .submenu {
display: block;
}
.submenu li:hover > .submenu2 {
    display: block;
    }
    .detective{
        height:450px; 
        width:500px;
        margin-top: 45px;
        margin-left: 180px;
    }
     .icon {
        float: right;
        margin-right: 825px;
        margin-top: -480px;
    }
    .welcome{
        width: 700px;
        margin-left: 620px;
        margin-top: -370px;
    }
    h2{
        font-size: 32px;
        margin-bottom: 15px;
    }
    .active {
        background-color: #2bab0d;
        border-radius: 3px;
    }
    .user {
margin-left: 250px;
    }
      </style>
</head>
<body>
<div>
   <header>
       <nav>
    <ul class="menu">
        <li><a href="#">HOME</a></li>
        <li ><a href="about.php">ABOUT</a> </li>
        <li class="active"><a href="#">SERVICES</a>
<ul class = submenu>
<li><a href="#">Manage Information</a>
                    <ul class ="submenu2">  
                <li ><a href="index1.php">Manage User Account Information</a></li>
                <li><a href="managelossitem.php">Manage Loss Item Information</a></li>
                <li><a href="managefounditem.php">Manage Found Item Information</a></li>
                <li><a href="manageongoing.php">Manage Claimed Item Information</a></li>
                <li ><a href="compare.php">Comparing Loss and Found Item</a></li>
                </ul>
                </li>
                <li><a href="#">Claimed Item</a>
                    <ul class ="submenu2">  
                <li><a href="ongoing.php">For Process of Request</a></li>
                <li><a href="verified1.php">For Verification of Request</a></li>
                <li><a href="approved.php">Approved Request</a></li>
                <li ><a href="listofclaimed.php">Claimed Item</a></li>
                </ul>
                </li>
                    <li><a href="#">Lost Items </a> 
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
        <li><a href="contact.php">CONTACT US</a></li>
        <li><?php if(isset($_SESSION['Userlogin']))?><a href="logout.php" id="logout">LOGOUT</a></li>
        <li class="user" ><a href="#"><?php echo $row1['firstname'];?>  <?php echo $row1['lastname'];?> 
        <img src="upload/<?php echo $row1['userimage']; ?>" width="30" alt="HTML tutorial" ></a></li>
</ul>
    </nav>
</header>
    </div> 
<div class="container" style = "margin-top:15px">
<a href = "addlossitem.php" class="btn btn-success btn-lg" data-toggle ="modal"><span>Add Loss Item</span></a>
<a href="printlossitem.php" class="btn btn-primary btn-lg"><span>Print Report</span></a>
</div>
<div class="container">
<div class ="table-wrapper">
<div class = "table-title"> 
<div class = "row">
<div class = "col-sm-6">
<h2>Manage <b>Loss Item</b></h2>
</div>
</div>
</div>
<table class= "table table-striped table-hover">
<thead>
<tr>
<th>Transaction No.</th>
<th>Transaction Date.</th>
<th>Mislayer</th>
<th>Photo</th>
<th>Date Loss</th>
<th>Time Loss</th>
<th>Place Loss</th>
<th>Item Category</th>
<th>Item Name</th>
<th>Item Brand</th>
<th>Description</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php do{?>
<tr>
<td class="id"><?php echo $row['loss_id'];?></td>
<td class="id"><?php echo $row['date'];?></td>
<td class="date"><?php echo $row['lastname'];?>, <?php echo $row['firstname'];?></td>
<td><img src="upload/<?php echo $row['photo']; ?>" width="80" ></td>
<td class="firstname"><?php echo $row['date_loss'];?></td>
<td class="lastname"><?php echo $row['time_loss'];?></td>
<td class="username"><?php echo $row['place_loss'];?></td>
<td class="password"><?php echo $row['item_category'];?></td>
<td class="email"><?php echo $row['item_name'];?></td>
<td class="age"><?php echo $row['item_brand'];?></td>
<td class="gender"><?php echo $row['add_description'];?></td>
<td class="access"><?php echo $row['status'];?></td>
<td>
<a href="deleteloss.php?ID=<?php echo $row['loss_id'];?>" class="edit" id ="btnEditmodal" name="btnEditmodal" 
data-toggle="modal"
>  <i class="fa fa-trash" style='font-size:12px;color:black' data-toggle="toolkit" 
title="Delete"></i></a>
<a href="editloss.php?ID=<?php echo $row['loss_id'];?>" class="edit" id ="btnEditmodal" name="btnEditmodal" 
data-toggle="modal"
>  <i class='fas fa-pen' style='font-size:12px;color:black' data-toggle="toolkit"
title="Edit"></i></a>
</td>
</tr>
<?php }while($row = $user->fetch_assoc())?>
</tbody>
</table>
</div>
</div>
<div id="addStudentModal" class = "modal fade">
<div class="modal-dialog" >
<div class = "modal-content">

<form method="POST" action="#">

<div class="modal-header">
<h4 class="modal-title">Add User Account</h4>
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">Close</button>
</div>

<div class="modal-body">
<div class ="form-group">
<label>Fullname</label>
<input type="text" name ="fullname" class ="form-control" required>
</div>

<div class ="form-group">
<labe>email</label >
<input type="email" name ="email" class ="form-control" required>
</div>

<div class ="form-group">
<label>Address</label>
<textarea name ="address" class ="form-control" required></textarea>
</div>

<div class ="form-group">
<label>Contact Number</label>
<input type="text"  name ="contactNumber" class ="form-control" required>
</div>
</div>

<div class="modal-footer">
<button type="button" class ="btn btn-default" data-dismiss="modal" >Cancel</button>
<button type="submit" class ="btn btn-success" name="btnSave">Save</button>
</div>
</form>

</div>
</div>
</div>

<div class="container" style = "margin-top:15px">
<a href = "home.php" class="btn btn-success btn-lg" data-toggle ="modal"><span>Back</span></a>
</div>

</body>
</html>
<?php
}else{
    echo header("Location:home.php"); 
}
?>
