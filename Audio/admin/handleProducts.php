<?php
include "../components/connectDB.php";
switch ($_GET['action']) {
    case "edit":

        $id = $_POST['product-id'];
        $name = $_POST['product-name'];
        $price = $_POST['product-price'];
        $numberString = str_replace(',', '', $price);

        // Chuyển đổi chuỗi thành số nguyên
        $number = intval($numberString);
        if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['name'] == '') {
            //No file selected
            $sql = sprintf("UPDATE `products` SET `name` = '%s', `price` = '%f' WHERE `products`.`id` = %d;", $name, $number, $id);
        } else {
            $hinh = '';
            uploadHinh($hinh);
            $sql = sprintf("UPDATE `products` SET `name` = '%s', `price` = '%f', `image` = '%s' WHERE `products`.`id` = %d;", $name, $number, $hinh, $id);
        }
        if ($conn->query($sql) === TRUE) {
            echo "The record editted successfully";
            header("Location: ../admin/sanpham.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
}

function uploadHinh(&$hinh)
{
    $target_dir = "../assets/images/products/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $hinh = $target_file;
        //$uploadOk = 0;
        return 1;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            $hinh = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    return $uploadOk;
}
?>