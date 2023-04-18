<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Đăng Nhập</title>
  <script src="lib/vue.global.prod.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
  <?php
    session_start();
    include '../components/connectDB.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = $_POST["username"];
      $password = $_POST["password"];
    
      $query = "SELECT * FROM users WHERE username='$username'";
      $result = mysqli_query($conn, $query);
      $user = mysqli_fetch_assoc($result);
      if (mysqli_num_rows($result) == 1 && password_verify($password, $user['password'])) {
        $_SESSION["cur_user"] = $user;
        header("Location: trangchu.php");
      } else {
        echo "Incorrect username or password."; 
      }
    }
  
  ?>

  <div id="app">
    <!-- <app-header></app-header> -->
    <?php include "../components/header.php"; ?>

    <div class="main-container">
      <div class="main-account-content">
        <!-- 
      <div v-if="!isLoggedIn" class="main-content">
        <div class="member-content">
          <div class="member-form login">
            <span class="member-form-title">ĐĂNG NHẬP</span>
            <form action="">
              <label for="username" class="form-description">Tên đăng nhập *</label>
              <br />
              <input type="text" class="user-input" id="username-id" required v-model="username" />
              <br />
              <label for="password" class="form-description">Mật khẩu *</label>
              <br />
              <input type="password" class="user-input" name="password" id="username-pws" required v-model="password" />
              <br />
            </form>
            <div class="login-func">
              <a href="" style="text-decoration: none; color: black">Quên mật khẩu</a>
              <div class="member-btn" @click="onLogin()">ĐĂNG NHẬP</div>
            </div>
          </div>
          <div class="member-form register">
            <span class="member-form-title">ĐĂNG KÝ</span>
            <form action="">
              <label for="username" class="form-description">Tên đăng nhập *</label>
              <br />
              <input type="text" class="user-input" id="username-id" required v-model="username" />
              <br />
              <label for="password" class="form-description">Mật khẩu *</label>
              <br />
              <input type="password" class="user-input" name="password" id="username-pws" required v-model="password" />
              <br />
            </form>
            <div class="register-func">
              <div class="member-btn" @click="onRegister()">ĐĂNG KÝ</div>
            </div>
          </div>
        </div>
      </div> -->
        <div class="login_card_containter">
          <div class="login_card">
            <div class="login_card_logo">
              <img src="../assets/images/banners/logo_login.png" alt="logo">
            </div>

            <div class="login_card_header">
              <h1>Sign In</h1>
              <div>Please login to use platform</div>
            </div>
            <form action="dangnhap.php" method="POST" class="login_card_form">
              <div class="form_item">
                <span class="form_item_icon material-symbols-rounded">search</span>
                <input type="text" placeholder="Enter Username" value="" required autofocus id="username" name="username">
              </div>
              <div class="form_item">
                <span class="form_item_icon material-symbols-rounded">lock</span>
                <input type="password" placeholder="Enter Password" value="" required autofocus id="password" name="password">
              </div>
              <div class="form_item_other">
                <div class="checkbox">
                  <input type="checkbox" id="rememberMeCheckbox">
                  <label for="rememberMeCheckbox">Remember me</label>
                </div>
                <a href="./quenmatkhau.php">Forgot password?</a>
              </div>
              <input type="submit" class="submit-btn"  value="Sign in">
                
            </form>

            <div class="login_card_footer">
              Don't have any account ? <a href="./dangky.php">Create one now</a>
            </div>
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

    <!-- <app-footer></app-footer> -->
    <?php include "../components/footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </div>
  <!-- <div id="toast"></div> -->
</body>

<script src="scripts/dangnhap.js"></script>
<!-- <script>
  function toast({ title = "", message = "", type = "", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
        const toast = document.createElement("div");

        // Auto remove toast
        const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
        }, duration + 1000);

        // Remove toast when clicked
        toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
            main.removeChild(toast);
            clearTimeout(autoRemoveId);
        }
        };

        const icons = {
        success: "fas fa-check-circle",
        error: "fas fa-exclamation-circle"
        };
        const icon = icons[type];
        const delay = (duration / 1000).toFixed(2);

        toast.classList.add("toast", `toast--${type}`);
        toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

        toast.innerHTML = `
                        <div class="toast__icon">
                            <i class="${icon}"></i>
                        </div>
                        <div class="toast__body">
                            <h3 class="toast__title">${title}</h3>
                            <p class="toast__msg">${message}</p>
                        </div>
                        <div class="toast__close">
                            <i class="fas fa-times"></i>
                        </div>
                    `;
        main.appendChild(toast);
    }
}
</script> -->

</html>