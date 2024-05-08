<?php
require_once 'core/Database.php';
$conn = Database::connect();
$sql = "SELECT * FROM sellers WHERE idAccount = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$seller = $result->fetch_assoc();
?>
<div class="tocotoco_body" style="min-height: 300px">
    <div class="linkStyle">
        <a class="link-underline-light linkStyleColor" href="">Danh mục sản phẩm</a> 
    </div>
    <div class="address">
        <h2><?php echo $seller["nameStore"]; ?></h2>
        <div class="add_detail">
            <div class="open_or_not" style="display: inline-block; margin:5px">
                <span class="iconify" data-icon="solar:shop-bold"></span>
                <p style="display: inline; ">
                <?php
                if ($seller["isClose"]) {
                    echo "Đã đóng cửa";
                } else {
                    echo "Đang mở cửa";
                }
                ?>
                </p>
            </div>
            <div class="star_time_dis">
                <div style="display: inline-block">
                    <span class="iconify" data-icon="mdi:address-marker" style="margin-right: 3px;"></span>
                    <p style="display: inline;"><?php echo $seller["address"]; ?></p>
                </div>
            </div>
            <div class="comment" style="margin:5px;">
                <span class="iconify" data-icon="material-symbols-light:comment"></span>
                <a href="/BTL/user/review">Đánh giá nhận xét</a>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="menu_tocotoco">
            <div style="width:fit-content">
                <?php
                for ($i = 1; $i <= count($categories); $i ++) {
                    if (count($pro_in_cat[$i]) > 0) {
                        echo '<a href="#section' . $i . '">' . $categories[$i][0] . '</a>';
                    }   
                }
                ?>
            </div>
        </div>
        <div style="width: 80%;" class="all_product">
            <?php
            for ($cat = 1; $cat <= count($pro_in_cat); $cat ++) {
                if (count($pro_in_cat[$cat]) > 0) {
                    echo '<div class="products_w_title" style="margin-bottom: 30px;">';
                    echo '  <h2 id="section' . $cat . '" style="margin-top: 0px; margin-bottom:15px">' . $categories[$cat][0] . '</h2>';
                    echo '  <div style="width: 100%">';
                    echo '      <div id="multi-' . $cat . '" class="carousel slide" data-bs-ride="carousel">';
                    echo '          <div class="carousel-inner">';
                    $size = count($pro_in_cat[$cat]);
                    for ($i = 0; $i < $size; $i = $i + 2) {
                        if ($i == 0) {
                            echo '<div class="carousel-item active">';
                        } else {
                            echo '<div class="carousel-item">';
                        }
                        echo '<div class="products">';
                        for ($j = $i; $j < $i + 2 && $j < $size; $j ++) {
                            echo '<div class="product">';
                            $newPath = str_replace("../../public/", "/BTL/public/", $pro_in_cat[$cat][$j]["image"]);
                            echo '  <img class="img-product" src="' . $newPath . '" alt="product1">';
                            echo '  <div class="pro_info">';
                            echo '      <div style="display: flex; justify-content:space-between; width: 100%; align-items: center; height: 50px;">';
                            echo '          <b style="color: black;">' . $pro_in_cat[$cat][$j]["name"] . '</b>';
                            echo '      </div>';
                            echo '      <div class="description" style="color: rgba(0, 0, 0, 0.5); margin-bottom: 10px">';
                            echo $pro_in_cat[$cat][$j]["description"];
                            echo '      </div>';
                            echo '      <div style="color: black; font-size: 20px">' . $pro_in_cat[$cat][$j]["price"] . '</div>';
                            if ($isLogin) {
                                echo '      <button id="icon-button" class="form-add" onclick="showForm(' . $pro_in_cat[$cat][$j]["id"] . ')">';
                                echo '          <span class="iconify" data-icon="basil:add-solid" style="font-size: 30px;"></span>';
                                echo '      </button>';
                            }
                            echo '  </div>';
                            echo '</div>';
                            }
                                        echo '</div>';
                        echo '</div>';
                    }
                    echo '          </div>';
                    if (count($pro_in_cat[$cat]) > 2) {
                        echo '          <button class="carousel-control-prev" type="button" data-bs-target="#multi-' . $cat . '" data-bs-slide="prev">';
                        echo '              <span class="carousel-control-prev-icon" id="prev_but" style="background-color:#FFC700;" aria-hidden="true"></span>';
                        echo '              <span class="visually-hidden">Previous</span>';
                        echo '          </button>';
                        echo '          <button class="carousel-control-next" type="button" data-bs-target="#multi-' . $cat . '" data-bs-slide="next">';
                        echo '              <span class="carousel-control-next-icon" id="next_but" style="background-color:#FFC700;" aria-hidden="true"></span>';
                        echo '              <span class="visually-hidden">Next</span>';
                        echo '          </button>';
                    }
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';
                }
            }
            ?>      
        </div>
    </div>
