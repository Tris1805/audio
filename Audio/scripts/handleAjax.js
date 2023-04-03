document.getElementById("search-input").addEventListener("input", function() {
    // Lấy giá trị của input
    var searchValue = document.getElementById("search-input").value;
    const searchResults = document.getElementById("print-search");
    // Gửi yêu cầu AJAX tới tập tin PHP để tìm kiếm sản phẩm
    if (searchValue !== "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // Hiển thị kết quả tìm kiếm trong div
            searchResults.innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "./php/search.php?q=" + searchValue, true);
        xmlhttp.send();
    }else{
        // searchResults.innerHTML = "";
    }
});

// Hàm để gửi yêu cầu đến tệp PHP xử lý dữ liệu
function getProducts(productType) {
  // Tạo đối tượng XMLHttpRequest để gửi yêu cầu đến tệp PHP
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    // Kiểm tra trạng thái của yêu cầu
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("print-search").innerHTML = this.responseText;
      
    }
  };
  // Gửi yêu cầu đến tệp PHP để lấy sản phẩm theo loại
  xhttp.open("POST", "./php/renderByType.php?productType=", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("productType=" + productType);
}

