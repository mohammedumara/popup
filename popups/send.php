<?php
    include 'config.php';
    include 'table.php';
    global $_POST;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $insert = "INSERT INTO user(username,email) values('$username','$email')";
    $result = mysqli_query($con,$insert);
    // echo $insert;
    if($result){
        // echo "1";
        table($con);
    }else{
        echo "0";
    }


?>