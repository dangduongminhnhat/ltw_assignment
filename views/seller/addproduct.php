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
            href="?page=addproduct"
            class="text-decoration-none"
            style="color: black"
            >Thêm sản phẩm mới</a
            >
        </li>
        </ol>
    </nav>
        <?php
            include_once("../../model/connectdb.php");
            $query = "SELECT MAX(id) AS max_id FROM product";
            $result = mysqli_query($mysqli, $query);
            $row = mysqli_fetch_assoc($result);
            $next_id = $row['max_id'] + 1;
        ?>
    <form class="ms-5 me-5" enctype="multipart/form-data" onsubmit="logFormData(event)">
        <div class="mb-3">
            <label class="form-label" for="idsp">Mã sản phẩm</label>
            <input class="form-control" id="idsp" name="idsp" type="number" value="<?php echo $next_id; ?>" readonly required style="width: 100%;">
        </div>
        <div class="mb-3">
            <label class="form-label" for="tensp">Tên sản phẩm</label>
            <input class="form-control" id="tensp" name="tensp" type="text" placeholder="Nhập tên sẩn phẩm" required style="width: 100%;">
        </div>
        <div class="">
            <label class="form-label" for="category">Danh mục</label>
            <select
                class="form-select"
                id="category"
                name="category"
                aria-label="Default select example"
            >
            <?php
                $query = "SELECT id, typeName FROM category;";
                $result = mysqli_query($mysqli,$query);
                while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<option value='{$row['id']}'>{$row['id']} ({$row['typeName']})</option>";
                    }
                echo "</select><br>";
            ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Giá sản phẩm</label>
            <input class="form-control" id="price" name="price" type="number" placeholder="Nhập giá sản phẩm" required style="width: 100%;">
        </div>
        <div class="mb-3">
            <label class="form-label" for="soluong">Số lượng</label>
            <input class="form-control" id="soluong" name="soluong" value="0" type="number" required readonly style="width: 100%;" aria-describedby="numberhelp">
            <div id="numberhelp" class="form-text">Hãy thay đổi số lượng sau khi thêm sản phẩm thành công</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="status">Tình trạng sản phẩm</label>
            <select class="form-select" id="status" name="status" aria-label="Default select example">
                <option value="0">Đang bán</option>
                <option value="1">Ẩn</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="ship">Phương thức vận chuyển</label>
            <input class="form-control" id="ship" name="ship" value="Cửa hàng tự vận chuyển" type="text"
                required readonly style="width: 100%;" aria-describedby="shiphelp">
            <div id="shiphelp" class="form-text">Hiện tại chỉ hỗ trợ phương thức này</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description"
                placeholder="Nhập mô tả cho sản phẩm" required style="width: 100%;" rows="5"></textarea>
        </div>
        <div class="mb-5">
        <!-- accept="image/*" -->
            <label class="form-label" for="image">Hình ảnh minh họa sản phẩm</label>
            <input class="form-control" type="file" id="image" name="image" required onchange="previewImage(event)">
            <div id="image-preview" class="mt-2" style="max-height:200px; max-width:200px"></div>
        </div>
        <script>
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
        </script>
        <div class="mb-5 d-flex flex-row justify-content-center">
        <button
            type="reset"
            class="btn btn-outline-warning me-5"
            style="color: red"
        >
            HỦY
        </button>
        <button type="submit" class="btn btn-outline-warning ms-5">
            THÊM SẢN PHẨM
        </button>
        </div>
    </form>
    <script>
        function logFormData(event) {
            event.preventDefault();
            if (!confirm("Bạn có chắc chắn muốn thêm sản phẩm mới?")) {
                return;
            }
            const form = event.target;

            if (!validateForm(form)) {
                return;
            }
            const formData = new FormData(form);

            fetch('../../controller/seller/addProduct.php', {
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
            var price = form.elements["price"].value;
            var description = form.elements["description"].value;
            var imageInput = form.elements["image"];
            var imageFile = imageInput.files[0];

            if (description.length > 2500) {
                alert('Please limit description (2500 characters)');
                return false;
            }
            if (price < 1000){
                alert('Please enter a valid price (>= 1000)');
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
                alert('Please select an image file');
                return false;
            }
            return true;
        }
    </script>
    </div>
</div>