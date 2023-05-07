<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chi Tiết Đơn Hàng</title>
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
        $billId = $_GET['id'];
        $cur_user = $_SESSION["cur_user"];
        $sql = "SELECT * FROM `bill` WHERE id = " . $billId . "";
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
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="bill-body">
                    <span class="customer-title">Tên khách hàng:</span>
                    <span class="bill-info">
                        <?php echo $row['cus_name'] ?>
                    </span>
                    <span class="customer-title">Số điện thoại:</span>
                    <span class="bill-info">
                        <?php echo $cur_user['phone'] ?>
                    </span>
                    <span class="customer-title">Địa chỉ giao hàng:</span>
                    <span class="bill-info">
                        <?php echo $row['address'] ?>
                    </span>
                    <span class="customer-title">Ghi chú:</span>
                    <span class="bill-info">
                        <?php echo $row['note'] ?>
                    </span>
                    <div class="line2"></div>
                    <ul class="cart-table">
                        <li>
                            <div style="display: flex; justify-content: left;">STT</div>
                            <div style="margin-left: 10%; width: 20%;">Món Hàng
                            </div>
                            <div style="">Số lượng</div>
                            <div style="margin-left: 26%;">Đơn Giá</div>
                        </li>
                    </ul>
                    <?php
                    $sql = "SELECT * FROM `bill` WHERE user_id = " . $cur_user['user_id'] . "";
                    $result = mysqli_query($conn, $sql);

                    $sql2 = "SELECT * FROM `bill_details` WHERE bill_id =" . $row['id'] . "";
                    $result2 = mysqli_query($conn, $sql2);
                    $num = 1;
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                        <ul class="cart-table">
                            <li v-for="(item, index) in payment.items" style="margin-top: 5px; margin-bottom: 5px;">
                                <div style="display: flex; justify-content: left;">
                                    <?php echo $num; ?>
                                </div>
                                <?php
                                $sql3 = "SELECT * FROM `products` WHERE id = " . $row2['product_id'] . "";
                                $result3 = mysqli_query($conn, $sql3);

                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    ?>
                                    <div style="margin-left: 6.5%; width: 25%;"><img :src="Gan cai hinh san pham vao day"
                                            style="height: 100px;"> <?php
                                            echo $row3['name']; ?>
                                    </div>
                                    <div style = "width: 66px; text-align: center">
                                        <?php echo $row2['quantity']; ?>
                                    </div>
                                    <div style="margin-left: 26%;">
                                        <?php echo number_format($row2['price'], 0, '', ','); echo 'đ';
                                } ?>
                                </div>
                            </li>
                        </ul>
                        <?php
                        $num++;
                    }
                    ?>
                    <h2 style="margin:  20px 0;">Tổng cộng:
                        <?php
                        echo number_format($row['total'], 0, '', ','); echo 'đ'; ?>

                    </h2>
                </div>
            </div>
        </div>

        <?php }
        include '../components/footer.php';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    </div>
</body>
<script src="utils/data.js"></script>
<script src="utils/commons.js"></script>
<script src="scripts/components.js"></script>
<script src="scripts/dathangthanhcong.js"></script>

</html>