<?php 
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin"){

    echo header("Location:managefounditem.php");


 }else{
    echo header("Location:home.php");
}
include_once("connection/connection.php");
$con = connection();
if(isset($_POST['delete'])){
$id = $_POST['ID'];
$sql="DELETE FROM found_item WHERE found_id = '$id'";
$con -> query($sql) or die ($con->error);

}