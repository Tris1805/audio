<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ikus Audio</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <!-- <script src="lib/vue.global.prod.js"></script> -->
</head>

<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "audiodb";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // $sql = "SELECT count(id) as total FROM products";
  $sql = "SELECT * FROM products";
  $result = mysqli_query($conn, $sql);
  ?>
  <div id="app">
    <app-header></app-header>
    <div class="main-container">
      <div class="main-promo">
        <img src="assets/images/banners/productBanner2.jpg" style="margin-top: 100px" />
      </div>
      <div class="main-content">
        <div class="main-tag" :class="{ 'main-tag-active': selectedType === productType.FULL_SIZED }"
          @click="onTypeChange(productType.FULL_SIZED)">FULL SIZED</div>
        <div class="main-tag" :class="{ 'main-tag-active': selectedType === productType.IN_EAR }"
          @click="onTypeChange(productType.IN_EAR)">IN EAR</div>
        <div class="main-tag" :class="{ 'main-tag-active': selectedType === productType.EAR_BUD }"
          @click="onTypeChange(productType.EAR_BUD)">EARBUD</div>
        <div class="main-tag" :class="{ 'main-tag-active': selectedType === productType.TRUE_WIRELESS }"
          @click="onTypeChange(productType.TRUE_WIRELESS)">TRUE WIRELESS</div>
      </div>
      <div class="main-content">
        <div class="new-product">
          <div class="search-bar">
            <input id="search-input" type="search" name="s" placeholder="Gõ để tìm kiếm" maxlength="40" style="
                  border: 1px solid rgb(116, 116, 116);
                  border-radius: 38px;
                  border-image: initial;
                  background: none;
                  width: 500px;
                  height: 60px;
                  padding: 30px;
                " v-model="searchKey" />
            <div class="search-icon">
              <img class="search-icon-img" src="assets/images/icons/search-icon.png" />
            </div>
          </div>

          <div class="sort-container">
            <div class="sort-option">SẮP XẾP THEO:</div>
            <div class="sort-form">
              <select name="product-status" id="product-status" @change="onSortChange($event)">
                <option :value="productSort.NEWEST">Mới nhất</option>
                <option :value="productSort.OLDEST">Cũ Nhất</option>
                <option :value="productSort.PRICE_HIGH">Từ thấp tới cao</option>
                <option :value="productSort.PRICE_LOW">Từ cao tới thấp</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="main-content">
        <div class="new-product">
          <div class="left-menu">
            <div class="brand-filter">
              <div class="brand-filter-title">THƯƠNG HIỆU</div>
              <div class="brand-container">
                <label class="container">
                  <input type="checkbox" id="Apple" :value="productBrand.APPLE" v-model="checkedBrands" />
                  <span class="checkmark"></span> APPLE
                </label>
                <label class="container">
                  <input type="checkbox" id="" :value="productBrand.FOCAL" v-model="checkedBrands"
                    :defaultValue="checked" />
                  <span class="checkmark"></span> Focal
                </label>
                <label class="container">
                  <input type="checkbox" id="HIFIMAN" :value="productBrand.HIFIMAN" v-model="checkedBrands" />
                  <span class="checkmark"></span> HiFiMan
                </label>
                <label class="container">
                  <input type="checkbox" id="MOONDROP" :value="productBrand.MOONDROP" v-model="checkedBrands" />
                  <span class="checkmark"></span> MOONDROP
                </label>
                <label class="container">
                  <input type="checkbox" id="SONY" :value="productBrand.SONY" v-model="checkedBrands" />
                  <span class="checkmark"></span> SONY
                </label>
              </div>
            </div>
            <div class="brand-filter price-filter">
              <div class="brand-filter-title">KHOẢNG GIÁ</div>
              <div class="price-container">
                Chọn khoảng giá mong muốn.
                <input type="number" name="" id="price-input" v-model="minPrice" />
                <span>-</span>
                <input type="number" name="" id="price-input" v-model="maxPrice" />
              </div>
            </div>
          </div>
          <div class="product-list">
            <div class="item-container">
              
                <?php
                  while ($row = mysqli_fetch_assoc($result)) {
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
                ?>

                <!-- <div @click="onProductClick(product)">
                  <div class="new-items-img">
                    <img :src="product.image" style="height: 210px; width: 210px;" />
                  </div>
                  <div class="new-items-data">
                    <a class="new-items-data--title" href="">
                      <p>{{ product.name }}</p>
                    </a>
                    <div class="newprice">{{ formatPrice(product.price) }} đ</div>
                  </div>
                </div> -->
                <!-- <ul class="pagination">
                <li :class="{ disabled: !canPreviousPage }" @click="onPreviousPage()">«</li>
                <li v-for="page in pages" @click="onPageChange(page)" :class="{ active: page === currentPage }">{{ page }}
                </li>
                <li :class="{ disabled: !canNextPage }" @click="onNextPage()">»</li> -->

              
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <app-footer></app-footer>
  </div>
</body>
<script src="utils/data.js"></script>
<script src="utils/commons.js"></script>
<script src="scripts/components.js"></script>
<script src="scripts/trangchu.js"></script>

</html>