</div>
<div id="second-layer"></div>
<div id="myModal" style="min-width: 350px">
    <form id="order-form">
        <input type="hidden" id="productId" name="productId" value="">
        <input type="hidden" id="productQuantity" name="productQuantity" value="">
        <div class="add_to_giohang">
            <img id="form-image" src="" alt="product1" style="height:85px; width: 85px">
            <div class="add_pro_info" style="width:50%; margin-left:10px">
                <div style="display: flex; justify-content:space-between; width: 100%">
                    <b id="name-form" style="color: black;" name="name"></b>                                    
                </div>
                <div id="description-form" style="color: rgba(0, 0, 0, 0.5);">
                </div>
            </div>
            <div style="color: black; font-size: 20px; margin-left:10px">
                <b id="price-form"></b>
            </div>
        </div>
        <div class="add_ghichu" style="box-shadow: 2px 5px 5px rgba(164, 160, 160, 0.5); margin-top: 30px; padding:10px">
            <div style="display: flex; width: 100%; margin-top:5px">
                <b style="color: black;">Ghi chú</b>
                <p style="color: rgba(0, 0, 0, 0.5); margin-top: 0px; margin-left: 20px">Optional</p>                                    
            </div>
            <div style="color: rgba(0, 0, 0, 0.5);">
                <div>
                    <input type="text" name="note" id="note" placeholder="Ví dụ: Bỏ ít đá dùm em ạ">
                </div>
            </div>
        </div>
        <div class="" style="box-shadow: 2px 5px 5px rgba(164, 160, 160, 0.5); margin-top: 30px; padding:10px; display:flex; justify-content:space-between">
            <div style="display:flex">
                <button type="button" class="minus_button" onclick="minus_items()">
                    <span class="iconify" data-icon="mdi:minus-box-outline" style="font-size: 30px;"></span>
                </button>
                <div id="numberofitemchange" style="padding-top: 2px;">1</div>
                <input type="hidden" id="numberofitemchange-hidden" name="quantity" value="1">
                <button type="button" class="add_button" onclick="add_items()">
                    <span class="iconify" data-icon="basil:add-outline" style="font-size: 30px;"></span>
                </button>
            </div>
            <div>
                <div>
                    <input type="submit" name="add_to_giohang_button" id="add_to_giohang_button" value="Thêm">
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    var modal = document.getElementById("myModal");
    var cl = document.getElementById("second-layer");
    var numberofitemchange = document.getElementById("numberofitemchange");
    var numberofitemchangehidden = document.getElementById("numberofitemchange-hidden");
    cl.onclick = function() {
        modal.style.display = "none";
        cl.style.display = "none";
    }
    function showForm(productId) {
        fetch('../controller/user/form-mainpage.php?id=' + productId, {
            method: 'GET',
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            var name = document.getElementById("name-form");
            var image = document.getElementById("form-image");
            var des = document.getElementById("description-form");
            var price = document.getElementById("price-form");
            var id = document.getElementById("productId");
            var quantity = document.getElementById("productQuantity");
            name.innerHTML = data.name;
            image.src = data.image;
            des.innerHTML = data.description;
            price.innerHTML = data.price;
            id.value = productId;
            quantity.value = data.quantity;
            modal.style.display = "block";
            cl.style.display = "block";
        })
        .catch(error => {
            alert(error);
            alert('Error adding product. Please try again later.');
        });
        var form = document.getElementById("order-form");
        form.addEventListener("submit", function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            formData.append("productId", productId);
            fetch("../controller/user/submit-mainpage.php", {
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
                alert(data);
                window.location.reload();
            })
            .catch(error => {
                console.log(error);
                alert("Error submitting form. Please try again later.");
            });
        });
    }
    function minus_items() {
        number = parseInt(numberofitemchange.innerHTML);
        if (number > 1) {
            number --;
            numberofitemchange.innerHTML = number;
            numberofitemchangehidden.value = number;
        } else {
            alert("Không thể giảm nữa");
        }
    }
    function add_items() {
        var quantity = document.getElementById("productQuantity");
        number = parseInt(numberofitemchange.innerHTML);
        if (number < quantity.value) {
            number ++;
            numberofitemchange.innerHTML = number;
            numberofitemchangehidden.value = number;
        } else {
            alert("Không thể tăng nữa");
        }
    }
</script>