<?php
    include '../components/connectDB.php';

    $status = $_POST['status'];
    $id =  $_POST['id'];
    // var_dump($status, $id);exit();
    // Truy vấn SQL để cập nhật trạng thái
    $sql = "UPDATE bill SET status = '$status' WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        // Cập nhật thành công
        echo "Cập nhật trạng thái thành công!";
    } else {
        // Xảy ra lỗi khi cập nhật
        echo "Lỗi: " . $conn->error;
    }

?>
