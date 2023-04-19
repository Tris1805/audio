<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Giỏ hàng</title>
  <!-- <script src="lib/vue.global.prod.js"></script>
  <script src="lib/vue.global.prod.js"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
  <?php
  session_start();
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  include '../components/connectDB.php';
  if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = array();
  }
  $error = false;
  $succes = "";
  if (isset($_GET['action'])) {
    function update_cart($add = false)
    {

      foreach ($_POST['quantity'] as $id => $quantity) {
        if ($quantity == 0) {
          unset($_SESSION['giohang'][$_GET['id']]);
        } else {

          if ($add) {
            $_SESSION['giohang'][$id] += $quantity;

          } else {
            $_SESSION['giohang'][$id] = $quantity;
          }
        }

      }
    }
    switch ($_GET['action']) {
      case "add":
        update_cart(true);
        header("Location: ./giohang.php");
        break;
      case 'delete':
        if (isset($_GET['id'])) {
          unset($_SESSION['giohang'][$_GET['id']]);
          header("Location: ./giohang.php");
        }
        break;
      case 'submit':
        if (empty($_POST['ho-ten-dich'])) {
          $error = "Please enter your name";
        } else if (empty($_POST['dia-chi-dich'])) {
          $error = "Please enter your address";
        } else if (empty($_POST['so-dien-thoai-dich'])) {
          $error = "Please enter your correct phone number";
        } else if (!preg_match('/^(03|05|07|08|09)+([0-9]{8})\b/', $_POST['so-dien-thoai-dich'])) {
          $error = "Invalid phone number";
        } else if (empty($_POST['quantity'])) {
          $error = "Nothing in your cart";
        }
        if (!$error && !empty($_POST['quantity'])) {
          $query = "SELECT * FROM `products` WHERE `id` IN (" . implode(",", array_keys($_SESSION['giohang'])) . ")";
          $products = mysqli_query($conn, $query);
          $total = 0;
          $orderProducts = array();
          while ($row = mysqli_fetch_array($products)) {
            $orderProducts[] = $row;
            $total += $row['price'] * $_POST['quantity'][$row['id']];
          }
          $date_format = 'Y-m-d H:i:s'; // Chuỗi định dạng thời gian, ví dụ: 'Y-m-d H:i:s' cho định dạng năm-tháng-ngày giờ:phút:giây
          $current_time = time(); // Lấy thời gian hiện tại
  
          // Sử dụng hàm date() để định dạng thời gian hiện tại theo chuỗi định dạng
          $current_time_formatted = date($date_format, $current_time);
          $insertBill = mysqli_query($conn, "INSERT INTO `bill`(`id`, `user_id`, `address`, `note`, `created_day`, `last_updated`, `payment`, `total`, `cus_name`) VALUES (null,1,'" . $_POST['dia-chi-dich'] . "','" . $_POST['ghi-chu-dich'] . "','" . $current_time_formatted . "','" . $current_time_formatted . "','" . $_POST['payment'] . "','" . $total . "', '".$_POST['ho-ten-dich']."')");
          $billID = $conn->insert_id;
          $insertString = "";
          foreach ($orderProducts as $key => $product) {
            $quantity = (int) $_POST['quantity'][$product['id']];
            $insertString .= "(null, '" . $billID . "' , '" . $product['id'] . "' , '" . $quantity . "' , '" . $product['price'] . "' , '" . $current_time_formatted . "' , '" . $current_time_formatted . "')";
            if ($key != count($orderProducts) - 1) {
              $insertString .= " ,";
            }
            mysqli_begin_transaction($conn);

            try {
              $getLatestQuantity = mysqli_query($conn, "SELECT quantity FROM inventory WHERE product_id = '" . $product['id'] . "' ORDER BY id DESC LIMIT 1;");
              $row2 = mysqli_fetch_assoc($getLatestQuantity);
              $latestQuantity = $row2['quantity'];
              $newQuantity = $latestQuantity - $quantity;
              $updateInventory = mysqli_query($conn, "INSERT INTO `inventory`(`id`, `product_id`, `quantity`, `updated_at`, `order_purchase_id`, `order_sale_id`, `order_type`) VALUES (null, ".$product['id'].", ".$newQuantity.", now(), null, ". $billID.", 'sale');");

              // Hoàn thành giao dịch
              mysqli_commit($conn);
            } catch (Exception $e) {
              // Lỗi xảy ra, rollback giao dịch
              mysqli_rollback($conn);
              // Xử lý lỗi
              // ...
            }
            
          }
          // $updateInventory = mysqli_query($conn, "INSERT INTO `inventory`(`id`, `product_id`, `quantity`, `updated_at`, `order_purchase_id`, `order_sale_id`, `order_type`) VALUES (null, ".$product['id'].", 2, now(), null, ". $billID.", 'sale');");
          // echo "INSERT INTO `bill_details`(`id`, `bill_id`, `product_id`, `quantity`, `price`, `created_day`, `last_updated`) VALUES " . $insertString . "";
          $insertBill = mysqli_query($conn, "INSERT INTO `bill_details`(`id`, `bill_id`, `product_id`, `quantity`, `price`, `created_day`, `last_updated`) VALUES " . $insertString . ";");
          $succes = "Đặt hàng thành công";
          unset($_SESSION['giohang']);
        }
        // header("Location: ./giohang.php");
  
        break;
    }
  }
  $isNull = 0;
  if (!empty($_SESSION['giohang'])) {
    $query = "SELECT * FROM `products` WHERE `id` IN (" . implode(",", array_keys($_SESSION['giohang'])) . ")";
    $products = mysqli_query($conn, $query);
    $isNull = 1;
  }
  ?>
  <div id="app">

    <?php include "../components/header.php"; ?>

    <div class="main-container">
      <?php
      if (!empty($error)) {
        ?>
        <div class="ermsg" style="margin-top: 110px;  width: 100%; height: 40px;">
          <?php echo $error; ?>
          <a href="javascript:history.back()">Quay lại</a>
        </div>
      <?php } else if( !empty($succes)) { ?>
        <div class="ermsg" style="margin-top: 110px;  width: 100%; height: 40px;">
          <?php echo $succes; ?>
          <a href="trangchu.php">Quay lại</a>
        </div>
      <?php } else {


      ?>
        <div class="cart-container">
          <div class="payment-content">
            <span class="payment-title">Giỏ Hàng</span><br />
            <div class="line"></div>
            <br />
            <span class="customer-info-title">Thông tin khách hàng</span>
            <div class="main-payment-info">
              <?php
              if (!empty($_SESSION["cur_user"])) {
                $cur_user = $_SESSION["cur_user"];

                ?>
                <form action="" id="customer-info">
                  <label for="">Họ tên *</label><br />
                  <input type="text" id="ho-ten" class="user-input" value="" required /><br />
                  <label for="">Địa chỉ *</label><br />
                  <input type="text" id="dia-chi" class="user-input" value="" required /><br />
                  <label for="">Số điện thoại *</label><br />
                  <input type="text" id="so-dien-thoai" class="user-input" name="" value="<?php echo $cur_user['phone'] ?>"
                    placeholder="<?php echo $cur_user['phone'] ?>" required /><br />
                  <label for="">Ghi chú</label><br />
                  <input type="text" id="ghi-chu" class="user-input" /><br />
                </form>
              <?php } ?>
            </div>
            <div class="main-payment-method main-payment-info">
              <span class="customer-info-title">Phuong thuc thanh toan</span>
              <form action="" id="payment-method">
                <input type="radio" class="payment-checkbox" name="payment" id="cod" value="cod" checked />COD
                <img style="height: 30px" src="../assets/images/icons/COD.png" alt="" />
                <br />

                <input type="radio" class="payment-checkbox" name="payment" id="bank" value="bank" style ="margin-top: 5%" />Internet Banking
                <img style="height: 30px" src="../assets/images/icons/bank.png" alt="" />
                <br />
              </form>
            </div>
          </div>
          <div class="cart-content">
            <form action="giohang.php?action=submit" method="POST" id="form-dich">
              <div class="total">TỔNG TIỀN: </div>
              <input class="complete-payment" type="submit" value="Thanh toán" onclick="guiDuLieu()">
              <input type="hidden" style="display:none;" value="" name="ho-ten-dich" id="ho-ten-dich">
              <input type="hidden" style="display:none;" value="" name="dia-chi-dich" id="dia-chi-dich">
              <input type="hidden" style="display:none;" value="" name="so-dien-thoai-dich" id="so-dien-thoai-dich">
              <input type="hidden" style="display:none;" value="" name="ghi-chu-dich" id="ghi-chu-dich">
              <input type="hidden" style="display:none;" value="" name="payment" id="payment">
              <div class="line2"></div>
              <br />
              <div class="cart-list">
                <ul>
                  <?php

                  if ($isNull == 0) {
                    echo "<p>Bạn chưa mua hàng</p>";
                  } else {
                    while ($row = mysqli_fetch_array($products)) {

                      ?>
                      <li>
                        <div class="cart-list-item">
                          <img src="../<?php echo $row['image'] ?>" />
                          <div class="cart-list-item-info">
                            <?php echo $row['name'] ?> </br>
                            <span class="price">
                              <?php echo sprintf('<div class="">%sđ</div>', number_format($row['price'], 0, '', ',')) ?>
                            </span>
                            <input type="text" class="quantity_order_confirm" name="quantity[<?php echo $row['id'] ?>]"
                              value="<?php echo $_SESSION['giohang'][$row['id']] ?>" onchange="updateTotal()">
                          </div>
                          <a href="giohang.php?action=delete&id=<?php echo $row['id'] ?>">
                            <div class="delete-item">
                              <img src="../assets/images/icons/bin.png" alt="" />
                            </div>
                          </a>
                        </div>
                      </li>
                      <?php
                    }
                  }
      }
      ?>

              </ul>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php include "../components/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
  </div>
