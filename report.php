<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin"){
include_once("connection/connection.php");
$con = connection();

$sql="SELECT * FROM user_account ORDER BY firstname DESC";
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
    <link rel="stylesheet" href="homestyle.css">
    <title>FinfMyItem</title>
    <style type ="text/css" media = "print">
    @media print {
.noprint, noprint *{
    display:none;!important;
}

    }
    </style>
</head>
<body onload="print()">
<div class = "container">
<center>
<h3 style ="margin-top: 30px;">User Account Master List</h3>
</center>
<table id = "ready" class = "table table-striped table-border" style ="width:100%;">
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
<td class="id" style ="text-align:center;"><?php echo $row['id'];?></td>
<td class="firstname" style ="text-align:center;"><?php echo $row['firstname'];?></td>
<td class="lastname" style ="text-align:center;"><?php echo $row['lastname'];?></td>
<td class="username" style ="text-align:center;"><?php echo $row['username'];?></td>
<td class="password" style ="text-align:center;"><?php echo $row['password'];?></td>
<td class="email" style ="text-align:center;"><?php echo $row['email'];?></td>
<td class="age" style ="text-align:center;"><?php echo $row['age'];?></td>
<td class="gender" style ="text-align:center;"><?php echo $row['gender'];?></td>
<td class="access" style ="text-align:center;"><?php echo $row['access'];?></td>
<td class="approval" style ="text-align:center;"><?php echo $row['approval'];?></td>
</tr>
<?php }while($row = $user->fetch_assoc())?>
</tbody>

</table>
</div>
 <div class ="container">
 <button type="" class="btn btn-info noprint" style="width:100%;" 
 onclick="window.location.replace('index1.php');">CANCEL PRINTING</button>
 </div>   
</body>
</html>
<?php
}else{
    echo header("Location:home.php"); 
}
?>
