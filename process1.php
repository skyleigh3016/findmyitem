<?php
$msg = " ";
$css_class = " ";

include_once("connection/connection.php");
$conn = connection();

if(isset($_POST['Signup']))
{
    echo "<pre>", print_r($_FILES['userimage']['name']), "</pre>";
    
    $userimageName = time() .'_'. $_FILES['userimage']['name'];
    $rdate =  $_POST['date'];
    $rtime =  $_POST['time'];
    $firstname =  $_POST['firstname'];
    $lastname =  $_POST['lastname'];
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $email =  $_POST['email'];
    $age =  $_POST['age'];
    $gender =  $_POST['gender'];
    $access= $_POST['access'];
    $approval = "pending";


    $target = 'upload/'. $userimageName;

    if(move_uploaded_file($_FILES['userimage']['tmp_name'],$target))
    {
        $sql="INSERT INTO `user_account`(`date`, `time`,`userimage`,`firstname`, `lastname`,`username`,`password`,`email`,`age`,`gender`,`access`,`approval`) 
        VALUES ('$rdate','$rtime','$userimageName', '$firstname','$lastname','$username','$password','$email','$age','$gender','$access','$approval' )";
        if(mysqli_query($conn,$sql))
        {
            $msg = "Profile Uploaded and Save to database";
            $css_class = "alert-success";
            echo header("location: index1.php");
     
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