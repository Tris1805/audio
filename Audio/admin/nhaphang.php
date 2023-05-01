<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link rel="stylesheet" href="../assets/css/admin_style.css" />
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,300,0,0" />
</head>

<body>
  <?php 
    // $tolal_products = mysqli_query($conn, "select * from products");
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
              <a href="./index.html">
                <i class="bx bx-grid-alt"></i>
                <span class="links_name">Thống kê</span>
              </a>
            </li>
            <li>
              <a href="./sanpham.html" class="active">
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
              <a href="./nguoidung.html">
                <i class="bx bx-user"></i>
                <span class="links_name">Người dùng</span>
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
              <img src="https://i.pinimg.com/736x/ba/95/3c/ba953c1e9f85cfbc3a5ba7b2d648f424.jpg" alt="" />
              <span class="admin_name">Lunh</span>
              <i class="bx"></i>
            </div>
          </nav>

          <div class="home-content">
            <div class="sales-boxes">
              <div class="form-container box">
                <div class="edit-form">
                  <form action="handleProducts.php?action=addQuantity" method="POST" enctype="multipart/form-data" id="product-form">
                    <label for="product-id">ID</label>
                    <input type="number" id="product-id" value="id" placeholder="id" name="product-id" /><br />

                    <label for="product-quantity">Số lượng:</label>
                    <input type="number" id="product-quantity" name="product-quantity" /><br />


                    <button type="submit" id="saveChanges">
                      Nhập Hàng
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

    // document.getElementById("product-form").addEventListener("submit", function (event) {
    //   event.preventDefault(); // ngăn chặn hành động mặc định của form

    //   var quantityInput = document.getElementById("product-quantity");
    //   var quantityValue = quantityInput.value;

    //   if (quantityValue < 0) {
    //     alert("Số lượng không thể là số âm.");
    //     return;
    //   }
    //   document.getElementById("product-form").sunmit();
    //   // tiếp tục xử lý thêm sản phẩm vào giỏ hàng
    // });


  </script>
</body>

</html>