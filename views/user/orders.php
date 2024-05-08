<div class="container-fluid" style="margin-bottom: 50px; min-height: 350px">
    <div class="linkStyle">
        <a class="link-underline-light linkStyleColor" href="/BTL/user/orders">Đơn hàng</a>
    </div>
    <div class="title-history">
        <h1><strong>Lịch sử hoạt động</strong></h1>
    </div>
    <?php
    $size = count($orders);
    $count = 0;
    for ($i = 0; $i < $size; $i ++) {
        if ($orders[$i]["isCanceled"] == 1) {
            continue;
        }
        $count ++;
        echo '<div class="container container-border-page">';
        echo '    <div class="row inside-container-page content-responsive">';
        echo '        <div class="col content-in-container" style="max-width: 20%; min-width: 94px; padding: 0px">';
        echo '            <img src="/BTL/public/images/Ellipse 2.png" alt="" />';
        echo '        </div>';
        echo '        <div class="col content-in-container information-food">';
        echo '            <div>';
        echo '                <div class="note-style">' . $orders[$i]["statusOrder"] . '</div>';
        echo '                <div>UniEat</div>';
        echo '                <div class="note-style">'. $orders[$i]["dateCreated"] . '</div>';
        if ($orders[$i]["statusOrder"] == "Chờ chuẩn bị") {
            echo '                <div style="display: flex; margin-top: 10px; margin-bottom: 5px">';
            echo '                    <div style="margin-right: 10px">';
            echo '                        <a href="/BTL/user/orderdetail?orderId=' . $orders[$i]["id"] . '" class="evaluate-link" ><strong>Chi tiết</strong></a>';
            echo '                    </div>';
            echo '                    <div>';
            echo '                        <button style="border: 0" class="evaluate-link" onclick="cancelOrderClick(' . $orders[$i]["id"] . ')" ><strong>Hủy đơn</strong></button>';
            echo '                    </div>';
            echo '                </div>';
        } else {
            echo '                <div style="display: flex; margin-top: 10px; margin-bottom: 5px">';
            echo '                    <div style="margin-right: 10px">';
            echo '                        <a href="/BTL/user/orderdetail?orderId=' . $orders[$i]["id"] . '" class="evaluate-link" ><strong>Chi tiết</strong></a>';
            echo '                    </div>';
            if (in_array($orders[$i]["id"], $ratesId) == FALSE) {
                echo '                    <div style="margin-right: 10px">';
                echo '                        <a href="#" class="evaluate-link" data-bs-toggle="modal" data-bs-target="#myModal" onclick="setOrderId(' . $orders[$i]["id"] . ')"><strong>Đánh giá</strong></a>';
                echo '                    </div>';
            }
            echo '                    <div>';
            echo '                        <a href="/BTL/user/mainpage" class="evaluate-link"><strong>Đặt lại</strong></a>';
            echo '                    </div>';
            echo '                </div>';
        }
        echo '            </div>';
        echo '        </div>';
        echo '        <div class="col content-in-container" style="max-width: 20%; min-width: 94px; padding: 0px">';
        echo '            ' . $orders[$i]["total"] . ' <u style="padding-left: 3px">đ</u>';
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
    }
    if ($count == 0) {
        echo '<div style="padding: 20px; border-radius: 10px; text-align: center">';
        echo '<div style="margin-bottom: 20px;">';
        echo '<span class="iconify" data-icon="mingcute:bill-fill" style="font-size: 80px; color: #FFC700"></span>';
        echo '</div>';
        echo '<p style="font-size: 16px; font-weight: bold; margin-bottom: 10px;">Chưa có đơn hàng nào</p>';
        echo '<p style="font-size: 14px; color: #666;">Hãy đặt hàng sau để kiểm tra trạng thái đơn hàng của bạn tại đây</p>';
        echo '</div>';
    }
    echo '<form id="cancel-form">';
    echo '  <input type="hidden" name="idOrder" id="idOrderInput" value="">';
    echo '</form>';
    ?>
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
                <input type="hidden" id="order-id" name="order_id" value="">
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
function setOrderId(id) {
    var orderId = document.getElementById("order-id");
    orderId.value = id;
}
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

function cancelOrderClick(orderId) {
    var check = confirm("Bạn muốn hủy đơn này");
    if (check == false) {
        return;
    }
    document.getElementById("idOrderInput").value = orderId;
    var formData = new FormData();
    formData.append("idOrder", orderId);
    fetch("../controller/user/cancelOrder.php", {
        method: "POST",
        body: formData
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
}
</script>