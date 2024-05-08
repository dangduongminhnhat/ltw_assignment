<div class="row">
    <!-- content -->
    <div class="col align-items-center justify-content-center mt-3 me-3">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="?page=mainpage" class="text-decoration-none" style="color: black"
            >Trang chủ</a
            >
        </li>
        <li class="breadcrumb-item">
            <a
            href="?page=product"
            class="text-decoration-none"
            style="color: black"
            >Quản lý sản phẩm</a
            >
        </li>
        <li class="breadcrumb-item">
            <a
            href="?page=infringingproduct"
            class="text-decoration-none"
            style="color: black"
            >Sản phẩm vi phạm</a
            >
        </li>
        </ol>
    </nav>
    <div>
        <div class="justify-content-center mt-4 me-5 ms-5 mb-4">
        <div  style="max-height: 700px; overflow-y: auto; overflow-x: hidden;">
        <?php
            include_once("../../controller/seller/getReportedProduct.php");
            $reportlist = fetchReportedProduct();          
            foreach ($reportlist as $index =>  $itemmreport) {
                $modalId = 'detailUser_' . $index;
        ?>
        <div class="row border rounded-4 mb-3">
            <div
            class="col-lg-3 d-none d-md-none d-lg-flex mt-2 mb-2 d-flex justify-content-center align-items-center"
            >
            <div class="container">
                <img
                src="<?php echo $itemmreport['image']; ?>"
                class="img-fluid"
                alt="product image"
                style="max-width:200px; max-height:200px"
                />
            </div>
            </div>
            <div
            class="col-lg-6 col-md-8 d-flex flex-column justify-content-center mt-2 mb-2"
            >
                <div class="d-flex flex-row">
                    <a
                    class="mb-2 mt-2 text-decoration-none fw-bold"
                    style="color: black"
                    ><span><?php echo $itemmreport['name']; ?></span> -
                    <span><?php echo $itemmreport['product_id']; ?></span></a
                    >
                </div>
                <a class="mb-2 mt-2 text-decoration-none" style="color: #aba9a9"><?php echo $itemmreport['timeReport']; ?></a>
                <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                    >Tình trạng: <span><?php echo $itemmreport['isHidden'] == 0 ? "Đang bán" : "Đã ẩn";?></span></a
                >
                <a class="mb-2 mt-2 text-decoration-none" style="color: red"
                    >Lý do vi phạm:
                    <span style="color: black"
                    ><?php echo $itemmreport['content']; ?></span
                    ></a
                >
                <a class="mb-2 mt-2 text-decoration-none" style="color: black" id="user">
                    Người báo cáo: <span><?php echo $itemmreport['userName']; ?></span> - (<span><?php echo $itemmreport['account_id']; ?></span>)
                    <span class="me-5 ms-5 text-decoration-underline fw-light" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>">Xem thông tin</span>
                    <?php if ($itemmreport['isReported'] == 0) { ?>
                        <span class="text-decoration-underline fw-light" style="color:red" onclick="reportUser(<?php echo $itemmreport['account_id']; ?>)">Chặn</span>
                        <?php } 
                    ?>
                    <?php if ($itemmreport['isReported'] == 1) { ?>
                        <span class="text-decoration-underline fw-light" style="color:red" onclick="unblockUser(<?php echo $itemmreport['account_id']; ?>)">Gỡ chặn</span>
                        <?php } 
                    ?>
                </a>
                <?php
                    include_once("../../controller/seller/getUserdetail.php");
                    $userID = $itemmreport['account_id'];
                    $userdetail = fetchUserDetail($userID);
                    
                ?>
                <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="infoUser" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="infoUser">
                            Thông tin khách hàng
                            </h1>
                            <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="username"
                                >Tên khách hàng</label
                                >
                                <input
                                class="form-control"
                                id="username"
                                name="username"
                                type="text"
                                value="<?php echo $userdetail['userName']?>"
                                readonly
                                style="width: 100%"
                                />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email"
                                >Email</label
                                >
                                <input
                                class="form-control"
                                id="email"
                                name="email"
                                type="text"
                                value="<?php echo $userdetail['email']; ?>"
                                readonly
                                style="width: 100%"
                                />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phonenum"
                                >Số điện thoại</label
                                >
                                <input
                                class="form-control"
                                id="phonenum"
                                name="phonenum"
                                type="number"
                                value="<?php echo $userdetail['phone']; ?>"
                                readonly
                                style="width: 100%"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div
            class="col-lg-3 col-md-4 d-flex d-lg-flex flex-column justify-content-center mt-2 mb-2"
            >
            <?php if ($itemmreport['isHidden'] == 0) { ?>
                    <button type="button" class="btn btn-outline-warning mb-2 mt-2" onclick="hideProduct(<?php echo $itemmreport['product_id']; ?>)">ẨN SẢN PHẨM</button>
                    <?php } 
                ?>
            <?php if ($itemmreport['isHidden'] == 1) { ?>
                    <button type="button" class="btn btn-outline-warning mb-2 mt-2" onclick="showProduct(<?php echo $itemmreport['product_id']; ?>)">ĐĂNG BÁN</button>
                    <?php } 
                ?>
            <button
                type="button"
                class="btn btn-outline-warning mb-2 mt-2"
                onclick="redirectToProductDetail(<?php echo $itemmreport['product_id']; ?>)"
            >
                SỬA THÔNG TIN
            </button>
            <button
                type="button"
                class="btn btn-outline-warning mb-2 mt-2"
                style="color: red"
                onclick="deleteProduct(<?php echo $itemmreport['product_id']; ?>)"
            >
                XÓA SẢN PHẨM
            </button>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
        </div>
    </div>
    </div>
    <!-- content -->
    <script>
        function redirectToProductDetail(productID) {
            window.location.href = "?page=productdetail&productID=" + productID;
        }
        function deleteProduct(productID) {
            console.log("Product ID:", productID);
            var confirmation = confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
            if (!confirmation) {
                return; 
            }
            fetch('../../controller/seller/deleteProduct.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ productID: productID }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=infringingproduct";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
        function hideProduct(productID) {
            console.log("Product ID:", productID);
            var confirmation = confirm("Bạn có chắc chắn muốn gỡ bán sản phẩm này?");
            if (!confirmation) {
                return; 
            }
            fetch('../../controller/seller/hideProduct.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ productID: productID }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=infringingproduct";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
        function showProduct(productID) {
            console.log("Product ID:", productID);
            var confirmation = confirm("Bạn có chắc chắn muốn đăng bán lại sản phẩm này?");
            if (!confirmation) {
                return; 
            }
            fetch('../../controller/seller/showProduct.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ productID: productID }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=infringingproduct";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
        function reportUser(userID){
            console.log("User ID:", userID);
            var confirmation = confirm("Xác nhận chặn khách hàng này?");
            if(!confirmation){
                return;
            }
            fetch('../../controller/seller/reportUser.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ userID: userID }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=infringingproduct";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        }
        function unblockUser(userID){
            console.log("User ID:", userID);
            var confirmation = confirm("Xác nhận gỡ chặn khách hàng này?");
            if(!confirmation){
                return;
            }
            fetch('../../controller/seller/unblockUser.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ userID: userID }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=infringingproduct";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        }
    </script>
</div>