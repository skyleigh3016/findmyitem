<?php
$msg = " ";
$css_class = " ";

include_once("connection/connection.php");
$conn = connection();
$id=$_GET['ID'];
if(isset($_POST['Signup']))
{
    
   
    $vdate =  $_POST['date'];
    $vtime =  $_POST['time'];
    $vby =  $_POST['vby'];
    $rby =  $_POST['rby'];
    $f =  $_POST['f'];
    $image = $_POST['userimage'];
    $idetails =  $_POST['idetails'];
    $iname =  $_POST['iname'];
   $descrition =  $_POST['descrition'];
   $pf =  $_POST['pf'];
    $s = $_POST['status'];
    $r =  $_POST['remark'];
    $m =  $_POST['message'];
    
    {
$sql="UPDATE claim_item SET date_approved = '$vdate', time_approved = '$vtime',  admin_name = '$vby',  mislayer = '$rby', 
finder = '$f', photo = '$image', item_claimed = '$idetails',brand_claimed = '$iname', description_claimed = '$descrition', 
place_found = '$pf', status = '$s',remark_for_verification= ' $r',message_for_finder= ' $m'
WHERE claim_id = $id"; 
        if(mysqli_query($conn,$sql))
        {
            $msg = "Profile Uploaded and Save to database";
            $css_class = "alert-success";
            echo header("location: ongoing.php");
     
        }
        else
        {
            $msg = "Database Error: Failed to user";
            $css_class = "alert-danger";
        }

    
    
    }
}