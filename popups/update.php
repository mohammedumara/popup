<?php
        include 'config.php';
        include 'table.php';
        $username_updata = $_POST['username_updata'];
        $email_updata = $_POST['email_updata'];
        $user_id = $_POST['user_id'];

        $update = "UPDATE USER SET username='$username_updata',email='$email_updata' WHERE id=$user_id";
        $result = mysqli_query($con,$update);
        if($result){
            table($con);
        }else{
            echo "0";
        }
?>