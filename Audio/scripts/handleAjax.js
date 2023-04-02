document.getElementById("search-input").addEventListener("input", function() {
    // Lấy giá trị của input
    var searchValue = document.getElementById("search-input").value;
    
    // Gửi yêu cầu AJAX tới tập tin PHP để tìm kiếm sản phẩm
    if (searchValue !== "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // Hiển thị kết quả tìm kiếm trong div
            document.getElementById("print-search").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "./php/search.php?q=" + searchValue, true);
        xmlhttp.send();
    }else{
        searchResults.innerHTML = "";
    }
});
