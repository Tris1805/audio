<?php 
    include "../components/connectDB.php";
    switch ($_GET['action']) {
        case 'edit':
            $id = $_POST['user-id'];
            $username = $_POST['username'];
            $password = $_POST['user-password'];
            $email = $_POST['user-mail'];
            $phone = $_POST['user-tel'];
            if (isset($_POST['user-block'])){
                $isBlock = 1;
            }else {
                $isBlock = 0;
            }
            $sql = "UPDATE `users` SET `username`='".$username."',`password`='".$password."',`email`='".$email."',`phone`='".$phone."',`role`= 0,`isBlock`=".$isBlock." WHERE `user_id`= ".$id."";
            if ($conn->query($sql) === TRUE) {
                echo "The record editted successfully";
                header("Location: ../admin/nguoidung.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            break;
        case "huydon":
            $id = $_GET['id'];
            $sql = "DELETE FROM `bill` WHERE id = " .$id;
            if ($conn->query($sql) === TRUE) {
                echo "The record editted successfully";
                header("Location: ../admin/nguoidung.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            break;
    }

?>