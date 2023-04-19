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
  <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
  <style>
    .pagination {
      display: flex;
      list-style-type: none;
      justify-content: center;
    }

    .pagination li a {
      color: black;
      padding: 12px 19px;
      text-decoration: none;
      margin: 5px;
    }

    .pagination li a.active {
      background-color: black;
      color: white;
      /*Circle Design with CSS*/
      border-radius: 50%;
    }

    /* add background color when user hovers on inactive class */
    .pagination li:hover:not(.active) a {
      background-color: #ddd;
      border-radius: 50%;
    }

    /* disabled item */
    .pagination li.disabled {
      color: gray;
      border-radius: 50%;
    }
  </style>
</head>

<body>
  <?php
  include '../components/connectDB.php';
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
            <!-- <li>
                <a href="#">
                  <i class="bx bx-pie-chart-alt-2"></i>
                  <span class="links_name">Analytics</span>
                </a>
              </li>
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
              <a href="./nguoidung.html">
                <i class="bx bx-user"></i>
                <span class="links_name">Người dùng</span>
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
              <span class="dashboard">Quản Lý Sản Phẩm</span>
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
                    <div class="title">Tình trạng kho hàng</div>
                    <div class="stock-details-title">
                      <div class="stock-details-title-items id-title">ID</div>
                      <div class="stock-details-title-items image-title">
                        Hình ảnh
                      </div>
                      <div class="stock-details-title-items name-title">
                        Tên sản phẩm
                      </div>
                      <div class="stock-details-title-items price-title">
                        Đơn giá
                      </div>
                      <div class="stock-details-title-items stock-title">
                        Số lượng
                      </div>
                    </div>
                  </div>
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                    $sql = "SELECT * FROM inventory WHERE product_id = '".$row['id']."' ORDER BY updated_at DESC LIMIT 1";
                    $result2 = mysqli_query($conn, $sql);
                    $row2 = mysqli_fetch_assoc($result2);
                    echo '<div class="recent-stock-item">';
                    echo ' <div class="80%" style="width: 80%;">';
                    echo '<div class="sales-details stock-details">';
                    echo '<ul class="details id-item">';
                    echo '<li><a href="#">' . $row['id'] . '</a></li>';
                    echo '</ul>';
                    echo '<ul class="details image-item">';
                    echo sprintf('<li>
                      <img
                        src="%s"
                        alt=""
                        class="stock--img"
                      />
                    </li>', $row['image']);
                    echo '</ul>';
                    echo '<ul class="details name-item">';
                    echo '<li>' . $row['name'] . '</li>';
                    echo '</ul>';
                    echo '<ul class="details price-item">';
                    echo sprintf('<li>%s</li>', number_format($row['price'], 0, '', ','));
                    echo "</ul>";
                    echo '<ul class="details stock-item">';
                    echo '<li>'.$row2['quantity'].'</li>';
                    echo "</ul>";
                    echo "</div>";
                    echo "</div>";
                    echo '<div class="15%" style="width: 15%;">
                                <ul class="modify-item">
                                  <li>
                                  <a href="manage_products.php?id=' . $row['id'] . '" ><button class="edit-btn">Edit</button></a>      
                                  <a href="edit.php" ><button class="delete-btn">Delete</button></a>      
                                  </li>
                                  
                                </ul>
                              </div>';

                    echo "</div>";
                  }

                  ?>
                  <div id="pagination">
                    <ul class="pagination">
                      <?php

                      for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i != $cur_page) {
                          ?>
                          <li class=""><a href="#product-list" data-page="<?= $i ?>"> <?= $i ?></a></li>
                        <?php } else { ?>
                          <li class=""><a href="#product-list" data-page="<?= $i ?>" class="active"> <?= $i ?></a></li>

                        <?php } ?>
                      <?php }
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

        </section>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function () {
      // Bắt sự kiện khi người dùng chọn trang
      $('body').on('click', '.pagination li a', function (e) {
        e.preventDefault();
        var page = $(this).attr('data-page');
        loadData(page);
      });

      // Hàm tải nội dung mới
      function loadData(page) {
        $.ajax({
          url: 'sanpham.php',
          type: 'POST',
          data: { page: page },
          success: function (response) {
            $('#app').html(response);
          }
        });
      }
    });






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
  <script>


  </script>
</body>

</html>