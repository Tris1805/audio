<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ikus Audio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- <script src="lib/vue.global.prod.js"></script> -->
</head>

<body>
    <?php 
    session_start();
    
    ?>
    <div id="app">
        <div class="header-container">
            <div class="header-content">
                <div class="left"><a href="index.php">Ikus Audio</a></div>
                <div class="middle">
                    <div class="header-menu"><a class="header-menu-title" href="trangchu.php">SẢN PHẨM</a></div>

                    <div class="header-menu"><a class="header-menu-title" href="lienhe.php">LIÊN HỆ</a></div>
                </div>
                <div class="right">
                    <?php
                    if (!empty($_SESSION["cur_user"])) {
                        $cur_user = $_SESSION["cur_user"];
                        ?>

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
                                    class="navbar-icon" src="../assets/images/icons/account.png"></a>
                        </div>
                        <div class="navbar-btn cart"><a class="navbar-link" href="giohang.php"><img class="navbar-icon"
                                    src="../assets/images/icons/shopping-cart.png"></a></div>
                    </div>

                    <?php
                    } else { ?>
                    <div class="navbar-btn login-icon"><a class="navbar-link" href="dangnhap.php"><img class="navbar-icon"
                                src="../assets/images/icons/account.png"></a>
                    </div>

                    <div class="navbar-btn cart"><a class="navbar-link" href="dangnhap.php"><img class="navbar-icon"
                                src="../assets/images/icons/shopping-cart.png"></a></div>
                </div>
            <?php }
                    ?>
        </div>
    </div>

    <div class="main-container">
        <div class="main-promo">
            <a href=""><img src="../assets/images/banners/brandBanner.jpg" alt=""></a>
        </div>
        <div class="main-content">
            <div class="new-product">
                <div class="new-product-title">SẢN PHẨM MỚI </div>
                <div class="item-container">
                    <div class="promo-item"><a href="chitietsanpham.php?id=5"><img
                                src="../assets/images/products/sonywh1000xm4.jpg"></a></div>
                    <div class="new-items"><a href="chitietsanpham.php?id=1">
                            <div class="new-items-img"><img src="../assets/images/products/hifiman_he400se.jpg" alt="">
                            </div>
                            <div class="new-items-data">
                                <div class="new-items-data--title" href="">
                                    <p>HiFiMan HE400SE</p>
                                </div>
                                <div class="newprice">3.990.000 đ</div>
                            </div>
                        </a>
                    </div>
                    <div class="new-items"><a href="chitietsanpham.php?id=9">
                            <div class="new-items-img"><img src="../assets/images/products/airpod_3.jpg" alt=""></div>
                            <div class="new-items-data">
                                <div class="new-items-data--title" href="chitietsanpham.php?id=9">
                                    <p>Apple Airpod 3</p>
                                </div>
                                <div class="newprice">4.750.000 đ</div>
                            </div>
                        </a>
                    </div>
                    <div class="new-items"><a href="chitietsanpham.php?id=10">
                            <div class="new-items-img"><img src="../assets/images/products/wf1000xm4.jpeg" alt="">
                            </div>
                            <div class="new-items-data">
                                <div class="new-items-data--title" href="chitietsanpham.php?id=10">
                                    <p>Sony WF-1000XM4</p>
                                </div>
                                <div class="newprice">5.490.000 đ</div>
                            </div>
                        </a>
                    </div>
                    <div class="new-items"><a href="chitietsanpham.php?id=18">
                            <div class="new-items-img"><img src="../assets/images/products/moondrop_kato.jpg" alt="">
                            </div>
                            <div class="new-items-data">
                                <div class="new-items-data--title" href="chitietsanpham.php?id=18">
                                    <p>Moondrop KATO</p>
                                </div>
                                <div class="newprice">4.350.000 đ</div>
                            </div>
                        </a>
                    </div>
                    <div class="new-items"><a href="chitietsanpham.php?id=23">
                            <div class="new-items-img"><img src="../assets/images/products/moondrop_blessing2.jpg"
                                    alt=""></div>
                            <div class="new-items-data">
                                <div class="new-items-data--title" href="chitietsanpham.php?id=23">
                                    <p>Moondrop Blessing 2</p>
                                </div>
                                <div class="newprice">7.250.000 đ</div>
                            </div>
                        </a>
                    </div>
                    <div class="new-items"><a href="chitietsanpham.php?id=3">
                            <div class="new-items-img"><img src="../assets/images/products/focal_radiance.jpeg" alt="">
                            </div>
                            <div class="new-items-data">
                                <div class="new-items-data--title" href="chitietsanpham.php?id=3">
                                    <p>Focal Radiance</p>
                                </div>
                                <div class="newprice">29.990.000 đ</div>
                            </div>
                        </a>
                    </div>
                    <div class="more-items"><a href="trangchu.php">XEM TẤT CẢ SẢN PHẨM</a></div>
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="new-product">
                <div class="new-product-title">SẢN PHẨM NỔI BẬT </div>
                <div class="item-container">
                    <div class="new-items"><a href="chitietsanpham.php?id=2">
                            <div class="new-items-img"><img src="../assets/images/products/focal_celestee.jpg" alt="">
                            </div>
                            <div class="new-items-data">
                                <a class="new-items-data--title" href="chitietsanpham.php?id=2">
                                    <p>Focal Celestee</p>
                                </a>
                                <div class="newprice">29.990.000 đ</div>
                            </div>
                        </a>
                    </div>
                    <div class="new-items"><a href="chitietsanpham.php?id=8">
                            <div class="new-items-img"><img src="../assets/images/products/airpod_pro.jpg" alt="">
                            </div>
                            <div class="new-items-data">
                                <a class="new-items-data--title" href="chitietsanpham.php?id=8">
                                    <p>Apple Airpod Pro VN/A</p>
                                </a>
                                <div class="newprice">4.990.000 đ</div>
                            </div>
                        </a>
                    </div>
                    <div class="new-items"><a href="chitietsanpham.php?id=11">
                            <div class="new-items-img"><img src="../assets/images/products/wfc500.jpg" alt="">
                            </div>
                            <div class="new-items-data">
                                <a class="new-items-data--title" href="chitietsanpham.php?id=11">
                                    <p>Sony WF-C500</p>
                                </a>
                                <div class="newprice">1.990.000 đ</div>
                            </div>
                        </a>
                    </div>
                    <div class="new-items"><a href="chitietsanpham.php?id=20">
                            <div class="new-items-img"><img src="../assets/images/products/moondrop_starfield.png"
                                    alt="">
                            </div>
                            <div class="new-items-data">
                                <a class="new-items-data--title" href="chitietsanpham.php?id=20">
                                    <p>Moondrop Starfield</p>
                                </a>
                                <div class="newprice">2.890.000 đ</div>
                            </div>
                        </a>
                    </div>


                    <div class="more-items"><a href="trangchu.php">Xem tất cả sản phẩm</a></div>
                </div>
            </div>
        </div>

        <div class="promo-banners-container">
            <div class="promo-banners">
                <div class="promo-banners-img"><a href=""><img src="../assets/images/banners/VinylSaigon.png"
                            alt=""></a>
                </div>
                <div class="promo-banners-img"><a href=""><img
                            src="../assets/images/banners/iFi-micro-iDSD-Signature.png" alt=""></a></div>
                <div class="promo-banners-img"><a href=""><img src="../assets/images/banners/iCamp.png" alt=""></a>
                </div>
                <div class="promo-banners-img"><a href=""><img src="../assets/images/banners/jlab-go-air-01.png"
                            alt=""></a></div>
            </div>
        </div>
    </div>

    <?php include "../components/footer.php"; ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>
<script src="utils/data.js"></script>
<script src="utils/commons.js"></script>
<script src="scripts/components.js"></script>
<script src="scripts/index.js"></script>

</html>