<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin"){

include_once("connection/connection.php");
$con = connection();
$id=$_GET['ID'];

$sql = "SELECT * FROM user_account WHERE id = '$id'";
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
    <link rel="stylesheet" href="details.css">
    <title>Document</title>
</head>
<body>
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
      </style>
</head>
<body>
<div class="container" style = "margin-top:15px">
<form action="delete.php" method = "POST">
        <a href = "index1.php" class="btn btn-success btn-lg" data-toggle ="modal"><span>Cancel</span></a>
        <button type="submit" name = "delete" class="btn btn-success btn-lg" data-toggle ="modal">Delete</button>
        <input type = "hidden" name = "ID" value = "<?php echo $row['id'];?>">
        </form>


</div>
<div class="container">
<div class ="table-wrapper">
<div class = "table-title"> 
<div class = "row">
<div class = "col-sm-6">
<h2> <b>Delete This User_Account</b></h2>
</div>
</div>
</div>
<table class= "table table-striped table-hover">
<thead>
<tr>
<th>Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Username</th>
<th>Password</th>
<th>Email</th>
<th>Age</th>
<th>Gender</th>
<th>Access</th>
<th>Approval</th>
</tr>
</thead>
<tbody>
<?php do{?>
<tr>
<td class="id"><?php echo $row['id'];?></td>
<td class="firstname"><?php echo $row['firstname'];?></td>
<td class="lastname"><?php echo $row['lastname'];?></td>
<td class="username"><?php echo $row['username'];?></td>
<td class="password"><?php echo $row['password'];?></td>
<td class="email"><?php echo $row['email'];?></td>
<td class="age"><?php echo $row['age'];?></td>
<td class="gender"><?php echo $row['gender'];?></td>
<td class="access"><?php echo $row['access'];?></td>
<td class="approval"><?php echo $row['approval'];?></td>
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
<h4 class="modal-title">Edit User Account</h4>
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
         
</body>
</html>
<?php
}else{
    echo '<script>alert("This Site is Secured Please Login First ")</script>' ;
}
?>