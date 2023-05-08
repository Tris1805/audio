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
  include "../components/connectDB.php";
  $sql = "SELECT * FROM `users`";
  $result = mysqli_query($conn, $sql);
  ?>
  <div id="app">
    <!-- <?php include "../components/header.php"; ?> -->
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
            <li>
              <a href="nguoidung.php" class="active">
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
              <img src="https://i.pinimg.com/736x/ba/95/3c/ba953c1e9f85cfbc3a5ba7b2d648f424.jpg" alt="" />
              <span class="admin_name">Lunh</span>
              <i class="bx"></i>
            </div>
          </nav>

          <div class="home-content">
            <div class="sales-boxes">
              <div class="recent-stock box">
                <div class="recent-stock-title">
                <div class="80%" style="width: 80%;">
                  <div class="title">Thông tin người dùng</div>
                  <div class="user-details-title">
                    <div class="user-details-title-items id-title" >ID</div>
                    <div
                      class="user-details-title-items username-title" 
                    >
                      Username
                    </div>
                    <div
                      class="user-details-title-items mail-title"
                    >
                      Email
                    </div>
                    <div
                      class="user-details-title-items status-title" 
                    >
                      Trạng Thái
                    </div>
                    <div class="user-details-title-items tel-title" >Sđt</div>
                  
                  </div>
                </div>

                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                    if  ($row['user_id'] == 1) continue;
                    ?>
                    <div class="recent-stock-item">
                      <div class="80%" style="width: 80%">
                    <div class="sales-details stock-details">
                      <ul class="details id-item">
                        <li><a href="#">
                            <?php echo $row['user_id']; ?>
                          </a></li>

                      </ul>
                      <ul class="details username-item">
                        <li>
                          <?php echo $row['username']; ?>
                        </li>


                      </ul>
                      <ul class="details mail-item">
                        <li>
                          <?php echo $row['email']; ?>
                        </li>


                      </ul>
                      <ul class="details status-item">
                        <?php 
                          if($row['isBlock'] == 1 ){?> 
                          <li style="color: red;">Đã bị khóa</li>
                        <?php }else{?> 
                        
                          <li style="color: green;">Đang hoạt động</li>
                        <?php }?>
                        
                      </ul>
                      <ul class="details tel-item">
                        <li>
                          <?php echo $row['phone']; ?>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="15%" style="width: 15%; margin-top: -1.4%;">
                    <ul class="modify-user">
                      <li>
                        <?php 
                          if($row['isBlock'] == 1){?>
                            <a href="manage_users.php?id=<?= $row['user_id']; ?>&isBlock=1"><button class="edit-btn">Edit</button></a>
                        <?php } else {?>  
                            <a href="manage_users.php?id=<?= $row['user_id']; ?>"><button class="edit-btn">Edit</button></a>
                        <?php }
                        ?>
                        <a href=""><button class="delete-btn">Delete</button></a>
                      </li>
                    </ul>
                  </div>
                  </div>
                  
                  <?php
                  }
                  ?>
              </div>
                </div>
            </div>
          </div>

        </section>
      </div>
    </div>
  </div>

 
  <script>
    let sidebar1 = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function () {
      sidebar1.classList.toggle("active");
      if (sidebar1.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };

    // Lấy tất cả các thẻ 'a' trong danh sách liên kết
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