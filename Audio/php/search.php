<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "audiodb";
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername , $username, $password, $dbname);
    
    // Lấy giá trị tìm kiếm từ yêu cầu AJAX
    $searchValue = $_GET["q"];
    
    // Tìm kiếm sản phẩm trong cơ sở dữ liệu
    $item_per_page = 8;
    $cur_page = !empty($_POST['page']) ? $_POST['page'] : 1;
    $offset = ($cur_page - 1) * $item_per_page;
    $sql = "SELECT * FROM products WHERE name LIKE '%" . $searchValue . "%'";
    $result = $conn->query($sql);
    $tolal_products = $result;
    $tolal_products = $tolal_products->num_rows;
    $totalPages = ceil($tolal_products / $item_per_page);
    // Hiển thị kết quả tìm kiếm
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo '<div class="new-items">';
        echo '<div @click="onProductClick(product)">';
        echo '<div class="new-items-img">';
        echo  sprintf('<img src="%s" style="height: 210px; width: 210px;" />', $row['image']);
        echo '</div>';
        echo '<div class="new-items-data">';
        echo '<a class="new-items-data--title" href=""><p>'. $row['name'] . '</p></a>';
        echo sprintf('<div class="newprice">%s</div>', number_format($row['price'], 0, '', ','));
        echo "</div>";
        echo "</div>";
        echo "</div>";                  
      }
        
    } else {
        
      echo "<div>No results found</div>";
    }
    
    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
?>