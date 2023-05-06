<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đơn hàng đã đặt</title>
    <script src="lib/vue.global.prod.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
    <?php

    session_start();
    include "../components/connectDB.php";
    if (!empty($_SESSION["cur_user"])) {
        $cur_user = $_SESSION["cur_user"];
        $sql = "SELECT * FROM `bill` WHERE user_id = " . $cur_user['user_id'] . "";
        $result = mysqli_query($conn, $sql);


        ?>
        <div id="app">
            <div class="header-container">
                <div class="header-content">
                    <div class="left"><a href="index.php">Ikus Audio</a></div>
                    <div class="middle">
                        <div class="header-menu"><a class="header-menu-title no-underline" href="trangchu.php">SẢN PHẨM</a>
                        </div>

                        <div class="header-menu"><a class="header-menu-title no-underline" href="lienhe.php">LIÊN HỆ</a>
                        </div>
                    </div>
                    <div class="right">
                        <div class="username-field"
                            style="display: flex ; flex-direction: column; justify-content: center; ">
                            <span class="username_logged"> Xin chào,
                                <?php echo $cur_user['username']; ?>
                            </span>
                            <span class="username_logged">
                                <a href="logout.php" style="color: white;">Log-out</a>
                            </span>
                        </div>


                        <div class="navbar-btn login-icon"><a class="navbar-link" href="loggedIn.php"><img
                                    class="navbar-icon" src="../assets/images/icons/account.png"></a></div>
                        <div class="navbar-btn cart"><a class="navbar-link" href="giohang.php"><img class="navbar-icon"
                                    src="../assets/images/icons/shopping-cart.png"></a></div>
                    </div>
                </div>
            </div>

            <div class="main-container">
                <div class="bill-review">
                    <h2 title>THÔNG TIN ĐƠN HÀNG</h2>
                    <?php

                    $result2 = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id = " . $cur_user['user_id'] . " ");
                    $row2 = mysqli_fetch_array($result2);
                    $row = mysqli_fetch_assoc($result);


                    ?>
                    <div class="bill-body">
                        <span class="customer-title">Tên khách hàng:</span>
                        <span class="bill-info">
                            <?php echo $row['cus_name']; ?>
                        </span>
                        <span class="customer-title">Số điện thoại:</span>
                        <span class="bill-info">
                            <?php echo $row2['phone']; ?>
                        </span>
                        <!-- <span class="customer-title">Địa chỉ:</span>
                    <span class="bill-info">{{ payment.diachiKH }}</span>
                    <span class="customer-title">Ghi chú:</span>
                    <span class="bill-info">{{ payment.ghichuKH }}</span> -->
                        <div class="line2"></div>
                        <ul class="cart-table">
                            <li>
                                <div style="display: flex; justify-content: left;">STT</div>
                                <div style="margin-left: 10%; width: 20%;">Ngày mua
                                </div>
                                <div style="margin-left: 26%;">Giá Trị</div>
                            </li>
                        </ul>
                        <?php
                        $sql = "SELECT * FROM `bill` WHERE user_id = " . $cur_user['user_id'] . "";
                        $result = mysqli_query($conn, $sql);
                        $num = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <ul class="cart-table">
                                <li style="margin-top: 5px; margin-bottom: 5px; width:100%">
                                    <div style="display: flex; justify-content: left;">
                                        <?php echo $num; ?>
                                    </div>
                                    <div style="margin-left: 11.5%; width: 25%;">
                                        <?php echo $row['created_day']; ?>
                                    </div>
                                    <div style="margin-left: 20%; width: 20%">
                                        <?php echo number_format($row['total'], 0, '', ','); echo 'đ'; ?>
                                    </div>
                                    <div style="width: 20%; text-align: right ">
                                    <a style="margin-left: 20%; position: relative; right: 0" href="chitietdonhang.php?id=<?php echo $row['id']; ?>">Xem chi
                                        tiết</a>
                                    <div>
                                </li>
                            </ul>
                            <?php
                            $num++;
                        }

    }
    ?>
                </div>
            </div>
        </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        

   


</body>
<script src="utils/data.js"></script>
<script src="utils/commons.js"></script>
<script src="scripts/components.js"></script>
<script src="scripts/dathangthanhcong.js"></script>

</html>