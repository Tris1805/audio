<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lấy Lại Mật Khẩu</title>
    <script src="lib/vue.global.prod.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />

</head>

<body>
    <?php
    include '../components/connectDB.php';

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
            <div class="main-account-content">
            <div class="login_card_containter">
          <div class="login_card">
            <div class="login_card_logo">
              <img src="../assets/images/banners/logo_login.png" alt="logo">
            </div>

            <div class="login_card_header">
              <h1>Rollback account</h1>
              <div>Just a few minutes to get back your account
              </div>
            </div>

            <div class="signup_announce">
            <div class="invalid_username" style="display: none">Invalid Username</div>
            <div class="wrong_password" style="display: none">Wrong Password Confirmation</div>
            <div class="invalid_email" style="display: none">Invalid Email</div>
            <div class="invalid_tel" style="display: none">Invalid Tel</div>
            <div class="have_blank_field" style="display: none">All The Field Must Be Filled</div>
            </div>

            <form action="" class="login_card_form">
              <div class="form_item">
                <span class="form_item_icon material-symbols-rounded">search</span>
                <input type="text" placeholder="Enter Username" required autofocus>
              </div>
              <div class="form_item">
                <span class="form_item_icon material-symbols-rounded">lock</span>
                <input type="password" placeholder="New Password" required autofocus>
              </div>
              <div class="form_item">
                <span class="form_item_icon material-symbols-rounded">lock</span>
                <input type="password" placeholder="Confirm password" required autofocus>
              </div>
              <div class="form_item">
                <span class="form_item_icon material-symbols-rounded">mail</span>
                <input type="email" placeholder="Enter email" required autofocus>
              </div>
              <div class="form_item">
                <span class="form_item_icon material-symbols-rounded">phone</span>
                <input type="tel" placeholder="Enter tel" required autofocus>
              </div>
              
              <a class="submit-btn" href="#">
                Save changes</a>
            </form>

            
          </div>
          <div class="login_card_social">
            <div style="color: black">Other Sign-In Platform</div>
            <div class="login_card_social_btns">
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3"></path>
                </svg>
              </a>
              <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M17.788 5.108a9 9 0 1 0 3.212 6.892h-8"></path>
                </svg>
              </a>
            </div>

          </div>
        </div>
            </div>
        </div>




        <?php include "../components/footer.php"; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
</body>
<script src="utils/data.js"></script>
<script src="utils/commons.js"></script>
<script src="scripts/components.js"></script>
<script src="scripts/dangnhap.js"></script>

</html>