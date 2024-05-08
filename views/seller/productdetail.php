<div class="row">
    <!-- content -->
    <div class="col align-items-center justify-content-center mt-3 me-3">
        <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="?page=mainpage" class="text-decoration-none" style="color: black">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="?page=product" class="text-decoration-none" style="color: black">Quản lý sản phẩm</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="?page=productdetail" class="text-decoration-none" style="color: black">Chi tiết sản
                        phẩm</a>
                </li>
            </ol>
        </nav>
        <?php
        include_once ("../../controller/seller/getProductdetail.php");
        $productID = isset($_GET['productID']) ? $_GET['productID'] : null;
        if (!$productID) {
            echo "Product ID is missing!";
            exit;
        }
        $itemm = fetchProductDetailById($productID);
        ?>
        <form class="ms-5 me-5" enctype="multipart/form-data" onsubmit="logFormData(event)">
            <div class="mb-3">
                <label class="form-label" for="idsp">Mã sản phẩm</label>
                <input class="form-control" id="idsp" name="idsp" type="text" value="<?php echo $itemm['id']; ?>"
                    readonly required style="width: 100%" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="tensp">Tên sản phẩm</label>
                <input class="form-control" id="tensp" name="tensp" type="text" value="<?php echo $itemm['name']; ?>"
                    required style="width: 100%" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="category">Danh mục</label>
                <select class="form-select" id="category" name="category" aria-label="Default select example">
                    <?php
                    include_once ("../../model/connectdb.php");
                    $query = "SELECT id, typeName FROM category;";
                    $result = mysqli_query($mysqli, $query);
                    $preselectedCategory = $itemm['idCategory'];
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['id'] == $preselectedCategory) {
                            echo "<option value='" . $row['id'] . "' selected>" . $row['typeName'] . "</option>";
                        } else {
                            echo "<option value='" . $row['id'] . "'>" . $row['typeName'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="price">Giá sản phẩm</label>
                <input class="form-control" id="price" name="price" type="number" value="<?php echo $itemm['price']; ?>"
                    required style="width: 100%" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="soluong">Số lượng còn lại</label>
                <input class="form-control" id="soluong" name="soluong" value="<?php echo $itemm['quantity']; ?>"
                    type="number" required style="width: 100%" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="status">Tình trạng sản phẩm</label>
                <select class="form-select" id="status" name="status" aria-label="Default select example">
                    <option value='1' <?php echo ($itemm['isHidden'] == '1') ? 'selected' : ''; ?>>Đã ẩn</option>
                    <option value='0' <?php echo ($itemm['isHidden'] == '0') ? 'selected' : ''; ?>>Đang bán</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="ship">Phương thức vận chuyển</label>
                <input class="form-control" id="ship" name="ship" value="Cửa hàng tự vận chuyển" type="text" required
                    readonly style="width: 100%" aria-describedby="shiphelp" />
                <div id="shiphelp" class="form-text">
                    Hiện tại chỉ hỗ trợ phương thức này
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">Mô tả</label>
                <input class="form-control" id="description" name="description" type="text"
                    value="<?php echo $itemm['description']; ?>" required style="width: 100%" rows="5"></input>
            </div>
            <div class="mb-5">
                <label class="form-label" for="image">Hình ảnh minh họa sản phẩm</label>
                <input class="form-control" type="file" id="image" onchange="previewImage(this)" />
                <img src="<?php echo $itemm['image']; ?>" alt="Product Image" id="image-preview"
                    class="img-fluid mt-2 mb-3" style="max-width:200px; max-height:200px">
                <!-- <div id="image-preview" class="mt-2"></div>
        </div> -->
                <script>
                    // Update the image source
                    document.getElementById('image-preview').src = "<?php echo $itemm['image']; ?>";
                </script>
                <div class="mb-5 d-flex flex-row justify-content-center">
                    <button type="reset" class="btn btn-outline-warning me-5" style="color: red">
                        HỦY
                    </button>
                    <button type="submit" class="btn btn-outline-warning ms-5">
                        LƯU THAY ĐỔI
                    </button>
                </div>
        </form>
    </div>
    <!-- content -->
    <script>
        function previewImage(input) {
            var uploadedImage = document.getElementById('image-preview');
            var reader = new FileReader();

            reader.onload = function (e) {
                uploadedImage.src = e.target.result;
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }
        // function previewImage(event) {
        //     const input = event.target;
        //     const preview = document.getElementById("image-preview");

        //     if (input.files && input.files[0]) {
        //     const reader = new FileReader();

        //     reader.onload = function (e) {
        //         const img = document.createElement("img");
        //         img.src = e.target.result;
        //         img.classList.add("img-fluid");
        //         preview.innerHTML = "";
        //         preview.appendChild(img);
        //     };

        //     reader.readAsDataURL(input.files[0]);
        //     } else {
        //     preview.innerHTML = "";
        //     }
        // }
        function logFormData(event) {
            event.preventDefault();
            if (!confirm("Lưu thay đổi?")) {
                return;
            }
            const form = event.target;

            if (!validateForm(form)) {
                return;
            }

            const formData = new FormData(form);

            const imageInput = form.elements["image"];
            formData.append('image', imageInput.files[0]);

            fetch('../../controller/seller/updateProductdetail.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (response.ok) {
                        // window.location.href = "?page=product";
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
            var price = form.elements["price"].value;
            var quantity = form.elements["soluong"].value;
            var description = form.elements["description"].value;
            var imageInput = form.elements["image"];
            var imageFile = imageInput.files[0];

            if (description.length > 2500) {
                alert('Please limit description (2500 characters)');
                return false;
            }
            if (price < 1000) {
                alert('Please enter a valid price (>= 1000)');
                return false;
            }
            if (quantity < 0) {
                alert('Please enter a valide quantity (>= 0)');
                return false;
            }
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
                // alert('Please select an image file');
                // return false;
            }
            return true;
        }
    </script>
</div>