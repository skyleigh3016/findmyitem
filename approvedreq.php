<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin"){
include_once("connection/connection.php");
$con = connection();
$username=$_SESSION['username'];

$sql="SELECT * FROM `claim_item` WHERE status = 'Approved Request'";
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
    <link rel="stylesheet" href="test1.css">
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
padding-bottom:15px;
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
      
.btn-group .button {
  background-color: blue; /* Green */
  border: none;
  border-radius: 25px;
  color: white;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  float:left;
}

.btn-group .button:hover {
  background-color: #3e8e41;
}
.user {
margin-left: 100px;
    }
      </style>
</head>
<div>
   <header>
       <nav>
    <ul class="menu">
        <li><a href="manageongoing.php">On Going Proccess</a></li>
        <li ><a href="manageverified.php">For Verification</a> </li>
        <li class="active"><a href="#">Approved Request</a></li>
        <li><a href="manageclaimeditem.php">Claimed Item</a></li>
        <li class="user" ><a href="#"><?php echo $row1['firstname'];?>  <?php echo $row1['lastname'];?> 
        <img src="upload/<?php echo $row1['userimage']; ?>" width="30" alt="HTML tutorial" ></a></li>
</ul>
</header>
<div class="container">
<div class ="table-wrapper">
<div class = "table-title"> 
<div class = "row">
<div class = "col-sm-6">
<h2><b>Approved Request to Claim Item</b></h2>
</div>
</div>
</div>
<table class= "table table-striped table-hover">
<thead>
<tr>
<th>Transac No.</th>
<th>Approved by</th>
<th>Date Approved</th>
<th>Requested by</th>
<th>Finder</th>
<th>Photo</th>
<th>Place Found</th>
<th>Item Name</th>
<th>Item Brand</th>

<th>status</th>
<th>Remark</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php do{?>
<tr>
<td class="id"><?php echo $row['claim_id'];?></td>
<td class="password"><?php echo $row['verifier_name'];?></td>
<td class="password"><?php echo $row['date_approved'];?></td>
<td class="password"><?php echo $row['mislayer'];?></td>
<td class="password"><?php echo $row['finder'];?></td>
<td><img src="upload/<?php echo $row['photo']; ?>" width="80" ></td>
<td class="username"><?php echo $row['place_found'];?></td>
<td class="email"><?php echo $row['item_claimed'];?></td>
<td class="age"><?php echo $row['brand_claimed'];?></td>

<td class="access"><?php echo $row['status'];?></td>
<td class="access"><?php echo $row['remark_for_verification'];?></td>
<td>
<a href="claimed.php?ID=<?php echo $row['claim_id'];?>" class="edit" id ="btnEditmodal" name="btnEditmodal" 
data-toggle="modal"
>  <div class="btn-group">
  <button class="button">CLAIM</button>
</div></a>
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
