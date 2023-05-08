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
  <link rel="stylesheet" href="../assets/css/calendar.css" />
</head>

<body>
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
              <a href="index.php">
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
            <!--
              <li>
                <a href="#">
                  <i class="bx bx-coin-stack"></i>
                  <span class="links_name">Stock</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="bx bx-book-alt"></i>
                  <span class="links_name">Total order</span>
                </a>
              </li> -->
            <li>
              <a href="nguoidung.php" class="">
                <i class="bx bx-user"></i>
                <span class="links_name">Người dùng</span>
              </a>
            </li>

            <li>
              <a href="#" class="active">
                <i class="bx bx-pie-chart-alt-2"></i>
                <span class="links_name">Truy vấn</span>
              </a>
            </li>
            <!-- <li>
                <a href="#">
                  <i class="bx bx-message"></i>
                  <span class="links_name">Messages</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="bx bx-heart"></i>
                  <span class="links_name">Favrorites</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="bx bx-cog"></i>
                  <span class="links_name">Setting</span>
                </a>
              </li> -->
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
                  <form action="handleTruyVan.php?action=check" method="POST" enctype="multipart/form-data">
                    <label for="product-id">Nhập ID cần kiểm tra</label>
                    <input type="number" id="product-id" value="id" placeholder="id" name="product-id" /><br />

                    <button type="submit" id="saveChanges">Kiểm Tra</button>
                  </form>
                </div>
              </div>

            </div>

            <div class="table_container">
              <div class="bill-review">
                <h2 title style="padding-bottom:5% ;">CHI TIẾT THAY ĐỔI</h2>
                <br />
                <div class="bill-body">

                  <div class="line2"></div>
                  <ul class="cart-table">
                    <li>
                      <div style="display: flex; justify-content: left;">IDs</div>
                      <div style="margin-left: 10%; width: 20%;">Ngày Thay Đổi
                      </div>
                      
                      <div style="margin-left: 20%;">Số Lượng</div>
                      <div style="margin-left: 30%;">Loại</div>
                    </li>
                  </ul>

                  <ul class="cart-table">
                    <li style="margin-top: 5px; margin-bottom: 5px; width:100%">
                      <div style="display: flex; justify-content: left;">
                        
                      </div>
                      <div style="margin-left: 11.5%; width: 25%;">
                       
                      </div>
                      <div style="margin-left: 20%; width: 20%">
                        
                      </div>
                      <div style="width: 20%; text-align: right ">
                        
                      <div>
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
    const editButton = document.querySelector(".edit-btn");
    const editForm = document.querySelector(".edit-form");
    const cancelEditBtn = document.querySelector(".cancel-edit-form");
    const cancelDeleteBtn = document.querySelector(".cancel-delete-form");
    const content = document.querySelector(".sales-boxes");
    const deleleButton = document.querySelector(".delete-btn");
    const deleteForm = document.querySelector(".delete-form");
    editButton.addEventListener("click", function () {
      editForm.style.display = "block";
      content.classList.add("make-blur");
    });
    deleleButton.addEventListener("click", function () {
      deleteForm.style.display = "block";
      content.classList.add("make-blur");
    });
    // Thêm sự kiện "submit" vào form để lưu thông tin sản phẩm
    editForm.addEventListener("submit", function (event) {
      // Xử lý lưu thông tin sản phẩm
      event.preventDefault(); // Ngăn chặn gửi form đi
    });
    // Thêm sự kiện "submit" vào form để xoa thông tin sản phẩm
    deleteForm.addEventListener("submit", function (event) {
      // Xử lý lưu thông tin sản phẩm
      event.preventDefault(); // Ngăn chặn gửi form đi
    });
    // Thêm sự kiện "click" vào nút "Lưu" để lưu thông tin sản phẩm
    const saveEditButton = editForm.querySelector('button[type="submit"]');
    saveEditButton.addEventListener("click", function () {
      // Xử lý lưu thông tin sản phẩm
      editForm.style.display = "none"; // Ẩn form edit sản phẩm
      content.classList.remove("make-blur");
    });
    const saveDeleteButton = deleteForm.querySelector(
      'button[type="submit"]'
    );
    saveDeleteButton.addEventListener("click", function () {
      // Xử lý lưu thông tin sản phẩm
      deleteForm.style.display = "none";
      content.classList.remove("make-blur");
    });
    // Bắt sự kiện khi người dùng ấn nút X
    cancelEditBtn.addEventListener("click", () => {
      editForm.style.display = "none";
      content.classList.remove("make-blur");
    });
    cancelDeleteBtn.addEventListener("click", () => {
      deleteForm.style.display = "none";
      content.classList.remove("make-blur");
    });
  </script>
</body>

</html>