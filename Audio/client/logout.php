<?php
include "../components/connectDB.php";
// Start session
session_start();

// // Xóa tất cả các biến session
session_unset();
session_destroy();


// Chuyển hướng trang đến trang đăng nhập
header("Location: trangchu.php");
exit;
?>