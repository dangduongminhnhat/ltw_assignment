<div class="row">
    <!-- content -->
    <div class="col align-items-center justify-content-center mt-3 me-3">
    <div class="row mt-3 mb-3 d-flex">
        <div
        class="col-4 col-lg-4 d-flex flex-column align-items-center justify-content-center"
        >
        <?php
            include_once("model/connectdb.php");
            $query_total = "SELECT COUNT(*) AS total_rows FROM ratings";
            $result_total = mysqli_query($mysqli, $query_total);
            $row_total = mysqli_fetch_assoc($result_total);
            $totalratings = $row_total['total_rows'];

            $query_average = "SELECT ROUND(AVG(stars), 1) AS average_rating FROM ratings";
            $result_average = mysqli_query($mysqli, $query_average);
            $row_average = mysqli_fetch_assoc($result_average);
            $averagerating = $row_average['average_rating'];

            $query_5star = "SELECT COUNT(*) AS count_5star FROM ratings WHERE stars = 5";
            $result_5star = mysqli_query($mysqli, $query_5star);
            $row_5star = mysqli_fetch_assoc($result_5star);
            $count_5star = $row_5star['count_5star'];

            $query_4star = "SELECT COUNT(*) AS count_4star FROM ratings WHERE stars = 4";
            $result_4star = mysqli_query($mysqli, $query_4star);
            $row_4star = mysqli_fetch_assoc($result_4star);
            $count_4star = $row_4star['count_4star'];

            $query_3star = "SELECT COUNT(*) AS count_3star FROM ratings WHERE stars = 3";
            $result_3star = mysqli_query($mysqli, $query_3star);
            $row_3star = mysqli_fetch_assoc($result_3star);
            $count_3star = $row_3star['count_3star'];
            
            $query_2star = "SELECT COUNT(*) AS count_2star FROM ratings WHERE stars = 2";
            $result_2star = mysqli_query($mysqli, $query_2star);
            $row_2star = mysqli_fetch_assoc($result_2star);
            $count_2star = $row_2star['count_2star'];

            $query_1star = "SELECT COUNT(*) AS count_1star FROM ratings WHERE stars = 1";
            $result_1star = mysqli_query($mysqli, $query_1star);
            $row_1star = mysqli_fetch_assoc($result_1star);
            $count_1star = $row_1star['count_1star'];

            $count_5star = ($count_5star/$totalratings)*100;
            $count_4star = ($count_4star/$totalratings)*100;
            $count_3star = ($count_3star/$totalratings)*100;
            $count_2star = ($count_2star/$totalratings)*100;
            $count_1star = ($count_1star/$totalratings)*100;
        ?>
        <a
            id="rate"
            class="fw-bold fs-3 text-decoration-none mb-1"
            style="color: black"
            ><?php echo $averagerating ?></a
        >
        <div class="d-flex flex-row mb-2">
            <?php
            include_once("controller/seller/generateStarRating.php");
            echo generateStarRating(3);
            
            ?>
        </div>
        
        <a><span><?php echo $totalratings ?></span> đánh giá</a> 
        </div>
        <div class="col-1 col-lg-1 d-flex flex-column align-items-center">
            <a class="mt-1 mb-1 text-decoration-none" style="color: black">5</a>
            <a class="mt-1 mb-1 text-decoration-none" style="color: black">4</a>
            <a class="mt-1 mb-1 text-decoration-none" style="color: black">3</a>
            <a class="mt-1 mb-1 text-decoration-none" style="color: black">2</a>
            <a class="mt-1 mb-1 text-decoration-none" style="color: black">1</a>
        </div>
        <div class="col-7 col-lg-7">
        <div
            class="row d-flex flex-column align-items-center justify-content-center"
        >
            <div class="col-12 mt-2 mb-2">
            <div
                class="progress"
                role="progressbar"
                aria-label="Warning example"
                aria-valuenow="80"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                <div class="progress-bar bg-warning" style="width: <?php echo $count_5star ?>%"></div>
            </div>
            </div>
            <div class="col-12 mt-2 mb-2">
            <div
                class="progress"
                role="progressbar"
                aria-label="Warning example"
                aria-valuenow="15"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                <div class="progress-bar bg-warning" style="width: <?php echo $count_4star ?>%"></div>
            </div>
            </div>
            <div class="col-12 mt-2 mb-2">
            <div
                class="progress"
                role="progressbar"
                aria-label="Warning example"
                aria-valuenow="5"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                <div class="progress-bar bg-warning" style="width: <?php echo $count_3star ?>%"></div>
            </div>
            </div>
            <div class="col-12 mt-2 mb-2">
            <div
                class="progress"
                role="progressbar"
                aria-label="Warning example"
                aria-valuenow="0"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                <div class="progress-bar bg-warning" style="width: <?php echo $count_2star ?>%"></div>
            </div>
            </div>
            <div class="col-12 mt-2 mb-2">
            <div
                class="progress"
                role="progressbar"
                aria-label="Warning example"
                aria-valuenow="0"
                aria-valuemin="0"
                aria-valuemax="100"
            >
                <div class="progress-bar bg-warning" style="width: <?php echo $count_1star ?>%"></div>
            </div>
            </div>
        </div>
        </div>
        <!-- <div
        class="col-12 col-lg-5 d-flex flex-column justify-content-center"
        >
        <form class="ms-5" >
            <label class="form-label" for="order">Sắp xếp theo</label>
            <select
                class="form-select"
                id="order"
                name="order"
                aria-label="Default select example"
                onchange=""
                >
                <option value="newest" >Mới nhất</option>
                <option value="highest">Cao nhất</option>
            </select>
        </form>
        </div> -->
    </div>
    <p class="fw-bold fs-4 ms-5 mb-3">TỪ KHÁCH HÀNG</p>
    <div style="max-height: 650px; overflow-y: auto; overflow-x: hidden;">
        <?php
            $sortOption = "newest";
            include_once("model/user/getRatings.php");
            $ratings = getRatings($mysqli, $sortOption);
            foreach ($ratings as $index => $itemm) {
                $modalId = 'shoprespone_' . $index;
                $modalIduser = 'userdetail_' . $index;
                
        ?>
    <div class="row border rounded-4 me-5 ms-5 mb-3">
        <div class="col-12 d-flex flex-row mt-3 align-items-center">
        <img
            src="https://res.cloudinary.com/hy4kyit2a/f_auto,fl_lossy,q_70/learn/modules/salesforce-b2b-commerce-storefront-experience/support-your-buyers-b2b-journey/images/4889eb0c3f27a0c1a53bc4e89b09bdb4_b-42-aa-2-e-0-1-bc-4-4-cb-9-a-91-e-016914-c-0-a-473.png"
            width="60"
            height="60"
            alt="avatar"
            class="d-none d-lg-flex d-md-flex"
        />
        <a class="ms-2 text-decoration-none me-5" style="color: black"
            ><span><?php echo $itemm['userName']; ?></span> - Mã đơn hàng: <span><?php echo $itemm['idOrder']; ?></span></a
        >
        <?php echo generateStarRating($itemm['stars']); ?>
        </div>
        <div class="col-12 d-flex flex-column mt-3">
                <?php
                    include_once("model/user/getUserdetail.php");
                    $userID = $itemm['id'];
                    $userdetail = getUserDetail($mysqli, $userID);
                    
                ?>
                <div class="modal fade" id="<?php echo $modalIduser; ?>" tabindex="-1" aria-labelledby="infoUser" aria-hidden="true">
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
            <a class="ms-2 text-decoration-none mt-3" style="color: #939292"
                ><span><?php echo $itemm['timeRating']; ?></span></a
            >
            <a class="ms-2 text-decoration-none mt-3" style="color: black"
                ><?php echo $itemm['content']; ?></a
            >
            <?php
            include_once("model/user/getProductinOrder.php");
            $listPIO = getProductInOrder($mysqli, $itemm['idOrder']);
            $productList = "";
            foreach ($listPIO as $index => $itemmproduct) {
                $productList .= $itemmproduct['name'] . ' x ' . $itemmproduct['quantity'];
                if ($index < count($listPIO) - 1) {
                    $productList .= ', ';
                }
            }
            ?>
            <a class="ms-2 text-decoration-none mt-3" style="color: #939292"
                >Đã đặt: <?php echo $productList; ?>
            </a>
            <a class="ms-2 text-decoration-none mt-3" style="color: black"
                ><span class="fw-bold">Phản hồi từ quán:</span>
                <span><?php echo $itemm['respone']; ?></span></a
            >
        </div>
        <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="shopResponeLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="shopResponeLabel">Phản hồi đánh giá nhận xét</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form onsubmit= "logFormData(event)">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="respone">ID Rating</label>
                                    <input
                                    class="form-control"
                                    id="idrating"
                                    name="idrating"
                                    type="number"
                                    value="<?php echo $itemm['ID']; ?>"
                                    required
                                    style="width: 100%"
                                    readonly
                                    />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="respone">Phản hồi</label>
                                    <input
                                    class="form-control"
                                    id="respone"
                                    name="respone"
                                    type="text"
                                    placeholder="Nhập phản hồi của bạn"
                                    required
                                    style="width: 100%"
                                    />
                            </div>
                        </div>
                        <div class="modal-footer d-flex flex-row justify-content-center">
                            <button type="reset" class="btn btn-outline-warning me-5" style="color: red">
                                HỦY
                            </button>
                            <button type="submit" class="btn btn-outline-warning ms-5">
                                THÊM PHẢN HỒI
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    </div>
    </div>
        <script>
            function hideRating(ratingID){
                console.log("Rating ID:", ratingID);
                var confirmation = confirm("Bạn có chắc chắn muốn ẩn đánh giá nhận xét này?");
                if (!confirmation) {
                    return; 
                }
                fetch('../../controller/seller/hideRating.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ ratingID: ratingID }),
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = "?page=rate";
                    } else {
                        console.error('Error:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
            function logFormData(event) {
                event.preventDefault();
                var form = event.target;

                if (!confirm("Thêm phản hồi?")) {
                    return;
                }

                var formData = new FormData(form);

                fetch('../../controller/seller/addResponerating.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = "?page=rate";
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
                    window.location.href = "?page=rate";
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
                    window.location.href = "?page=rate";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        }
        </script>
    <!-- content -->
</div>