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
    $sql = "SELECT * FROM products WHERE name LIKE '%" . $searchValue . "%'";
    $result = $conn->query($sql);
    
    // Hiển thị kết quả tìm kiếm
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo '<div class="new-items">';
        echo '<div>';
        echo '<div class="new-items-img">';
        echo  sprintf('<img src="%s" style="height: 210px; width: 210px;" />', $row['image']);
        echo '</div>';
        echo '<div class="new-items-data">';
        echo '<a class="new-items-data--title" href=""><p>'. $row['name'] . '</p></a>';
        echo sprintf('<div class="newprice">%sđ</div>', number_format($row['price'], 0, '', ','));
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