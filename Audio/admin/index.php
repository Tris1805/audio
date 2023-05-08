<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
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
    <div id="app">
      
      <div class="main-container">
        <div class="main-content">
          <div class="sidebar">
            <a href="../client/trangchu.php">
            <div class="logo-details">
              <i class="bx"></i>
              <span class="logo_name">Ikus Audio</span>
            </div>
            </a>
            <ul class="nav-links">
              <li>
                <a href="index.php" class="active">
                  <i class="bx bx-grid-alt"></i>
                  <span class="links_name">Thống kê</span>
                </a>
              </li>
              <li>
                <a href="sanpham.php">
                  <i class="bx bx-box"></i>
                  <span class="links_name">Sản phẩm</span>
                </a>
              </li>
              <li>
                <a href="luotmua.php">
                  <i class="bx bx-list-ul"></i>
                  <span class="links_name">Lượt mua</span>
                </a>
              </li>
              <li>
                <a href="nguoidung.php">
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
                <span class="dashboard">Thống Kê</span>
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
              <div class="overview-boxes">
                <div class="box">
                  <div class="right-side">
                    <div class="box-topic">Tổng Đơn</div>
                    <div class="number">40,876</div>
                    <div class="indicator">
                      <i class="bx bx-up-arrow-alt"></i>
                      <span class="text">Tăng so cùng kỳ</span>
                    </div>
                  </div>
                  <i class="bx bx-cart-alt cart"></i>
                </div>
                <div class="box">
                  <div class="right-side">
                    <div class="box-topic">Tổng Bán</div>
                    <div class="number">38,876</div>
                    <div class="indicator">
                      <i class="bx bx-up-arrow-alt"></i>
                      <span class="text">Tăng so cùng kỳ</span>
                    </div>
                  </div>
                  <i class="bx bxs-cart-add cart two"></i>
                </div>
                <div class="box">
                  <div class="right-side">
                    <div class="box-topic">Tổng Lợi Nhuận</div>
                    <div class="number">12T VNĐ</div>
                    <div class="indicator">
                      <i class="bx bx-up-arrow-alt"></i>
                      <span class="text">Tăng so cùng kỳ</span>
                    </div>
                  </div>
                  <i class="bx bx-cart cart three"></i>
                </div>
                <div class="box">
                  <div class="right-side">
                    <div class="box-topic">Tổng Hoàn</div>
                    <div class="number">11,086</div>
                    <div class="indicator">
                      <i class="bx bx-down-arrow-alt down"></i>
                      <span class="text">Giảm so cùng kỳ</span>
                    </div>
                  </div>
                  <i class="bx bxs-cart-download cart four"></i>
                </div>
              </div>

              <div class="sales-boxes">
                <div class="recent-sales box">
                  <div class="title">Đơn hàng gần đây</div>
                  <div class="sales-details">
                    <ul class="details">
                      <li class="topic">Thời gian</li>
                      <li><a href="#">10/04/2023</a></li>
                      <li><a href="#">10/04/2023</a></li>
                      <li><a href="#">10/04/2023</a></li>
                      <li><a href="#">10/04/2023</a></li>
                      <li><a href="#">10/04/2023</a></li>
                      <li><a href="#">10/04/2023</a></li>
                      <li><a href="#">10/04/2023</a></li>
                      <li><a href="#">10/04/2023</a></li>
                      <li><a href="#">10/04/2023</a></li>
                    </ul>
                    <ul class="details">
                      <li class="topic">Người mua</li>
                      <li><a href="#">Ciêm</a></li>
                      <li><a href="#">Ciêm</a></li>
                      <li><a href="#">Ciêm</a></li>
                      <li><a href="#">Ciêm</a></li>
                      <li><a href="#">Ciêm</a></li>
                      <li><a href="#">Ciêm</a></li>
                      <li><a href="#">Ciêm</a></li>
                      <li><a href="#">Ciêm</a></li>
                      <li><a href="#">Ciêm</a></li>
                    </ul>
                    <ul class="details">
                      <li class="topic">Trạng thái</li>
                      <li><a href="#">Đã giao</a></li>
                      <li><a href="#">Đang giao</a></li>
                      <li><a href="#">Hoàn hàng</a></li>
                      <li><a href="#">Đã giao</a></li>
                      <li><a href="#">Đang giao</a></li>
                      <li><a href="#">Hoàn hàng</a></li>
                      <li><a href="#">Đã giao</a></li>
                      <li><a href="#">Đã giao</a></li>
                      <li><a href="#">Hoàn hàng</a></li>
                    </ul>
                    <ul class="details">
                      <li class="topic">Tổng đơn</li>
                      <li><a href="#">1.000.000.000đ</a></li>
                      <li><a href="#">1.000.000.000đ</a></li>
                      <li><a href="#">1.000.000.000đ</a></li>
                      <li><a href="#">1.000.000.000đ</a></li>
                      <li><a href="#">1.000.000.000đ</a></li>
                      <li><a href="#">1.000.000.000đ</a></li>
                      <li><a href="#">1.000.000.000đ</a></li>
                      <li><a href="#">1.000.000.000đ</a></li>
                      <li><a href="#">1.000.000.000đ</a></li>
                    </ul>
                  </div>
                  <div class="button">
                    <a href="#luotmua.php">Xem tất cả</a>
                  </div>
                </div>
                <div class="top-sales box">
                  <div class="title">Top bán chạy</div>
                  <ul class="top-sales-details">
                    <li>
                      <a href="#">
                        <img
                          src="../assets/images/products/focal_celestee.jpg"
                          alt=""
                        />
                        <span class="product">Focal Celestee</span>
                      </a>
                      <span class="price">23.000.000đ</span>
                    </li>
                    <li>
                      <a href="#">
                        <img
                          src="../assets/images/products/focal_celestee.jpg"
                          alt=""
                        />
                        <span class="product">Focal Celestee</span>
                      </a>
                      <span class="price">23.000.000đ</span>
                    </li>
                    <li>
                      <a href="#">
                        <img
                          src="../assets/images/products/focal_celestee.jpg"
                          alt=""
                        />
                        <span class="product">Focal Celestee</span>
                      </a>
                      <span class="price">23.000.000đ</span>
                    </li>
                    <li>
                      <a href="#">
                        <img
                          src="../assets/images/products/focal_celestee.jpg"
                          alt=""
                        />
                        <span class="product">Focal Celestee</span>
                      </a>
                      <span class="price">23.000.000đ</span>
                    </li>
                    <li>
                      <a href="#">
                        <img
                          src="../assets/images/products/focal_celestee.jpg"
                          alt=""
                        />
                        <span class="product">Focal Celestee</span>
                      </a>
                      <span class="price">23.000.000đ</span>
                    </li>
                    <li>
                      <a href="#">
                        <img src="../assets/images/products/focal_celestee.jpg" alt="" />
                        <span class="product">Focal Celestee</span>
                      </a>
                      <span class="price">23.000.000đ</span>
                    </li>
                  </ul>
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

      // Lấy tất cả các thẻ 'a' trong danh sách liên kết
      const links = document.querySelectorAll(".nav-links a");

      // Lặp qua tất cả các thẻ 'a' và thêm sự kiện click cho chúng
      links.forEach((link) => {
        link.addEventListener("click", (event) => {
          // Hủy bỏ hành động mặc định của thẻ 'a'
          // event.preventDefault();
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
