<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giỏ hàng</title>
    <script src="lib/vue.global.prod.js"></script>
    <script src="lib/vue.global.prod.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../assets/css/style.css" />
  </head>
  <body>
    <div id="app">
    <?php include "../components/header.php"; ?>

      <div class="main-container">
        <div class="cart-container">
          <div class="payment-content">
            <span class="payment-title">Giỏ Hàng</span><br />
            <div class="line"></div>
            <br />
            <span class="customer-info-title">Thông tin khách hàng</span>
            <div class="main-payment-info">
              <form action="" id="customer-info">
                <label for="">Họ tên *</label><br />
                <input type="text" class="user-input"  required /><br />
                <label for="">Địa chỉ *</label><br />
                <input type="text" class="user-input"  required /><br />
                <label for="">Số điện thoại *</label><br />
                <input
                  type="text"
                  class="user-input"
                  name=""
                  
                  required
                /><br />
                <label for="">Ghi chú</label><br />
                <input type="text" class="user-input"  /><br />
              </form>
            </div>
            <div class="main-payment-method main-payment-info">
              <span class="customer-info-title">Phuong thuc thanh toan</span>
              <form action="" id="payment-method">
                <input
                  type="radio"
                  class="payment-checkbox"
                  name="payment"
                  id=""
                />COD
                <img
                  style="height: 30px"
                  src="../assets/images/icons/COD.png"
                  alt=""
                />
                <br />
              </form>
            </div>
          </div>
          <div class="cart-content">
            <div class="total">TỔNG TIỀN: </div>
            <div class="complete-payment" >THANH TOÁN</div>
            <div class="line2"></div>
            <br />
            <div class="cart-list">
              <ul>
                <li>
                  <div class="cart-list-item">
                    <img src="../assets/images/products/airpod_2.jpg" />
                    Air Pod 2 </br>
                    5,000,000đ
                    <select name="quantity" id="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <div class="delete-item" >
                      <img src="../assets/images/icons/bin.png" alt="" />
                    </div>

                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <?php include "../components/footer.php"; ?>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"
      ></script>
    </div>
  </body>
  <script src="utils/data.js"></script>
  <script src="utils/commons.js"></script>
  <script src="scripts/components.js"></script>
  <script src="scripts/giohang.js"></script>
</html>
