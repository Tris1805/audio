<?php
    include '../components/connectDB.php';
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
      // $sql = "SELECT count(id) as total FROM products";
      $item_per_page = 8;
      $cur_page = !empty($_POST['page']) ? $_POST['page'] : 1;
      $offset = ($cur_page - 1) * $item_per_page;
      $sql = "SELECT * FROM `products`  LIMIT $offset, $item_per_page";
      $result = mysqli_query($conn, $sql);
      $tolal_products = mysqli_query($conn, "select * from products");
      $tolal_products = $tolal_products->num_rows;
      $totalPages = ceil($tolal_products / $item_per_page);
    while ($row = mysqli_fetch_assoc($result)) {

        echo '<div class="new-items">';
        echo '<div>';
        echo '<div class="new-items-img">';
        echo sprintf('<a href="chitietsanpham.php?id=%s"><img src="../%s" style="height: 210px; width: 210px;" alt=""/></a>', $row['id'], $row['image']);
        echo '</div>';
        echo '<div class="new-items-data">';
        echo '<a class="new-items-data--title" href="#"><p>' . $row['name'] . '</p></a>';
        echo sprintf('<div class="newprice">%sđ</div>', number_format($row['price'], 0, '', ','));
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
?>
