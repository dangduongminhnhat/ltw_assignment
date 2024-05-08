<?php
include_once("model/connectdb.php");
$query = "SELECT sellers.tiktok, sellers.instagram, sellers.facebook, sellers.nameStore, sellers.address,
                    accounts.phone, accounts.email
            FROM accounts
            INNER JOIN sellers ON accounts.id = sellers.idAccount
            WHERE sellers.idAccount = 1";
$result = mysqli_query($mysqli, $query);
$info = mysqli_fetch_assoc($result);
?>
<div class="logo">
    <div class="insideLogo" style="text-align: center; justify-content: center; align-items: center; width: 90%">
        <div style="align-items: center; margin-top:10px" class="logofork">
            <img src="/BTL/public/images/fork2.png" alt="logo">
        </div>
        <div style="text-align:center">
            <h1 style="font-size: 5em; margin-bottom: 12px;" class="uni"><?php echo $info["nameStore"]; ?></h1>
        </div>
        <div style="text-align: center;" class="liveto">
            <p>LIVE TO EAT</p>
        </div>
        <div class="for_littleS" style="margin-left:20px;">
            <h3 style="margin-top: 5pxpx; margin-bottom:0px"><?php echo $info["nameStore"]; ?></h3>
            <p style="margin-top: 0px;">LIVE TO EAT</p>               
        </div>
    </div>
