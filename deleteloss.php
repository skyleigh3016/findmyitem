<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin"){

include_once("connection/connection.php");
$con = connection();
$id=$_GET['ID'];

$sql="SELECT loss_item.loss_id,loss_item.date,loss_item.time,loss_item.date_loss,loss_item.time_loss,loss_item.photo,loss_item.place_loss,loss_item.item_category,
loss_item.item_name,loss_item.item_brand,loss_item.add_description,loss_item.status,
user_account.firstname,user_account.lastname
FROM loss_item
INNER JOIN user_account ON loss_item.user_id=user_account.id
WHERE loss_id = '$id'
ORDER BY loss_item.loss_id";
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
<form action="deletelossitem.php" method = "POST">
        <a href = "managelossitem.php" class="btn btn-success btn-lg" data-toggle ="modal"><span>Cancel</span></a>
        <button type="submit" name = "delete" class="btn btn-success btn-lg" data-toggle ="modal">Delete</button>
        <input type = "hidden" name = "ID" value = "<?php echo $row['loss_id'];?>">
        </form>


</div>
<div class="container">
<div class ="table-wrapper">
<div class = "table-title"> 
<div class = "row">
<div class = "col-sm-6">
<h2> <b>Delete This Transaction Number</b></h2>
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
<th>add Description</th>
<th>status</th>
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