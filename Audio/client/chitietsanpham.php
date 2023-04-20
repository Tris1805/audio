<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chi tiết sản phẩm</title>
  <script src="lib/vue.global.prod.js"></script>
  <script src="lib/vue.global.prod.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
  <?php
  session_start();
  include '../components/connectDB.php';

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Lấy giá trị của biến productType từ yêu cầu AJAX
  $productId = $_GET['id'];

  // Truy vấn CSDL để lấy danh sách sản phẩm tương ứng với productType
  $sql = "SELECT * FROM products WHERE id = '$productId'";
  $result = mysqli_query($conn, $sql);

  // Hiển thị danh sách sản phẩm dưới dạng HTML
  
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
    <?php
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      ?>
      <div class="item-detail">
        <div class="item-detail-img">
          <img src="<?php echo $row['image'] ?>" alt="" />
        </div>
        <div class="item-detail-info">
          <h2 class="title">
            <?php echo $row['name'] ?>
          </h2>
          <h6 class="brand-name">
            THƯƠNG HIỆU <a href="#">
              <?php echo $row['brand'] ?>
            </a>
          </h6>
          <span class="item-price">
            <?php echo number_format($row['price'], 0, '', ',') ?>đ
          </span>

          <div class="guarantee">
            <div class="guarantee-img">
              <img src="../assets/images/icons/icon-shield.svg" alt="" />
            </div>
            <div class="guarantee-time">Bảo hành 12 tháng.</div>
          </div>
          <form action="giohang.php?action=add" method="POST" id="goToCart">
            Số Lượng:
            <?php
            $sql = "SELECT * FROM inventory WHERE product_id = '" . $row['id'] . "' ORDER BY id DESC LIMIT 1";
            $resultQuan = mysqli_query($conn, $sql);
            $rowQuan = mysqli_fetch_assoc($resultQuan);
            ?>
            <input type="text" id="quantity_buy" class="quantity_order" name="quantity[<?php echo $row['id'] ?>]"
              value="1">
            <input id="quantity_inventory" value="<?php echo $rowQuan['quantity'] ?>" style="margin-left: 5%"
              type="hidden">
            <span style="margin-left: 5%">Còn lại:
              <?php echo $rowQuan['quantity'] ?>
            </span>

            <input type="hidden" name="product_id" value="<?php echo $row['id'] ?>" />
            <input type="hidden" name="product_name" value="<?php echo $row['name'] ?>" />
            <input type="hidden" name="product_price" value="<?php echo $row['price'] ?>" />
            <input type="submit" class="buy-btn" value="THÊM VÀO GIỎ HÀNG" />
          </form>
          <br />
          <div class="more-detail" style="text-align:justify;">
            <ul>
              <?php
              $string = $row['description'];
              $count = substr_count($string, '"');
              if ($count == 2) {
                $matches = array();
                preg_match('/"(.*?)"/', $string, $matches);

                // Lấy nội dung giữa cặp dấu ngoặc kép
                $line = $matches[1];

                ?>
                <li>
                  <?php echo $line ?>
                </li>

              <?php } else {

                $array = explode(',', $string);
                $resultArray = array();

                // Lặp qua mỗi phần tử trong mảng
                foreach ($array as $item) {
                  // Thay thế dấu ngoặc kép (") bằng chuỗi trống ("")
                  $result = str_replace('"', '', $item);
                  // Đẩy kết quả vào mảng tạm thời
                  array_push($resultArray, $result);
                }
                foreach ($resultArray as $desc) {
                  if ($desc != "") {
                    ?>
                    <li>
                      <?php echo $desc ?>
                    </li>
                  <?php }
                }

              }
              ?>

            </ul>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <?php include "../components/footer.php"; ?>
  </div>

</body>
<script src="utils/data.js"></script>
<script src="utils/commons.js"></script>
<script src="scripts/components.js"></script>
<script src="scripts/chitietsanpham.js"></script>
<script>

  var buyBtn = document.querySelector('.buy-btn'); // Lấy phần tử có class "buy-btn"

  buyBtn.addEventListener('click', function (event) {
    event.preventDefault(); // Ngăn chặn hành vi submit form mặc định

    var quantity_ven = parseInt(document.getElementById('quantity_inventory').value);
    var quantity_buy = parseInt(document.getElementById('quantity_buy').value);

    if (quantity_buy <= quantity_ven) {
      // Nếu số lượng mua nhỏ hơn hoặc bằng số lượng hàng trong kho
      // Thực hiện submit form
      document.getElementById('goToCart').submit();
    } else {
      // Nếu số lượng mua lớn hơn số lượng hàng trong kho
      // Hiển thị thông báo lỗi
      alert('Kho không đủ hàng, vui lòng nhập số lượng nhỏ hơn hoặc bằng số lượng còn lại');
    }
  });


</script>

</html>