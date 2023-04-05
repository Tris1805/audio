<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thông tin</title>
    <script src="lib/vue.global.prod.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />

</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "audiodb";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // $sql = "SELECT count(id) as total FROM products";
    $item_per_page = 8;
    $cur_page = !empty($_POST['page']) ? $_POST['page'] : 1;
    $offset = ($cur_page - 1) * $item_per_page;
    $sql = "SELECT * FROM `products`  LIMIT $offset, $item_per_page";
    $result = mysqli_query($conn, $sql);
    $tolal_products = mysqli_query($conn, "select * from products");
    $tolal_products = $tolal_products->num_rows;
    $totalPages = ceil($tolal_products / $item_per_page);
    ?>

    <div id="app">
        <?php include "../components/header.php"; ?>

        <div class="main-container">
            <div class="logged-content" style="margin-top: 100px;
                                                width: 100%;
                                                height: 70vh;
                                                display: flex;
                                                justify-content: center;
                                                align-items: center;
                                                gap: 20px;
                                                margin-bottom: 20px;">
                <div v-if="isLoggedIn" class="member-content">
                    <div class="member-form login">
                        <span class="member-form-title">XIN CHÀO QUÝ KHÁCH</span>
                        <h2>{{ user.username }}</h2>
                        <div class="login-func">
                            <div class="member-btn" @click="onLogout()">ĐĂNG XUẤT</div>
                            <div class="member-btn" @click="onRebill()">XEM ĐƠN ĐÃ ĐẶT </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../components/footer.php"; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    </div>
</body>
<script src="utils/data.js"></script>
<script src="utils/commons.js"></script>
<script src="scripts/components.js"></script>
<script src="scripts/dangnhap.js"></script>

</html>