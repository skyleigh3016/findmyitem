<?php
$msg = " ";
$css_class = " ";

include_once("connection/connection.php");
$conn = connection();

if(isset($_POST['Signup']))
{
    $date_request=  $_POST['date_request'];
    $time_request =  $_POST['time_request'];
    $mislayer = $_POST['mislayer']." ". $_POST['mislayer1'];
   $finder =  $_POST['finder']." ". $_POST['finder1'];
    $i_n =  $_POST['item_name'];
    $i_b =  $_POST['item_brand'];
    $d= $_POST['descrition'];
    $image = $_POST['userimage'];
    $p_f =  $_POST['place_found'];
    $s = $_POST['status'];
    $v = $_POST['verified'];
    {
    $sql="INSERT INTO `claim_item`(`date_requested`, `time_requested`, 
        `finder`, `mislayer`, `photo`, `item_claimed`, `brand_claimed`, `description_claimed`, 
        `place_found`, `status`, `remark_for_verification`) 
        VALUES ('$date_request','$time_request','$finder','$mislayer','$image','$i_n','$i_b','$d','$p_f','$s','$v' )";

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