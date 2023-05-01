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
    case 'delete':
        $id = $_GET['id'];
        $sql = "DELETE FROM `products` WHERE id = " . $id . "";
        if ($conn->query($sql) === TRUE) {
            echo "The record editted successfully";
            header("Location: ../admin/sanpham.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        break;
    case 'add':
        $id = $_POST['product-id'];
        $name = $_POST['product-name'];
        $price = $_POST['product-price'];
        $numberString = str_replace(',', '', $price);

        // Chuyển đổi chuỗi thành số nguyên
        $number = intval($numberString);
        $product_type = $_POST['product-type'];
        $product_brand = $_POST['product-brand'];
        if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['name'] == '') {
            //No file selected
            $sql = "INSERT INTO `products`(`id`, `name`, `price`, `type`, `brand`, `date`, `description`) VALUES ('" . $id . "', '" . $name . "', '" . $number . "', '" . $product_type . "', '" . $product_brand . "', '0', '');";
        } else {
            $hinh = '';
            uploadHinh($hinh);
            $sql = "INSERT INTO `products`(`id`, `name`, `price`, `type`, `brand`, `date`, `image`, `description`) VALUES ('" . $id . "', '" . $name . "', '" . $number . "', '" . $product_type . "', '" . $product_brand . "', '0', '" . $hinh . "', '');";
        }
        if ($conn->query($sql) === TRUE) {
            echo "The record edited successfully";
            header("Location: ../admin/sanpham.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        break;
    case "addQuantity":
        $id = $_POST['product-id'];
        $quantity = $_POST['product-quantity'];
        // var_dump($quantity);exit();
        $date_format = 'Y-m-d';
        $current_time = time();
        $current_time_formatted = date($date_format, $current_time);
        if (!is_numeric($quantity) || $quantity < 0) {

            die('Lỗi: Số lượng sản phẩm không hợp lệ.');
        } else {

            $quantity = intval($quantity);
        }
        $sql = "INSERT INTO `purchase_order`(`id`, `product_id`, `quantity`, `created_day`, `last_updated`) VALUES (null, " . $id . ", " . $quantity . ", " . $current_time_formatted . ", " . $current_time_formatted . ")";
        // var_dump($sql);exit();
        if ($conn->query($sql) === TRUE) {
            echo "The record edited successfully";
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_begin_transaction($conn);

        try {
            $tolal_products = mysqli_query($conn, "select * from products");
            $tolal_products = $tolal_products->num_rows;
            if (intval($id) == $tolal_products){
                $billIDResult = mysqli_query($conn, "SELECT id FROM purchase_order WHERE product_id = '" . $id . "' ORDER BY id DESC LIMIT 1;");
                $billIDRow = mysqli_fetch_assoc($billIDResult);
                $billID = $billIDRow['id'];
                $updateInventory = mysqli_query($conn, "INSERT INTO `inventory`(`id`, `product_id`, `quantity`, `updated_at`, `order_purchase_id`, `order_sale_id`, `order_type`) VALUES (null, " . $id . ", " . $quantity . ", now(), " . $billID . ", null, 'purchase');");
            }else{
                $getLatestQuantity = mysqli_query($conn, "SELECT quantity FROM inventory WHERE product_id = '" . $id . "' ORDER BY id DESC LIMIT 1;");
                $billIDResult = mysqli_query($conn, "SELECT id FROM purchase_order WHERE product_id = '" . $id . "' ORDER BY id DESC LIMIT 1;");
                $billIDRow = mysqli_fetch_assoc($billIDResult);
                $billID = $billIDRow['id'];
                $row2 = mysqli_fetch_assoc($getLatestQuantity);
                $latestQuantity = $row2['quantity'];
                $newQuantity = $latestQuantity + $quantity;
                $updateInventory = mysqli_query($conn, "INSERT INTO `inventory`(`id`, `product_id`, `quantity`, `updated_at`, `order_purchase_id`, `order_sale_id`, `order_type`) VALUES (null, " . $id . ", " . $newQuantity . ", now(), " . $billID . ", null, 'purchase');");
            }

            // Hoàn thành giao dịch
            mysqli_commit($conn);
            header("Location: ../admin/sanpham.php");
        } catch (Exception $e) {
            // Lỗi xảy ra, rollback giao dịch
            mysqli_rollback($conn);
            // Xử lý lỗi
            // ...
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