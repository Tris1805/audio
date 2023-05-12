<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <title>Ikus Audio</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <!-- <script src="lib/vue.global.prod.js"></script> -->
</head>

<body>
  <?php
  include '../components/connectDB.php';
  session_start();
  $searchStr = $_POST['search'];
  // var_dump($_GET['search']);exit();
  $item_per_page = 9;
  $cur_page = !empty($_POST['page']) ? $_POST['page'] : 1;
  $offset = ($cur_page - 1) * $item_per_page;
  $sql = "SELECT * FROM `products` WHERE name LIKE '%$searchStr%' LIMIT $offset, $item_per_page";
  $result = mysqli_query($conn, $sql);
  $tolal_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%$searchStr%'");
  $tolal_products = $tolal_products->num_rows;
  $totalPages = ceil($tolal_products / $item_per_page);
  ?>
  <div id="app">
    <!-- <app-header></app-header> -->
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

            <div class="username-field" style="display: flex ; flex-direction: column; justify-content: center; ">
              <span class="username_logged"> Xin chào,
                <?php echo $cur_user['username']; ?>
              </span>
              <span class="username_logged">
                <a href="logout.php" style="color: white;">Log-out</a>
              </span>
            </div>
            <div class="navbar-btn login-icon"><a class="navbar-link" href="loggedIn.php"><img class="navbar-icon"
                  src="../assets/images/icons/account.png"></a>
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
      $sqlType = 'SELECT * FROM `type` WHERE 1';
      $resultType = mysqli_query($conn, $sqlType);
      while ($row = mysqli_fetch_assoc($resultType)) {

        ?>
        <!-- <div class="main-tag" onclick="onTypeChange('full-sized')">FULL SIZED</div>
        <div class="main-tag" onclick="onTypeChange('inear')">IN EAR</div>
        <div class="main-tag" onclick="onTypeChange('earbud')">EARBUD</div>
        <div class="main-tag" onclick="onTypeChange('true-wireless')">TRUE WIRELESS</div> -->
        <div><a href="renderByType.php?type=<?= $row['id'] ?>#print-search" class="main-tag" id="full-sized-btn"
            onclick="getProducts('<?= $row['name'] ?>')"><?= strtoupper($row['name']) ?></a></div>
        <!-- <div><a href="renderByType.php?type=inear#print-search" class="main-tag" id="in-ear-btn"
          onclick="getProducts('inear')">IN
          EAR</a></div>
      <div><a href="renderByType.php?type=earbud#print-search" class="main-tag" id="ear-bud-btn"
          onclick="getProducts('earbud')">EARBUD</a></div>
      <div><a href="renderByType.php?type=true-wireless#print-search" class="main-tag" id="true-wireless-btn"
          onclick="getProducts('true-wireless')">TRUE WIRELESS</a></div> -->
      <?php } ?>
    </div>
    <div class="main-content">
      <div class="new-product">
        <form action="search.php#print-search" method="POST" id="search-form">
          <div class="search-bar">
            <input id="search-input" value="<?= $searchStr ?>" type="text" name="search" placeholder="Gõ để tìm kiếm"
              maxlength="40" style="
                    border: 1px solid rgb(116, 116, 116);
                    border-radius: 38px;
                    border-image: initial;
                    background: none;
                    width: 500px;
                    height: 60px;
                    padding: 30px;
                  " />
            <div class="search-icon">
              <button id="search-btn" style="border: none; background-color: white"><img class="search-icon-img"
                  src="../assets/images/icons/search-icon.png" /></button>
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
                  <a href="renderByBrand.php?brand=<?= $row['id'] ?>#print-search" class="brand-chooser"><?= $row['name'] ?></a>
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
                <input type="text" name="" id="min-price-input" class="price-input" placeholder="0" maxlength="15" />
                <span>-</span>
                <input type="text" name="" id="max-price-input" class="price-input" placeholder="10,000,000"
                  maxlength="15" /> <br />
              </div>
              <label class="container" style="display: flex; justify-content: center; width: 100%;"><a href="#"
                  class="sort-by-price--btn" onclick="searchProductsByPrice()">Tìm kiếm</a></label>
            </div>
          </div>
        </div>
        <div class="product-list">
          <div class="item-container" id="print-search">

            <?php
            if ($result->num_rows > 0) {
              while ($row = mysqli_fetch_assoc($result)) {

                echo '<div class="new-items">';
                echo '<div>';
                echo '<div class="new-items-img">';
                echo sprintf('<a href="chitietsanpham.php?id=%s"><img src="%s" style="height: 210px; width: 210px;" alt=""/></a>', $row['id'], $row['image']);
                echo '</div>';
                echo '<div class="new-items-data">';
                echo '<a class="new-items-data--title no-underline" href="#"><p>' . $row['name'] . '</p></a>';
                echo sprintf('<div class="newprice" style="text-align: right;
                  padding-right: 2px;">%sđ</div>', number_format($row['price'], 0, '', ','));
                echo "</div>";
                echo "</div>";
                echo "</div>";
              }
            } else {
              echo "Không có sản phẩm tìm kiếm";
            }
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
          <div id="pagination">

            <?php include "pagination.php"; ?>
          </div>

          <!-- <ul class="pagination">
                  <li :class="{ disabled: !canPreviousPage }" @click="onPreviousPage()">«</li>
                  <li v-for="page in pages" @click="onPageChange(page)" :class="{ active: page === currentPage }">{{ page }}
                  </li>
                  <li :class="{ disabled: !canNextPage }" @click="onNextPage()">»</li> -->

        </div>
      </div>
    </div>
  </div>
  <?php include "../components/footer.php"; ?>
  <!-- <app-footer></app-footer> -->
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
      var searchStr = document.getElementById('search-input').value;
      loadData(page, searchStr);
    });

    // Hàm tải nội dung mới
    function loadData(page, searchStr) {
      $.ajax({
        url: 'search.php',
        type: 'POST',
        data: { page: page, search: searchStr },
        success: function (response) {
          $('#app').html(response);
        }
      });
    }
  });


  // $(document).ready(function () {
  //   $('#search-keyword').keyup(function () {
  //     // Lấy từ khóa tìm kiếm từ trường nhập liệu
  //     var searchKeyword = $(this).val();

  //     // Kiểm tra nếu trường tìm kiếm rỗng
  //     if (searchKeyword == '') {

  //       // window.location.href = 'trangchu.php'
  //       window.history.pushState(null, null, 'trangchu.php');
  //       // Hiển thị kết quả cũ
  //       $.get('display_products.php', function (data) {
  //         $('#print-search').html(data);
  //       });
  //       return false;
  //     }

  //     // Gửi yêu cầu tìm kiếm bằng AJAX
  //     $.ajax({
  //       url: 'search.php',
  //       type: 'POST',
  //       data: { searchKeyword: searchKeyword },
  //       success: function (response) {
  //         // Hiển thị kết quả tìm kiếm
  //         $('#print-search').html(response);
  //       }
  //     });
  //   });
  // });

  function searchProductsByPrice() {
    var minPriceInput = document.getElementById("min-price-input").value;
    minPrice = parseInt(minPriceInput.replace(/\D/g, ""));
    var maxPriceInput = document.getElementById("max-price-input").value;
    maxPrice = parseInt(maxPriceInput.replace(/\D/g, ""));
    var url = "searchByPrice.php?min=" + minPrice + "&max=" + maxPrice + "$page=1#print-search";
    window.location.href = url;
  }
  // $(window).on("load", function () {
  //   var urlParams = new URLSearchParams(window.location.search);
  //   var minPrice = urlParams.get("minPrice");
  //   var maxPrice = urlParams.get("maxPrice");

  //   if (minPrice != null && maxPrice != null) {
  //     $("#min-price-input").val(minPrice);
  //     $("#max-price-input").val(maxPrice);
  //     searchProductsByPrice(1, 8);
  //   }
  // });
  const priceInput1 = document.getElementById("min-price-input");
  priceInput1.addEventListener("input", function () {
    const value = parseInt(this.value.replace(/\D/g, ""));
    this.value = value.toLocaleString("en-US");
  });
  const priceInput2 = document.getElementById("max-price-input");
  priceInput2.addEventListener("input", function () {
    const value = parseInt(this.value.replace(/\D/g, ""));
    this.value = value.toLocaleString("en-US");
  });

  function logout() {
    window.location.href = "logout.php";
  }

</script>

</html>