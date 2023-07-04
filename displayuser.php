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
// do{
// echo $row['firstname']."".$row['lastname']."<br/>";
// }while($row = $user->fetch_assoc());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/jpg" href="images/iconfortitlebar.png" />
    <link rel="stylesheet" href="displayuser.css">
    <title>Document</title>
</head>
<body>
    <div class="menu">
    <ul>
    <li> <a href="home.php"> HOME</a></li>
        <li><a href="#">ABOUT</a> </li>
        <li class="active"><a href="#">SERVICE</a>
            <div class="sub-menu">
                <ul>
                    <li><a href="displayuser.php">User Information</a></li>
                    <li><a href="#">Lost Items</a></li>
                    <li><a href="#">Found Items</a></li>
                </ul>
            </div>
        </li>
        <li><a href="#">CONTACT US</a></li>
        <li><?php if(isset($_SESSION['Userlogin']))?><a href="logout.php" id="logout">LOGOUT</a></li>
    </ul>
    </div>
    
   
    <h1>User Information<h1>
<h3>
<br>
<br/>
<table>
<thead>
<tr>
<th></th>
<th>First Name</th>
<th>Last Name</th>
</tr>
</thead>
<tbody>
<?php do{?>
<tr>
<td><a href="details.php?ID=<?php echo $row['id'];?>">view</a></td>
<td><?php echo $row['firstname'];?></td>
<td><?php echo $row['lastname'];?></td>
</tr>
<?php }while($row = $user->fetch_assoc())?>
</tbody>
</table>

    
</body>
</html>
<?php
}else{
    echo header("Location:home.php"); 
}
?>