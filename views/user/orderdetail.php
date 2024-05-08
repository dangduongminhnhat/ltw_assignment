<div class="container-fluid" style="margin-bottom: 50px">
    <div class="linkStyle">
    <a class="link-underline-light linkStyleColor" href="/BTL/user/orders">Đơn hàng</a> >
    <a class="link-underline-light linkStyleColor" href="#">NYCA<?php echo $orderIdForPage; ?></a>
    </div>
    <div class="titlePage">
    <div>
        <div>
        <strong><?php echo $orderUse["dateCreated"]; ?></strong>
        </div>
        <div
        class="linkStyleColor"
        style="display: flex; justify-content: space-between"
        >
        <div>Mã đơn hàng</div>
        <div>NYCA<?php echo $orderIdForPage; ?></div>
        </div>
    </div>
    </div>
    <div class="container container-border-page">
    <div class="row inside-container-page">
        <div
        class="col content-in-container"
        style="max-width: 10%; min-width: 80px"
        >
        <img src="/BTL/public/images/Ellipse 2.png" alt="" />
        </div>
        <div class="col content-in-container">
        <div>
            <div>
            <strong>UniEat</strong>
            </div>
            <div class="note-style"> <?php echo $orderUse["statusOrder"]; ?> </div>
        </div>
        </div>
        <div class="col content-in-container" style="max-width: 20%">
        <?php
        if ($orderUse["statusOrder"] == "Đã hoàn thành" && in_array($orderIdForPage, $ratesId) == FALSE) {
            echo '<a
                        href="#"
                        class="evaluate-link"
                        data-bs-toggle="modal"
                        data-bs-target="#myModal"
                        >Đánh giá</a
                    >';
        }
        ?>
        </div>
    </div>
    </div>
    <div class="container container-border-page">
    <div class="inside-container-page">
        <div>
        <span
            class="iconify"
            data-icon="fa6-solid:circle-dot"
            style="color: #1e90ff"
        ></span>
        <span class="address-style"
            > <?php echo $orderUse["address"]; ?> </span
        >
        </div>
    </div>
    </div>
    <div class="container container-border-page">
    <div class="inside-container-page">
        <strong>Tóm tắt đơn hàng</strong>
    </div>
    <hr style="margin-top: 2px; margin-bottom: 10px" />
    <div style="margin-bottom: 10px">
        <?php
        $size = count($product_in_order);
        for ($i = 0; $i < $size; $i ++) {
            echo '<div class="row inside-container-page">';
            echo '  <div class="col" style="max-width: 5%">';
            echo '      <strong>' . $product_in_order[$i]["quantity"] . 'x</strong>';
            echo '  </div>';
            echo '  <div class="col">';
            echo '      <div>' . $products[$i]["name"] . '</div>';
            echo '      <div class="note-style">' . $product_in_order[$i]["note"] . '</div>';
            echo '  </div>';
            echo '  <div class="col prices">' . $product_in_order[$i]["price"] . '</div>';
            echo '</div>';
        }
        ?>
    </div>
    </div>
    <div class="container container-border-page">
    <div>
        <div class="row inside-container-page">
            <div class="col">
                <strong>Tổng cộng</strong>
            </div>
            <div class="col prices momo-icon" style="margin-bottom: 15px">
                <img
                src="/BTL/public/images/Rectangle 41.png"
                alt=""
                style="width: 25px; height: 16px"
                />
                <span style="padding-left: 10px">
                <strong> <?php echo $orderUse["total"]; ?> <u style="padding-left: 3px">đ</u> </strong>
                </span>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="modal" id="myModal">
    <form id="rate-form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="text-align: center">
                <img src="/BTL/public/images/fork 2.png" alt="" style="margin-top: 40px" />
                <div style="margin-top: 20px">
                    <strong>Đánh giá bữa ăn này</strong>
                </div>
                <div class="note-style">
                    Bạn thấy thức ăn hoặc thức uống từ
                </div>
                <div class="note-style">UniEat như thế nào?</div>
                <input type="hidden" id="order-id" name="order_id" value="<?php echo $orderIdForPage;?>">
                <div style="margin-top: 20px; margin-bottom: 20px; display: flex; justify-content: center">
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
                <div style="display: flex; justify-content: center">
                    <textarea
                    name="text"
                    id="comment"
                    rows="6"
                    placeholder="Bạn thấy món ăn như thế nào?"
                    class="form-control"
                    style="max-width: 70%; border-radius: 10px"
                    ></textarea>
                </div>
                <div style="margin-top: 20px">
                    <button
                    type="submit"
                    class="btn"
                    data-bs-dismiss="modal"
                    style="width: 70%; background: #ffc700; border-radius: 20px"
                    >
                    Gửi
                    </button>
                </div>
                <div
                    class="note-style"
                    style="margin-top: 5px; margin-bottom: 50px"
                >
                    Nhận xét của bạn sẽ được công khai
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    var formRate = document.getElementById("rate-form");
    formRate.addEventListener("submit", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    fetch("../controller/user/rate.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json();
        })
        .then((data) => {
        console.log(data);
        alert(data);
        window.location.reload();
        console.log(data);
        })
        .catch((error) => {
        console.log(error);
        alert("Error submitting form. Please try again later.");
        });
    });
</script>