</body>
<!-- <script src="utils/data.js"></script>
<script src="utils/commons.js"></script>
<script src="scripts/components.js"></script>
<script src="scripts/giohang.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  updateTotal();
  // function updateTotal() {
  //   var total = 0;
  //   var quantities = document.getElementsByClassName("quantity_order_confirm");
  //   var prices = document.getElementsByClassName("price");

  //   for (var i = 0; i < quantities.length; i++) {
  //     var quantity = parseInt(quantities[i].value);
  //     var price = parseFloat(prices[i].innerText);
  //     total += quantity * price;
  //   }

  //   var formattedTotal = total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
  //   document.getElementsByClassName("total")[0].innerText = "TỔNG TIỀN: " + formattedTotal;
  // }
  function updateTotal() {
    var total = 0;
    var quantities = document.getElementsByClassName("quantity_order_confirm");
    var prices = document.getElementsByClassName("price");

    for (var i = 0; i < quantities.length; i++) {
      var quantity = parseInt(quantities[i].value);
      var priceText = prices[i].textContent;
      var price = parseFloat(priceText.replace(/,|đ/g, ''));
      // var price = parseFloat(prices[i].innerText);
      total += quantity * price;

      // Kiểm tra nếu số lượng là 0 thì gửi yêu cầu xóa sản phẩm
      if (quantity === 0) {
        var productId = quantities[i].name.match(/\[(.*?)\]/)[1];
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "giohang.php?action=delete&id=" + productId, true);
        xhr.send();
        var cartItem = quantities[i].closest(".cart-list-item");
        cartItem.parentNode.removeChild(cartItem);
      }
    }

    var formattedTotal = total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    document.getElementsByClassName("total")[0].innerText = "TỔNG TIỀN: " + formattedTotal;
  }
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      // Xử lý kết quả trả về từ máy chủ
      console.log(this.responseText);
    }
  };
  xhr.open("GET", "giohang.php?action=delete&id=" + productId, true);
  xhr.send();

  function guiDuLieu() {
    // Lấy dữ liệu từ các trường nhập liệu trong các form
    var hoTen = document.getElementById("ho-ten").value;
    var diaChi = document.getElementById("dia-chi").value;
    var soDienThoai = document.getElementById("so-dien-thoai").value;
    var ghiChu = document.getElementById("ghi-chu").value;
    var paymentMethod = document.querySelector('input[name="payment"]:checked'); // Lấy phần tử input radio được chọn
        if (paymentMethod) {
            var valuePayment = paymentMethod.value; // Lấy giá trị của input radio được chọn
        }

    // Gán dữ liệu vào form đích
    document.getElementById("ho-ten-dich").value = hoTen;
    document.getElementById("dia-chi-dich").value = diaChi;
    document.getElementById("so-dien-thoai-dich").value = soDienThoai;
    document.getElementById("ghi-chu-dich").value = ghiChu;
    document.getElementById("payment").value = valuePayment;

    // Submit form đích để gửi dữ liệu đi
    document.getElementById("form-dich").submit();
  }
</script>


</script>

</html>