<?php
$msg = " ";
$css_class = " ";

include_once("connection/connection.php");
$conn = connection();

if(isset($_POST['Signup']))
{
    echo "<pre>", print_r($_FILES['userimage']['name']), "</pre>";
    $userimageName = time() .'_'. $_FILES['userimage']['name'];
    $rdate =  $_POST['user_id'];
    $rtime =  $_POST['date'];
    $firstname =  $_POST['time'];
    $lastname =  $_POST['date_loss'];
    $username =  $_POST['time_loss'];
    $password =  $_POST['place_item_loss'];
    $email =  $_POST['item_category'];
    $age =  $_POST['item_name'];
    $gender =  $_POST['item_brand'];
    $access= $_POST['add_descrition'];
    $approval = $_POST['status'];


    $target = 'upload/'. $userimageName;

    if(move_uploaded_file($_FILES['userimage']['tmp_name'],$target))
    {
        $sql="INSERT INTO `loss_item`(`date_claimed`, `time_claimed`,`admin_name`,`finder`,`mislayer`,`photo`,`item_claimed`,`brand_claimed`,`description_claimed`,`status`) 
        VALUES ('$rdate','$rtime','$firstname','$userimageName','$lastname','$username','$password','$email','$age','$gender','$access','$approval' )";
        if(mysqli_query($conn,$sql))
        {
            $msg = "Profile Uploaded and Save to database";
            $css_class = "alert-success";
            echo header("location: test1.php");
     
        }
        else
        {
            $msg = "Database Error: Failed to user";
            $css_class = "alert-danger";
        }

    }
    else
    {
        $msg = "Failed to upload";
        $css_class = "alert-danger";
    }
}