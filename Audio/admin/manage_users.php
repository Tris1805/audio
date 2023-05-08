<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/css/admin_style.css" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0"
    />
  </head>

  <body>
    <?php 
      include "../components/connectDB.php";
      $id  = $_GET['id'];
      if(isset($_GET['isBlock'])){
        $isBlock = $_GET['isBlock'];
      }else {
        $isBlock = 0;
      }
      $sql = "SELECT * FROM `users` WHERE `user_id` = '$id'";
      $result = mysqli_query($conn, $sql);
    ?>
    <div id="app">

      <div class="main-container">
        <div class="main-content">
          <div class="sidebar">
            <div class="logo-details">
              <i class="bx"></i>
              <span class="logo_name">Ikus Audio</span>
            </div>
            <ul class="nav-links">
              <li>
                <a href="./index.html" >
                  <i class="bx bx-grid-alt"></i>
                  <span class="links_name">Thống kê</span>
                </a>
              </li>
              <li>
                <a href="./sanpham.html" >
                  <i class="bx bx-box"></i>
                  <span class="links_name">Sản phẩm</span>
                </a>
              </li>
              <li>
                <a href="./luotmua.html">
                  <i class="bx bx-list-ul"></i>
                  <span class="links_name">Lượt mua</span>
                </a>
              </li>
        
              <li>
                <a href="./nguoidung.html" class="active">
                  <i class="bx bx-user"></i>
                  <span class="links_name">Người dùng</span>
                </a>
              </li>
              
              <li class="log_out">
              <a href="../client/logout.php">
                  <i class="bx bx-log-out"></i>
                  <span class="links_name">Log out</span>
                </a>
              </li>
            </ul>
          </div>

          <section class="home-section">
            <nav>
              <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Quản Lý Người Dùng</span>
              </div>
              <div class="search-box">
                <input type="text" placeholder="Search..." />
                <i class="bx bx-search"></i>
              </div>
              <div class="profile-details">
                <img src="https://i.pinimg.com/736x/ba/95/3c/ba953c1e9f85cfbc3a5ba7b2d648f424.jpg" alt="" />
                <span class="admin_name">Lunh</span>
                <i class="bx"></i>
              </div>
            </nav>

            <div class="home-content">
                <div class="sales-boxes">
                    <div class="form-container box">
                        <div class="edit-form">
                            
                            <form action="handleUser.php?action=edit" method="POST" enctype="multipart/form-data">
                            <?php
                              while ($row = mysqli_fetch_assoc($result)) {?>
                              <label for="user-id">ID</label>
                              <input type="number" id="user-id" name="user-id" value="<?= $row['user_id'] ?>" placeholder="id" readonly/><br />
              
                              <label for="username">Username:</label>
                              <input
                                type="text"
                                id="username"
                                name="username"
                                value="<?= $row['username'] ?>"
                              /><br />
              
                              <label for="product-image">Password:</label>
                              <input
                                type="password"
                                id="user-password"
                                name="user-password"
                                value="<?= $row['password'] ?>"
                                readonly
                              /><br />
              
                              <label for="product-price">email:</label>
                              <input
                                type="text"
                                id="user-mail"
                                name="user-mail"
                                value="<?= $row['email'] ?>"
                              /><br />
              
                              
                              <label for="user-tel">Số điện thoại:</label>
                              <input
                              type="text"
                              id="user-tel"
                              name="user-tel"
                              value="<?= $row['phone'] ?>"
                              /><br />
                              <label for="user-block">Khóa tài khoản:</label>
                              <input
                                type="checkbox"
                                id="user-block"
                                name="user-block"
                                <?php if ($isBlock == 1){
                                    echo "checked";
                                } ?>
                              /><br />
                              
                              <button type="submit" id="saveChanges">Lưu</button>
                            </form>
                          </div>
                          <?php } ?>
                    </div>
                </div>
            </div>
          </section>
        </div>
      </div>
    </div>

 
    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function () {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };

    //   Lấy tất cả các thẻ 'a' trong danh sách liên kết
      const links = document.querySelectorAll(".nav-links a");

      // Lặp qua tất cả các thẻ 'a' và thêm sự kiện click cho chúng
      links.forEach((link) => {
        link.addEventListener("click", (event) => {
          // Hủy bỏ hành động mặc định của thẻ 'a'
          event.preventDefault();
          // Loại bỏ lớp 'active' từ tất cả các thẻ 'a'
          links.forEach((link) => {
            link.classList.remove("active");
          });
          // Thêm lớp 'active' cho thẻ 'a' đang được chọn
          link.classList.add("active");
          window.location.href = this.href;
        });
      });
    </script>
  </body>
</html>
