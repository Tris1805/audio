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
    include '../components/connectDB.php';
    session_start();


    // Retrieve search parameters from AJAX request
    $minPrice = isset($_GET['min']) ? intval($_GET['min']) : 0;
    $maxPrice = isset($_GET['max']) ? intval($_GET['max']) : 10000000;
    $perPage = isset($_POST['perPage']) ? intval($_POST['perPage']) : 8;
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $offset = ($page - 1) * $perPage;
    $sql = "SELECT * FROM products WHERE price BETWEEN '$minPrice' AND '$maxPrice' LIMIT $offset, $perPage";

    // Execute query
    $result = mysqli_query($conn, $sql);
    $searchResults = "";
    $totalProducts = mysqli_query($conn, "select * from products WHERE price BETWEEN '$minPrice' AND '$maxPrice'");
    $totalProducts = $totalProducts->num_rows;
    $totalPages = ceil($totalProducts / $perPage);
    // Display results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults .= '<div class="new-items">';
            $searchResults .= '<div>';
            $searchResults .= '<div class="new-items-img">';
            $searchResults .= sprintf('<img src="%s" style="height: 210px; width: 210px;" />', $row['image']);
            $searchResults .= '</div>';
            $searchResults .= '<div class="new-items-data">';
            $searchResults .= '<a class="new-items-data--title" href=""><p>' . $row['name'] . '</p></a>';
            $searchResults .= sprintf('<div class="newprice" style="text-align: right;
            padding-right: 2px;">%sđ</div>', number_format($row['price'], 0, '', ','));
            $searchResults .= "</div>";
            $searchResults .= "</div>";
            $searchResults .= "</div>";
        }

    } else {

        $searchResults .= "<div>No results found</div>";
    }


    // Close database connection
    // mysqli_close($conn);
    ?>

    <div id="app">
        <div class="header-container">
            <div class="header-content">
                <div class="left"><a href="trangchu.php">Ikus Audio</a></div>
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
            <img src="../assets/images/banners/productBanner2.jpg" style="margin-top: 100px" />
        </div>
        <div class="main-content">
            <?php
            $sqlType = 'SELECT * FROM `type`';
            $resultType = mysqli_query($conn, $sqlType);
            while ($row = mysqli_fetch_assoc($resultType)) {

                ?>
                <div><a href="renderByType.php?type=<?= $row['id'] ?>#print-search" class="main-tag" id="full-sized-btn"
                        onclick="getProducts('<?= $row['name'] ?>')"><?= strtoupper($row['name']) ?></a></div>

            <?php } ?>
        </div>
        <div class="main-content">
            <div class="new-product">
                <form action="search.php#print-search" method="POST" id="search-form">
                    <div class="search-bar">
                        <input id="search-input" type="text" name="search" placeholder="Gõ để tìm kiếm" maxlength="40"
                            style="
                    border: 1px solid rgb(116, 116, 116);
                    border-radius: 38px;
                    border-image: initial;
                    background: none;
                    width: 500px;
                    height: 60px;
                    padding: 30px;
                  " />
                        <div class="search-icon">
                            <button id="search-btn" style="border: none; background-color: white"><img
                                    class="search-icon-img" src="../assets/images/icons/search-icon.png" /></button>
                        </div>
                    </div>
                </form>

                <div class="sort-container">
                    <div class="sort-option">SẮP XẾP THEO:</div>
                    <div class="sort-form">
                        <select name="product-status" id="product-status" @change="onSortChange($event)">
                            <option :value="productSort.NEWEST">Mới nhất</option>
                            <option :value="productSort.OLDEST">Cũ Nhất</option>
                            <option :value="productSort.PRICE_HIGH">Từ thấp tới cao</option>
                            <option :value="productSort.PRICE_LOW">Từ cao tới thấp</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="new-product">
                <div class="left-menu">
                    <div class="brand-filter">
                        <div class="brand-filter-title">THƯƠNG HIỆU</div>
                        <div class="brand-container">
                            <?php
                            $sqlBrand = 'SELECT * FROM `brand` WHERE 1';
                            $resultBrand = mysqli_query($conn, $sqlBrand);
                            while ($row = mysqli_fetch_assoc($resultBrand)) {
                                ?>
                                <label class="container" style="display: flex; justify-content: center;">
                                    <a href="renderByBrand.php?brand=<?= $row['id'] ?>#print-search"
                                        class="brand-chooser"><?= $row['name'] ?></a>
                                </label>
                                <!-- <label class="container" style="display: flex; justify-content: center;">
                <a href="renderByBrand.php#print-search?brand=Focal#print-search" class="brand-chooser">Focal</a>
              </label>
              <label class="container" style="display: flex; justify-content: center;">
                <a href="renderByBrand.php?brand=HiFiMan#print-search" class="brand-chooser">HiFiMan</a>
              </label>
              <label class="container" style="display: flex; justify-content: center;">
                <a href="renderByBrand.php?brand=MOONDROP#print-search" class="brand-chooser">MOONDROP</a>
              </label>
              <label class="container" style="display: flex; justify-content: center;">
                <a href="renderByBrand.php?brand=SONY#print-search" class="brand-chooser">SONY</a>
              </label> -->
                            <?php } ?>
                        </div>
                    </div>
                    <div class="brand-filter price-filter">
                        <div class="brand-filter-title">KHOẢNG GIÁ</div>
                        <div class="price-container">
                            Chọn khoảng giá mong muốn.
                            <div class="price-input-container"
                                style="display: flex; justify-content: space-around; align-items: center">
                                <input type="text" name="" id="min-price-input" class="price-input" placeholder="0"
                                    maxlength="15" />
                                <span>-</span>
                                <input type="text" name="" id="max-price-input" class="price-input" style="float: right"
                                    placeholder="10,000,000" maxlength="15" /> <br />
                            </div>
                            <label class="container" style="display: flex; justify-content: center; width: 100%;"><a
                                    href="#" class="sort-by-price--btn" onclick="searchProductsByPrice()">Tìm
                                    kiếm</a></label>
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="item-container" id="print-search">

                        <?php
                        echo $searchResults;
                        ?>

                        <!-- <div @click="onProductClick(product)">
                  <div class="new-items-img">
                    <img :src="product.image" style="height: 210px; width: 210px;" />
                  </div>
                  <div class="new-items-data">
                    <a class="new-items-data--title" href="">
                      <p>{{ product.name }}</p>
                    </a>
                    <div class="newprice">{{ formatPrice(product.price) }} đ</div>
                  </div>
                </div> -->

                    </div>
                    <ul class="pagination">
                        <?php

                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i != $page) {
                                ?>
                                <li class=""><a href="?min=<?= $minPrice ?>&max=<?= $maxPrice ?>&page=<?= $i ?>"
                                        data-page="<?= $i ?>"> <?= $i ?></a></li>
                            <?php } else { ?>
                                <li class=""><a href="?max=<?= $minPrice ?>&max=<?= $maxPrice ?>&page=<?= $i ?>" class="active"
                                        data-page="<?= $i ?>"> <?= $i ?></a>
                                </li>

                            <?php } ?>
                        <?php }
                        ?>
                    </ul>
                    <!-- <ul class="pagination">
                  <li :class="{ disabled: !canPreviousPage }" @click="onPreviousPage()">«</li>
                  <li v-for="page in pages" @click="onPageChange(page)" :class="{ active: page === currentPage }">{{ page }}
                  </li>
                  <li :class="{ disabled: !canNextPage }" @click="onNextPage()">»</li> -->
                    <!-- </ul> -->
                </div>
            </div>
        </div>
    </div>
    <?php include "../components/footer.php"; ?>
    </div>
</body>
<script src="utils/data.js"></script>
<script src="scripts/handleAjax.js"></script>
<script src="utils/commons.js"></script>
<script src="scripts/components.js"></script>
<script src="scripts/trangchu.js"></script>
<script src="scripts/chitietsanpham.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        // Bắt sự kiện khi người dùng chọn trang
        $('body').on('click', '.pagination li a', function (e) {
            e.preventDefault();
            var page = $(this).attr('data-page');
            loadData(page);
        });

        // Hàm tải nội dung mới
        function loadData(page) {
            $.ajax({
                url: 'searchByPrice.php',
                type: 'POST',
                data: { page: page },
                success: function (response) {
                    $('#app').html(response);
                }
            });
        }
    });
    function searchProductsByPrice() {
        var minPrice = document.getElementById("min-price-input").value;
        var maxPrice = document.getElementById("max-price-input").value;
        var url = "searchByPrice.php?min=" + minPrice + "&max=" + maxPrice + "$page=1#print-search";
        window.location.href = url;
    }
</script>

</html>