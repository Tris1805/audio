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
    include "../components/connectDB";
    if (!empty($_SESSION["cur_user"])){
        $cur_user = $_SESSION["cur_user"];
        $sql = "SELECT * FROM `bill` WHERE user_id = ".$cur_user['id']."";
        $result = mysqli_query($conn, $sql);
    }
?>

    <div id="app">
        <app-header></app-header>

        <div class="main-container">
            <div class="bill-review">
                <h2 title>THÔNG TIN ĐƠN HÀNG</h2>
                <?php 
                    $row = mysqli_fetch_assoc($result);
                ?>
                <div class="bill-body">
                    <span class="customer-title">Tên khách hàng:</span>
                    <span class="bill-info"><?php echo $cur_user['username'] ?></span>
                    <span class="customer-title">Số điện thoại:</span>
                    <span class="bill-info"><?php echo $cur_user['phone'] ?></span>
                    <span class="customer-title">Địa chỉ:</span>
                    <span class="bill-info"><?php echo $row['address'] ?></span>
                    <span class="customer-title">Ghi chú:</span>
                    <span class="bill-info"><?php echo $row['note'] ?></span>
                    <div class="line2"></div>
                    <ul class="cart-table">
                        <li>
                            <div style="display: flex; justify-content: left;">STT</div>
                            <div style="margin-left: 10%; width: 20%;">Món Hàng
                            </div>
                            <div style="margin-left: 26%;">Đơn Giá</div>
                        </li>
                    </ul>
                    <?php
                        while ($row){
                    ?>
                    <ul class="cart-table">
                        <li v-for="(item, index) in payment.items" style="margin-top: 5px; margin-bottom: 5px;">
                            <div style="display: flex; justify-content: left;">ID san pham</div>
                            <div style="margin-left: 6.5%; width: 25%;"><img :src="Gan cai hinh san pham vao day"
                                    style="height: 100px;"> Tensanpham
                            </div>
                            <div style="margin-left: 26%;">Dongia đ</div>
                        </li>
                    </ul>
                    <h3 style="margin-top: 20px;">TỔNG CỘNG: Total đ</h2>
                </div>
                <?php }
                ?> 
            </div>
        </div>

        <app-footer></app-footer>
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