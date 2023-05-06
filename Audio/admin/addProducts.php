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
      $sql = "";
      $length = $_GET['length'];

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
                <a href="./index.php">
                  <i class="bx bx-grid-alt"></i>
                  <span class="links_name">Thống kê</span>
                </a>
              </li>
              <li>
                <a href="./sanpham.php" class="active">
                  <i class="bx bx-box"></i>
                  <span class="links_name">Sản phẩm</span>
                </a>
              </li>
              <li>
                <a href="./luotmua.php">
                  <i class="bx bx-list-ul"></i>
                  <span class="links_name">Lượt mua</span>
                </a>
              </li>

              <li>
                <a href="./nguoidung.php">
                  <i class="bx bx-user"></i>
                  <span class="links_name">Người dùng</span>
                </a>
              </li>
              <li>
                <a href="truyvan.php">
                  <i class="bx bx-pie-chart-alt-2"></i>
                  <span class="links_name">Truy vấn</span>
                </a>
              </li>

              <li class="log_out">
                <a href="#">
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
                <img
                  src="https://i.pinimg.com/736x/ba/95/3c/ba953c1e9f85cfbc3a5ba7b2d648f424.jpg"
                  alt=""
                />
                <span class="admin_name">Lunh</span>
                <i class="bx"></i>
              </div>
            </nav>

            <div class="home-content">
              <div class="sales-boxes">
                <div class="form-container box">
                  <div class="edit-form">
                    <form action="handleProducts.php?action=add" method="POST"  enctype="multipart/form-data">
                      <label for="product-id">ID</label>
                      <input
                        type="number"
                        id="product-id"
                        value="<?= $length ?>"
                        placeholder="id"
                        name="product-id"
                        readonly
                      /><br />

                      <label for="product-name">Tên sản phẩm:</label>
                      <input
                        type="text"
                        id="product-name"
                        name="product-name"
                      /><br />

                      <label for="product-image">Hình ảnh:</label>
                      <input
                        type="file"
                        id="product-image"
                        name="fileToUpload"
                      /><br />

                      <label for="product-price">Đơn giá:</label>
                      <input
                        type="number"
                        id="product-price"
                        name="product-price"
                      /><br />

                      <label for="product-quantity">Description:</label>
                      <input
                        type="text"
                        id="product-description"
                        name="product-description"
                      /><br />

                      <label for="product-type">Chủng Loại:</label>
                      <select type="text" id="product-type" name="product-type">
                        <option value="earbud">Earbud</option>
                        <option value="inear">Inear</option>
                        <option value="full-sized">Fullsized</option>
                        <option value="true-wireless">True Wireless</option>
                      </select>
                      <br />

                      <label for="product-brand">Thương Hiệu:</label>
                      <select type="text" id="product-brand" name="product-brand">
                        <option value="Apple">Apple</option>
                        <option value="Focal">Focal</option>
                        <option value="HiFiMan">HiFiMan</option>
                        <option value="SONY">SONY</option>
                        <option value="MOONDROP">MOONDROP</option>
                      </select>
                      <br />

                      <button type="submit" id="saveChanges">
                        Thêm sản phẩm
                      </button>
                    </form>
                  </div>
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
