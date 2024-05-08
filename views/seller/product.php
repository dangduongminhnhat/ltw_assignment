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
            href="?page=product"
            class="text-decoration-none"
            style="color: black"
            >Sản phẩm hiện tại</a
            >
        </li>
        </ol>
    </nav>
    <div>
        <div class="d-flex flex-row align-items-center ms-5">
        <button
            type="button"
            class="btn btn-outline-warning"
            onclick="redirectToAddProduct()"
        >
            THÊM SẢN PHẨM MỚI
        </button>
        <button
            type="button"
            class="btn btn-outline-warning ms-3"
            data-bs-toggle="modal"
            data-bs-target="#addCategory"
        >
            THÊM DANH MỤC
        </button>
        </div>
        <div
        class="modal fade"
        id="addCategory"
        tabindex="-1"
        aria-labelledby="addCategoryLabel"
        aria-hidden="true"
        >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addCategoryLabel">
                    Thêm danh mục mới
                    </h1>
                    <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                    ></button>
                </div>
                <?php
                    include_once("../../model/connectdb.php");
                    $query = "SELECT MAX(id) AS max_id FROM category";
                    $result = mysqli_query($mysqli, $query);
                    $row = mysqli_fetch_assoc($result);
                    $next_id = $row['max_id'] + 1;
                ?>
                <form enctype="multipart/form-data" onsubmit= "confirmAddCategory(event)">
                    <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="idcategory"
                        >Mã danh mục</label
                        >
                        <input
                        class="form-control"
                        id="idcategory"
                        name="idcategory"
                        type="text"
                        value="<?php echo $next_id; ?>"
                        required
                        readonly
                        style="width: 100%"
                        />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="namecategory"
                        >Tên danh mục</label
                        >
                        <input
                        class="form-control"
                        id="namecategory"
                        name="namecategory"
                        type="text"
                        placeholder="Nhập tên danh mục"
                        required
                        style="width: 100%"
                        />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="imagecategory"
                        >Hình ảnh minh họa</label
                        >
                        <input
                        class="form-control"
                        id="imagecategory"
                        name="imagecategory"
                        type="file"
                        required
                        style="width: 100%"
                        onchange="previewImage(event)"
                        />
                    </div>
                    <div id="image-preview" class="mt-2" style="max-height:200px; max-width:200px"></div>
                    </div>
                    <div
                    class="modal-footer d-flex flex-row justify-content-center"
                    >
                    <button
                        type="reset"
                        class="btn btn-outline-warning me-5"
                        style="color: red"
                    >
                        HỦY
                    </button>
                    <button type="submit" class="btn btn-outline-warning ms-5">
                        THÊM DANH MỤC
                    </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <div class="justify-content-center mt-3 ms-5 me-5 mb-4" >
        <form method="post" action="">
            <label class="form-label" for="searchproduct">Tìm kiếm sản phẩm</label>
            <input class="form-control" id="searchproduct" name="searchproduct" type="text" placeholder="Nhập tên sản phẩm" style="width: 100%;">
        </form>

        <?php
            include_once("../../controller/seller/getCategory.php");
            
            $categorylist = fetchCategory();
            foreach ($categorylist as $index => $itemmcategory) {
                    $modalId = 'updateCategory_' . $index;
        ?>
        <div> 
            <p class="fs-4 fw-bold mt-3" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>">
                <span><?php echo $itemmcategory['id']?></span>. <span><?php echo $itemmcategory['typeName']; ?></span>
            </p>
            <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="updateCategoryLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="updateCategoryLabel">
                            Chỉnh sửa danh mục
                            </h1>
                            <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            ></button>
                        </div>
                        <form enctype="multipart/form-data" onsubmit= "confirmupdateCategory(event)">
                            <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label" for="idcategory"
                                >Mã danh mục</label
                                >
                                <input
                                class="form-control"
                                id="idcategory"
                                name="idcategory"
                                type="text"
                                value="<?php echo $itemmcategory['id']?>"
                                required
                                readonly
                                style="width: 100%"
                                />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="namecategory"
                                >Tên danh mục</label
                                >
                                <input
                                class="form-control"
                                id="namecategory"
                                name="namecategory"
                                type="text"
                                value="<?php echo $itemmcategory['typeName']; ?>"
                                placeholder="Nhập tên danh mục"
                                required
                                style="width: 100%"
                                />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="imagecategory"
                                >Hình ảnh minh họa</label
                                >
                                <input
                                class="form-control"
                                id="imagecategory"
                                name="imagecategory"
                                type="file"
                                style="width: 100%"
                                onchange="previewImageUpdate<?php echo $itemmcategory['id']?>(this)"
                                />
                            </div>
                            <img src="<?php echo $itemmcategory['image']; ?>" alt="Category Image" id="image-preview<?php echo $itemmcategory['id']?>" class="img-fluid mt-2 mb-3" style="max-width:200px; max-height:200px">
                            
                            </div>
                            <div
                            class="modal-footer d-flex flex-row justify-content-center"
                            >
                            <button
                                type="reset"
                                class="btn btn-outline-warning me-5"
                                style="color: red"
                            >
                                HỦY
                            </button>
                            <button type="submit" class="btn btn-outline-warning ms-5">
                                LƯU
                            </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                // Update the image source
                document.getElementById('image-preview<?php echo $itemmcategory['id']?>').src = "<?php echo $itemmcategory['image']; ?>";
                function previewImageUpdate<?php echo $itemmcategory['id']?>(input) {
                    var uploadedImage = document.getElementById('image-preview<?php echo $itemmcategory['id']?>');
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        uploadedImage.src = e.target.result;
                    };

                    if (input.files && input.files[0]) {
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            <div  style="max-height: 700px; overflow-y: auto; overflow-x: hidden;">
            <?php
                include_once("../../controller/seller/getProduct.php");
                $categoryId = $itemmcategory['id'];
                if(isset($_POST['searchproduct'])) {
                    $searchQuery = $_POST['searchproduct'];
                } else {
                    $searchQuery = null;
                }
                $productslist = fetchProductsByCategory($categoryId, $searchQuery);
                foreach ($productslist as $itemmproduct) {
            ?>
            <div class="row border rounded-4 mb-3" >
            <div class="col-lg-3 d-none mt-2 mb-2 d-lg-flex justify-content-center align-items-center">
                <div class="container">
                    <img src="<?php echo $itemmproduct['image']; ?>" class="img-fluid" alt="product image" style="max-height:200px; max-width:200px"/>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-4 d-flex flex-column justify-content-center mt-2 mb-2">
                <div class="d-flex flex-row align-item-center">
                    <a class="mb-2 mt-2 text-decoration-none fw-bold" style="color: black">
                        <span><?php echo $itemmproduct['name']; ?></span> - <span><?php echo $itemmproduct['id']; ?></span></a>
            
                </div>
                <?php
                include_once("../../controller/seller/averageRatingProduct.php");
                $averageStars = getAverageStarsForProduct($itemmproduct['id']);
                ?>
                    <a class="mb-2 mt-2 text-decoration-none" style="color: black"><span><?php echo $itemmproduct['price']; ?></span> đồng -
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFC700" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                        <span><?php echo $averageStars !== null ? $averageStars : '0.0'; ?></span>
                    </a>
                    <a class="mb-2 mt-2 text-decoration-none" style="color: black">Danh mục: <span><?php echo $itemmproduct['typeName']; ?></span></a>
                    <a class="mb-2 mt-2 text-decoration-none" style="color: #aba9a9">Mô tả: <span><?php echo $itemmproduct['description']; ?></span></a>
            </div>
            <?php
                // Calculate the total number of product sales 
                $query_total = "SELECT SUM(quantity) AS total_sold 
                                FROM product_in_order 
                                INNER JOIN orders ON product_in_order.idOrder = orders.id
                                WHERE idProduct = ? AND orders.statusOrder = 'Đã hoàn thành'";
                $stmt = mysqli_prepare($mysqli, $query_total);
                mysqli_stmt_bind_param($stmt, "i", $itemmproduct['id']);
                mysqli_stmt_execute($stmt);
                $result_total = mysqli_stmt_get_result($stmt);
                $sold_total = mysqli_fetch_assoc($result_total);
                $totalsold = $sold_total['total_sold'];

                include_once("../../controller/seller/totalRatingProduct.php");
                $totalrating = getTotalRatingProduct($itemmproduct['id']) ;

            ?>
            <div class="col-12 col-md-5 col-lg-3 d-flex flex-column justify-content-center mt-2 mb-2">
                <a class="mb-2 mt-2 text-decoration-none" style="color: black">Đã bán: <span><?php echo $totalsold !== null ? $totalsold : '0'; ?></span></a>
                <a class="mb-2 mt-2 text-decoration-none" style="color: black">Số lượng còn lại: <span><?php echo $itemmproduct['quantity']; ?></span></a>
                <a class="mb-2 mt-2 text-decoration-none" style="color: black">Số đánh giá: <span><?php echo $totalrating ?></span></a>
                <a class="mb-2 mt-2 text-decoration-none" style="color: black">Trạng thái: 
                    <span><?php echo $itemmproduct['isHidden'] == 0 ? "Đang bán" : "Đã ẩn";?></span>
                </a>
            </div>
            <div class="col-lg-2 col-md-12 col-12 d-flex flex-column justify-content-center mt-2 mb-2">
                <button type="button" class="btn btn-outline-warning mb-2 mt-2" onclick="redirectToProductDetail(<?php echo $itemmproduct['id']; ?>)">THÔNG TIN</button>
                <?php if ($itemmproduct['isHidden'] == 0) { ?>
                    <button type="button" class="btn btn-outline-warning mb-2 mt-2" onclick="hideProduct(<?php echo $itemmproduct['id']; ?>)">ẨN</button>
                    <?php } 
                ?>
                <?php if ($itemmproduct['isHidden'] == 1) { ?>
                    <button type="button" class="btn btn-outline-warning mb-2 mt-2" onclick="showProduct(<?php echo $itemmproduct['id']; ?>)">ĐĂNG BÁN</button>
                    <?php } 
                ?>
                <button type="button" class="btn btn-outline-warning mb-2 mt-2" style="color: red" onclick="deleteProduct(<?php echo $itemmproduct['id']; ?>)">XÓA</button>
            </div>
            </div>
            <?php
                }
            ?>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
    </div>
    </div>
    <!-- content -->
    <script>
    function redirectToAddProduct(productID) {
        window.location.href = "?page=addproduct" ;
    }
    function redirectToProductDetail(productID) {
        window.location.href = "?page=productdetail&productID=" + productID;
    }
    function redirectToProductRate() {
        window.location.href = "./productrate.html";
    }
    function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById("image-preview");

            if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("img-fluid");
                preview.innerHTML = "";
                preview.appendChild(img);
            };

            reader.readAsDataURL(input.files[0]);
            } else {
            preview.innerHTML = "";
            }
        }
    function confirmAddCategory(event) {
        event.preventDefault();
            if (!confirm("Bạn có chắc chắn muốn thêm danh mục mới?")) {
                return;
            }
            const form = event.target;

            if (!validateForm(form)) {
                return;
            }

            const formData = new FormData(form);

            fetch('../../controller/seller/addCategory.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=product";
                    console.log("success");
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    function confirmupdateCategory(event) {
        event.preventDefault();
            if (!confirm("Lưu thay đổi?")) {
                return;
            }
            const form = event.target;

            if (!validateForm2(form)) {
                return;
            }
            
            const formData = new FormData(form);

            const imageInput = form.elements["imagecategory"];
            formData.append('imagecategory', imageInput.files[0]);

            fetch('../../controller/seller/updateCategory.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=product";
                    console.log("success");
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    function validateForm(form) {
            
            var imageInput = form.elements["imagecategory"];
            var imageFile = imageInput.files[0];

            if (imageFile) {
                var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                var maxFileSize = 5 * 1024 * 1024; // 5 MB

                var extension = imageFile.name.split('.').pop().toLowerCase();

                if (!allowedExtensions.includes(extension)) {
                    alert('Please upload an image file (jpg, jpeg, png, gif)');
                    return false;
                }

                if (imageFile.size > maxFileSize) {
                    alert('Maximum file size allowed is 5MB');
                    return false;
                }
            } else {
                alert('Please select an image file');
                return false;
            }
            return true;
        }
        function validateForm2(form) {
            
            var imageInput = form.elements["imagecategory"];
            var imageFile = imageInput.files[0];

            if (imageFile) {
                var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                var maxFileSize = 5 * 1024 * 1024; // 5 MB

                var extension = imageFile.name.split('.').pop().toLowerCase();

                if (!allowedExtensions.includes(extension)) {
                    alert('Please upload an image file (jpg, jpeg, png, gif)');
                    return false;
                }

                if (imageFile.size > maxFileSize) {
                    alert('Maximum file size allowed is 5MB');
                    return false;
                }
            } else {
            }
            return true;
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
                window.location.href = "?page=product";
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
                window.location.href = "?page=product";
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
                window.location.href = "?page=product";
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