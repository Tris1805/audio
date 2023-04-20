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
        session_start();
        if (!empty($_SESSION["cur_user"])) {
            $cur_user = $_SESSION["cur_user"];
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
                        <h2><?php echo $cur_user['username']?></h2>
                        <div class="login-func">
                            <div class="member-btn"><a href="logout.php" style="color: white; text-decoration: none;">ĐĂNG XUẤT</a></div>
                            <div class="member-btn"><a href="dathangthanhcong.php" style="color: white; text-decoration: none;">XEM ĐƠN ĐÃ ĐẶT</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php } ?>
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