</div>
<div class="hompage_body">
    <div style="width: 80%;">
        <div class="attcach_image">
            <h2>Món ăn của <?php echo $info["nameStore"]; ?></h2>
            <div style="width: 100%">
                <div id="multi-trasua" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $size = count($products);
                        for ($i = 0; $i < $size; $i = $i + 3) {
                            if ($i == 0) {
                                echo '<div class="carousel-item active">';
                            } else {
                                echo '<div class="carousel-item">';
                            }
                            echo '<div class="products">';
                            for ($j = $i; $j < $i + 3 && $j < $size; $j ++) {
                                echo '<div class="product" style="margin-right: 10px;">';
                                echo '  <img src="' . $products[$j]["image"] . '" alt="product1" style="width:100%; height: 250px">';
                                echo '  <div class="pro_info">';
                                echo '      <div style="display: flex; justify-content:space-between; width: 100%">';
                                echo '          <b>' . $products[$j]["name"] . '</b>';
                                echo '          <span class="iconify" data-icon="mdi:heart-outline" style="display: inline-block; margin-right: 0;"></span>';
                                echo '      </div>';
                                echo '      <p>' . $categories[$products[$j]["idCategory"]][0] . '</p>';
                                echo '      <div class="star_time_dis">';
                                echo '          <div style="display: inline-block;">';
                                echo '              <span class="iconify" data-icon="ph:star-fill" style="margin-right: 3px;"></span>';
                                echo '              <p style="display: inline;">' . $products[$j]["rate"] . '</p>';
                                echo '          </div>';
                                echo '      </div>';
                                echo '      <div class="discount">';
                                echo '          <span class="iconify" data-icon="mdi:voucher"></span>';
                                echo '          <p style="display: inline;">Tocotoco discount 20%</p>';
                                echo '      </div>';
                                echo '  </div>';
                                echo '</div>';
                            }
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#multi-trasua" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" id="prev_but" style="background-color:#FFC700;" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#multi-trasua" data-bs-slide="next">
                        <span class="carousel-control-next-icon" id="next_but" style="background-color:#FFC700;" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <h3>Khám phá theo danh mục</h3>
            <div style="width: 100%">
                <div id="multi-categories" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $size = count($categories);
                        for ($i = 1; $i <= $size; $i = $i + 3) {
                            if ($i == 1) {
                                echo '<div class="carousel-item active">';
                            } else {
                                echo '<div class="carousel-item">';
                            }
                            echo '<div class="list_item">';
                            for ($j = $i; $j < $i + 3 && $j <= $size; $j ++) {
                                echo '<div class="items">';
                                echo '  <a href="/BTL/user/mainpage#section' . $j . '">';
                                echo '      <img src="' . $categories[$j][1] . '" alt="item" style="width:100%; height: 200px">';
                                echo '  </a>';
                                echo '  <div class="item_info">';
                                echo '      <b>' . $categories[$j][0] . '</b>';
                                echo '  </div>';
                                echo '</div>';
                            }
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#multi-categories" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" id="prev_but" style="background-color:#FFC700;" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#multi-categories" data-bs-slide="next">
                        <span class="carousel-control-next-icon" id="next_but" style="background-color:#FFC700;" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="no_image">
            <h2>Vì sao bạn nên Order trên <?php echo $info["nameStore"]; ?>?</h2>
            <div>
                <ul style="list-style-type: none; margin-left: 0px; padding: 0px">
                    <li><span class="iconify" data-icon="ic:baseline-check" style="margin-right: 8px;"></span> <b>Nhanh nhất - </b> <?php echo $info["nameStore"]; ?> cung cấp dịch vụ giao đồ ăn nhanh nhất thị trường.</li>
                    <li><span class="iconify" data-icon="ic:baseline-check" style="margin-right: 8px;"></span> <b>Dễ dàng nhất - </b>Giờ đây, bạn chỉ cần thực hiện vài cú nhấp chuột hoặc chạm nhẹ là đã có thể đặt đồ ăn. Hãy đặt đồ ăn trực tuyến hoặc tải xuống siêu ứng dụng <?php echo $info["nameStore"]; ?> của chúng tôi để có trải nghiệm nhanh hơn và thú vị hơn.</li>
                    <li><span class="iconify" data-icon="ic:baseline-check" style="margin-right: 8px;"></span> <b>Đáp ứng mọi nhu cầu - </b>Từ món ăn đặc sản địa phương đến các nhà hàng được ưa thích, nhiều lựa chọn đa dạng chắc chắn sẽ luôn làm hài lòng khẩu vị của bạn.</li>
                    <li><span class="iconify" data-icon="ic:baseline-check" style="margin-right: 8px;"></span> <b>Thanh toán dễ dàng - </b>Giao và nhận đồ ăn thật dễ dàng. Thanh toán bằng MOMO thậm chí còn dễ dàng hơn nữa.</li>
                </ul>
            </div>
            <h2>Những câu hỏi thường gặp</h2>
            <div class="howto">
                <b>Làm cách nào để đặt đồ ăn ở Làng đại học TPHCM?</b><br>
                <p style="margin-top: 5px;">Sau đây là cách đơn giản nhất để đặt đồ ăn qua <?php echo $info["nameStore"]; ?> khi bạn ở Làng đại học TPHCM:</p>
                <ol style="padding-left: 25px; margin-top: 7px">
                    <li>Kiểm tra & Thanh toán - Sau khi chắc chắn rằng bạn đã đặt đầy đủ các món theo nhu cầu, hãy nhấp vào tab “ORDER NOW” (ĐẶT MÓN NGAY) và nhập địa chỉ giao đồ ăn cuối cùng. Chọn phương thức thanh toán phù hợp nhất với bạn và thanh toán.</li>
                    <li>Giao hàng - <?php echo $info["nameStore"]; ?> đã thiết kế một hành trình phục vụ khách hàng liền mạch để bạn có thể thưởng thức món ăn một cách trọn vẹn. Chúng tôi sẽ gửi cho bạn email và tin nhắn SMS tức thời xác nhận đơn đặt hàng của bạn và thời gian giao hàng dự kiến. Sau đó chúng tôi sẽ giao ngay đồ ăn cho bạn.</li>
                </ol>
                <b>Tôi có thể đặt đồ ăn trên <?php echo $info["nameStore"]; ?> cho người khác không?</b>
                <p style="margin-top: 5px;">Tất nhiên rồi, hãy chăm sóc những người thân yêu của mình bằng cách gửi những món ăn mà họ yêu thích đến tận nhà. Bạn chỉ cần cập nhật địa chỉ giao hàng và tên người nhận trước khi đặt đơn hàng của bạn.</p>
            </div>
        </div>
    </div>
</div>