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
    <?php include "../components/header.php"; ?>

    <div class="main-container">
      <?php
      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="item-detail">
          <div class="item-detail-img">
            <img src="../<?php echo $row['image'] ?>" alt="" />
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
            <form action="giohang.php?action=add" method="POST">
              <input type="text" name="quantity[<?php echo $row['id'] ?>]" value="1">
              <input type="hidden" name="product_id" value="<?php echo $row['id'] ?>" />
              <input type="hidden" name="product_name" value="<?php echo $row['name'] ?>" />
              <input type="hidden" name="product_price" value="<?php echo $row['price'] ?>" />
              <input type="submit" class="buy-btn" value="THÊM VÀO GIỎ HÀNG" />
            </form>
            <br />
            <div class="more-detail" style="text-align:justify;">
              <ul>
                <?php
                $string = $row['descriptions'];
                $array = explode(',', $string);

                // Loại bỏ dấu ngoặc kép trong từng phần tử mảng
                foreach ($array as &$item) {
                  $item = str_replace('"', '', $item);
                }
                foreach ($array as $desc) {
                  if ($desc != "") {
                    ?>
                    <li>
                      <?php echo $desc ?>
                    </li>
                  <?php }
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

</html>