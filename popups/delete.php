<?php
            include 'config.php';
            include 'table.php';
            $id= $_POST['id'];
            $sql = "DELETE FROM user WHERE id=$id";
            $result = mysqli_query($con,$sql);
            if($result){
                table($con);
            }else{
                echo "0";
            }



?>