<div class="row">
    <!-- content -->
    <div class="col align-items-center justify-content-center mt-3 me-3">
        <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="?page=mainpage" class="text-decoration-none" style="color: black">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="?page=order" class="text-decoration-none" style="color: black">Quản lý đơn hàng</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="text-decoration-none" style="color: black">Chi tiết đơn hàng</a>
                </li>
            </ol>
        </nav>
        <?php
        include_once("../../controller/seller/getProdctinOrder.php");
        include_once("../../controller/seller/getAccountdetail.php");
        $orderID = isset($_GET['orderID']) ? $_GET['orderID'] : null;
        if (!$orderID) {
            echo "order ID is missing!";
            exit;
        }
        $acc = fetchAccountdetail(1);
        $orderDetail = fetchProductInOrderAll($orderID);
        ?>
        <div class="d-flex flex-column justify-content-center align-items-center mt-3 ms-5 me-5 mb-4">
            <a class="text-decoration-none  fw-bold" style="color: black;"><?php echo $orderDetail[0]['dateCreated'] ?></a>
            <a class="text-decoration-none  fw-light" style="color: black;">Mã đơn hàng:
                <span>NYCA<?php echo $orderDetail[0]['idOrder'] ?></span>
            </a>
        </div>
        <div class="row ms-5 me-5 border rounded-4 mt-3 mb-3">
            <div class="col-2 d-flex justify-content-center align-items-center mt-2 mb-2">
                <img src="https://clipart-library.com/images_k/transparent-food-clipart/transparent-food-clipart-10.png" alt="order image" width="40" height="40">
            </div>
            <div class="col-8 d-flex align-items-center">
                <div class="d-flex flex-column justify-content-center mt-2 mb-2">
                    <a class="text-decoration-none  fw-bold" style="color: black;"><?php echo $orderDetail[0]['userName'] ?></a>
                    <a class="text-decoration-none  fw-light" style="color: black;"><?php echo $orderDetail[0]['statusOrder'] ?></a>
                </div>
            </div>
        </div>
        <div class="d-flex ms-5 me-5 mb-3 align-items-center justify-content-center">
            <img src="https://c2.staticflickr.com/9/8854/28968848081_eef66b3cba_z.jpg" alt="map" class="img-fluid">
        </div>
        <div class="row ms-5 me-5 border rounded-4 mt-3 mb-3">
            <div class="col-2 d-flex flex-column justify-content-center align-items-center mt-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="blue" class="bi bi-geo-alt-fill mb-3" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>
            </div>
            <div class="col-10 flex-column d-flex justify-content-center mt-2 mb-2">
                <a class="text-decoration-none mb-3" style="color: black;">Địa chỉ quán:
                    <?php echo $acc['address']; ?></a>
                <a class="text-decoration-none" style="color: black;">Địa chỉ nhận hàng:
                    <?php echo $orderDetail[0]['addr']; ?></a>
                <a class="text-decoration-none" style="color: black;">Số điện thoại nhận hàng:
                    <?php echo $orderDetail[0]['phone']; ?></a>
            </div>
        </div>
        <div class="row ms-5 me-5 border rounded-4 mt-3 mb-3">
            <div class="col-12 mt-2 ">
                <p class="fw-bold  text-center">Tóm tắt đơn hàng</p>
            </div>
            <div class="col-12 mb-2">
                <?php
                $index = 0;
                foreach ($orderDetail[0]['product'] as $key => $productArray) {
                ?>
                    <div class="row">
                        <div class="col-2 d-flex justify-content-center  mb-2">
                            <a class="text-decoration-none fw-bold" style="color: black;">
                                <span><?php echo $productArray['quantity'] ?></span>x
                            </a>
                        </div>
                        <div class="col-8 d-flex flex-column justify-content-center mb-2">
                            <a class="text-decoration-none" style="color: black;"> <?php echo $productArray['proName'] ?>
                            </a>
                            <a class="text-decoration-none fw-light" style="color: black;"><?php echo $productArray['proNote'] ?> </a>
                        </div>
                        <div class="col-2 d-flex justify-content-center  mb-2">
                            <a class="text-decoration-none" style="color: black;"><span><?php echo number_format((int) $productArray['proPrice']) ?></span>đ
                            </a>
                        </div>
                    </div>
                <?php
                    $index++;
                } ?>
            </div>
        </div>
        <div class="row ms-5 me-5 border rounded-4 mt-3 mb-3">
            <div class="col-2 d-flex flex-column justify-content-center align-items-center mt-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FFC700" class="bi bi-pen mb-3" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FFC700" class="bi bi-wallet2" viewBox="0 0 16 16">
                    <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z" />
                </svg>
            </div>
            <div class="col-10 flex-column d-flex justify-content-center mt-2 mb-2">
                <a class="text-decoration-none mb-3" style="color: black;">Ghi chú:
                    <span class="fw-light"><?php echo $orderDetail[0]['note'] ?></span>
                </a>
                <a class="text-decoration-none" style="color: black;">Phương thức thanh toán:
                    <span><?php echo $orderDetail[0]['payment'] ?></span>
                </a>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center mt-2 mb-2">
                <h4 class="text-decoration-none fw-bold text-center" style="color: black;">Tổng cộng:
                    <span><?php echo number_format((int) $orderDetail[0]['total'], 0, ',', '.'); ?></span>đ
                </h4>

            </div>
            <div class="text-center">
                <?php if ($orderDetail[0]['statusOrder'] == 'Đã hoàn thành' || $orderDetail[0]['isCanceled'] == 1): ?>
                    <button class="btn mt-2 mb-2" style="background-color: #FFC700;" onclick="returnOrder()">
                        <i class="fas fa-reply"></i> Trở về
                    </button>
                <?php elseif ($orderDetail[0]['statusOrder'] == 'Đang giao hàng') : ?>
                    <button class="btn mt-2 mb-2" style="background-color: #FFC700;" onclick="completeOrder('<?php echo $orderDetail[0]['idOrder']; ?>')">
                        <i class="fas fa-check-circle"></i> Đã hoàn thành
                    </button>
                <?php elseif ($orderDetail[0]['statusOrder'] != 'Đã hoàn thành' && $orderDetail[0]['statusOrder'] != 'Đang giao hàng') : ?>
                    <button class="btn mt-2 mb-2" style="background-color: #FFC700;" onclick="prepareOrder('<?php echo $orderDetail[0]['idOrder']; ?>')">
                        <i class="fas fa-utensils"></i> Chuẩn bị hàng
                    </button>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <!-- content -->
    <script>
        function returnOrder() {
            console.log("returnOrder")
            var redirectTo = "./index.php?page=order";
            window.location.href = redirectTo;
        }

        function prepareOrder(orderID) {
            console.log("Preparing order...", orderID);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("Order status changed to preparing.");
                    window.location.reload();
                }
            };
            xhttp.open("GET", "../../controller/seller/changeOrderStatus.php?action=prepareOrder&orderID=" + orderID, true);
            xhttp.send();
        }

        function completeOrder(orderID) {
            console.log("Completing order...", orderID);
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("Order status changed to completed.");
                    window.location.reload();
                }
            };
            xhttp.open("GET", "../../controller/seller/changeOrderStatus.php?action=deliveryOrder&orderID=" + orderID, true);
            xhttp.send();
        }
    </script>
</div>