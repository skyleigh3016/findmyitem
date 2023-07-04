<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    include_once("connection/connection.php");
    $con = connection();
   
$sql="SELECT loss_item.loss_id,loss_item.date,loss_item.time,loss_item.date_loss,loss_item.time_loss,loss_item.photo,loss_item.place_loss,loss_item.item_category,
loss_item.item_name,loss_item.item_brand,loss_item.add_description,loss_item.status,
user_account.firstname,user_account.lastname
FROM loss_item
INNER JOIN user_account ON loss_item.user_id=user_account.id
ORDER BY loss_item.loss_id";
$user = $con -> query($sql) or die ($con->error);
$row = $user -> fetch_assoc();

$sql1="SELECT found_item.found_id,found_item.date,found_item.time,found_item.date_found,found_item.time_found,found_item.photo,found_item.place_found,found_item.item_category,
found_item.item_name,found_item.item_brand,found_item.add_description,found_item.status,
user_account.firstname,user_account.lastname
FROM found_item
INNER JOIN user_account ON found_item.user_id=user_account.id
ORDER BY found_item.found_id";
$user1 = $con -> query($sql1) or die ($con->error);
$row1 = $user1 -> fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/jpg" href="images/iconfortitlebar.png" />
    <link rel="stylesheet" href="test2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Find My Item</title>
    <style>
      .container4{
          width:100%;
          height:100px;
          
          padding-bottom:15px;
background:linear-gradient(to right, #42275a, #734b6d);
color:#fff;
padding:16px 30px;
margin:-20px -25px 10px;
border:3px 3px 0 0;
      }
    .container1{
        background-color:#8b18a8;
color:#ffffff;
text-align:left;
font-weight:bold;
width:90%;
text-align:center;
margin-left:30px;
}
.container2{
        background-color:#8b18a8;
color:#ffffff;
text-align:left;
font-weight:bold;
width:90%;
text-align:center;
margin-left:30px;
}
.content-table{
    border-collapse:collapse;
margin:25px 0;
font: size 0.9em;
width:90%;
border-radius:5px 5px 0 0;
overflow:hidden;
box-shadow:0 0 20px rgba(0,0,0,0.15);
padding-left:20px;
margin-left:30px;
}
.content-table thead tr {
background-color:#8b18a8;
color:black;
text-align:left;
font-weight:bold;
}
.content-table th,
.content-table td{
    padding:12px 15px;
}
.content-table tbody tr{
   border-bottom:1px solid #dddddd;
}
.content-table tbody tr:nth-of-type(even){
   background-color:#f3f3f3;
}
.content-table tbody tr:last-of-type{
   border-bottom:5px solid #8b18a8;
}
.content-table tbody tr.active-row{
   font-weight:bold;
   color:#009879;
}
.content-table1{
    border-collapse:collapse;
margin:25px 0;
font: size 0.9em;
width:90%;
border-radius:5px 5px 0 0;
overflow:hidden;
box-shadow:0 0 20px rgba(0,0,0,0.15);
margin-left:30px;
}
.content-table1 thead tr {
background-color:#8b18a8;
color:black;
text-align:left;
font-weight:bold;
}
.content-table1 th,
.content-table1 td{
    padding:12px 15px;
}
.content-table1 tbody tr{
   border-bottom:1px solid #dddddd;
}
.content-table1 tbody tr:nth-of-type(even){
   background-color:#f3f3f3;
}
.content-table1 tbody tr:last-of-type{
   border-bottom:5px solid #8b18a8;
}
.content-table1 tbody tr.active-row{
   font-weight:bold;
   color:#009879;
}
.table1{
width:50%;
float:left;
}
.table2{
    width:50%;
float:right;
}
.icon{
    width:30%;
    float:left;
    padding-top:15px; 
}
.icon2{
    width:70%;
    float:right;
    text-align:left;
    padding-top:15px;
    color: #ffff;
}
h2{
    color:black;
}
.sub-btn{
    background-color:#8b18a8;
    color:white;
    float:right;
    margin-right:30px;
}
    </style>
</head>
<body>

<div class="container4">
    <div class="icon">
        <h1 >  <img  src="images/iconfortitlebar.png" height="50px" width="50px" 
        alt="Development of Lost and Found Items Web-Droid Assistance and Monitoring System">  FindMyItem</h1>
    </div>
    <div class ="icon2"><h2><b>Comparing Loss and Found Items</b></h2></div>

</div>

<div Class= "table1">
<table class= "content-table">
<div class="container1">
<h2><b>Loss Item Information</b></h2>
</div>
<thead>
<tr>
<th>Transaction No.</th>
<th>Photo</th>
<th>Item Name</th>
<th>Item Brand</th>
<th>add Description</th>
</tr>
</thead>
<tbody>
<?php do{?>
<tr>
<td class="id"><?php echo $row['loss_id'];?></td>
<td><img src="upload/<?php echo $row['photo']; ?>" width="80" ></td>
<td class="email"><?php echo $row['item_name'];?></td>
<td class="age"><?php echo $row['item_brand'];?></td>
<td class="gender"><?php echo $row['add_description'];?></td>
</tr>
<?php }while($row = $user->fetch_assoc())?>
</tbody>
</table>
</div>
</div>
</div>
<div Class= "table2">
<div class="container2">
<h2><b>Found Item Information</b></h2>
</div>
<table class= "content-table1">
<thead>
<tr>
<th>Transaction No.</th>
<th>Photo</th>
<th>Item Name</th>
<th>Item Brand</th>
<th>add Description</th>
</tr>
</thead>
<tbody>
<?php do{?>
<tr>
<td class="id"><?php echo $row1['found_id'];?></td>
<td><img src="upload/<?php echo $row1['photo']; ?>" width="80" ></td>
<td class="email"><?php echo $row1['item_name'];?></td>
<td class="age"><?php echo $row1['item_brand'];?></td>
<td class="gender"><?php echo $row1['add_description'];?></td>
</tr>
<?php }while($row1 = $user1->fetch_assoc())?>
</tbody>
</table>
</div>
</div>
</div>
 <button type="" class="sub-btn" onclick="window.location.replace('home.php');">CANCEL</button>
</body>
</html>
<?php
}else{
    echo header("Location:home.php"); 
}
?>
