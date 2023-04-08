<?php 
    include '../components/connectDB.php';
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername , $username, $password, $dbname);
    
    // Lấy giá trị tìm kiếm từ yêu cầu AJAX
    $searchKeyword = $_POST['searchKeyword'];
    
    // Tìm kiếm sản phẩm trong cơ sở dữ liệu
    $sql = "SELECT * FROM products WHERE name LIKE '%" . $searchKeyword . "%'";
    $result = $conn->query($sql);
    $searchResults="";
    // Hiển thị kết quả tìm kiếm
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $searchResults .= '<div class="new-items">';
        $searchResults .= '<div>';
        $searchResults .= '<div class="new-items-img">';
        $searchResults .=  sprintf('<img src="../%s" style="height: 210px; width: 210px;" />', $row['image']);
        $searchResults .= '</div>';
        $searchResults .= '<div class="new-items-data">';
        $searchResults .= '<a class="new-items-data--title" href=""><p>'. $row['name'] . '</p></a>';
        $searchResults .= sprintf('<div class="newprice">%sđ</div>', number_format($row['price'], 0, '', ','));
        $searchResults .= "</div>";
        $searchResults .= "</div>";
        $searchResults .= "</div>";                  
      }
        
    } else {
        
      echo "<div>No results found</div>";
    }
    echo $searchResults;
    // Đóng kết nối đến cơ sở dữ liệu
    $conn->close();
?>