<?php
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin"){
include_once("connection/connection.php");
$con = connection();

$sql="SELECT found_item.found_id,found_item.date,found_item.time,found_item.date_found,found_item.time_found,found_item.photo,found_item.place_found,found_item.item_category,
found_item.item_name,found_item.item_brand,found_item.add_description,found_item.status,
user_account.firstname,user_account.lastname
FROM found_item
INNER JOIN user_account ON found_item.user_id=user_account.id
ORDER BY found_item.found_id";
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
<h3 style ="margin-top: 30px;">Found Items Master List</h3>
</center>
<table id = "ready" class = "table table-striped table-border" style ="width:100%;">
<thead>
<tr>
<th>Transaction No.</th>
<th>Transaction Date.</th>
<th>Finder</th>
<th>Photo</th>
<th>Date Found</th>
<th>Time Found</th>
<th>Place Found</th>
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
<td class="id"><?php echo $row['found_id'];?></td>
<td class="id"><?php echo $row['date'];?></td>
<td class="date"><?php echo $row['lastname'];?>, <?php echo $row['firstname'];?></td>
<td><img src="upload/<?php echo $row['photo']; ?>" width="80" ></td>
<td class="firstname"><?php echo $row['date_found'];?></td>
<td class="lastname"><?php echo $row['time_found'];?></td>
<td class="username"><?php echo $row['place_found'];?></td>
<td class="password"><?php echo $row['item_category'];?></td>
<td class="email"><?php echo $row['item_name'];?></td>
<td class="age"><?php echo $row['item_brand'];?></td>
<td class="gender"><?php echo $row['add_description'];?></td>
<td class="access"><?php echo $row['status'];?></td>
<td>
</tr>
<?php }while($row = $user->fetch_assoc())?>
</tbody>

</table>
</div>
 <div class ="container">
 <button type="" class="btn btn-info noprint" style="width:100%;" 
 onclick="window.location.replace('managefounditem.php');">CANCEL PRINTING</button>
 </div>   
</body>
</html>
<?php
}else{
    echo header("Location:home.php"); 
}
?>
