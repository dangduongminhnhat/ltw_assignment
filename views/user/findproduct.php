<div class="container-fluid" style="margin-bottom: 20px; margin-top: 30px; min-height: 350px">
    <h2>Tìm kiếm sản phẩm</h2>
    <form id="search-form" class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="searchproduct" class="visually-hidden">Nhập tên sản phẩm</label>
            <input type="text" class="form-control" id="searchproduct" name="searchproduct" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>
    <div id="products" style="margin-top: 20px"></div>
</div>
<script>
var form = document.getElementById("search-form");
var products = document.getElementById("products");
form.addEventListener("submit", function(event) {
    event.preventDefault();
    searchProducts();
});
document.getElementById("searchproduct").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        searchProducts();
    }
});
function searchProducts() {
    var formData = new FormData(form);
    fetch("../controller/user/search.php", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json();
    })
    .then(data => {
        products.innerHTML = data;
    })
    .catch(error => {
        console.log(error);
        alert("Không tìm thấy món");
    });
}
</script>