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
            href="?page=account"
            class="text-decoration-none"
            style="color: black"
            >Marketing</a
            >
        </li>
        <li class="breadcrumb-item">
            <a
            href="?page=account"
            class="text-decoration-none"
            style="color: black"
            >Quản lý tài khoản</a
            >
        </li>
        </ol>
    </nav>
    <div class="d-flex flex-row align-items-center justify-content-center">
        <a
        class="fw-bold fs-4 text-decoration-none align-items-center justify-content-center"
        style="color: black"
        >THÔNG TIN QUÁN</a
        >
    </div>
    <?php
        include_once("../../controller/seller/getAccountdetail.php");
        $accountID = "1";
        $itemm = fetchAccountdetail($accountID);
    ?>
    <div class="d-flex flex-row align-items-center ms-5">
        <img
        src="/BTL/public/images/logo.png"
        alt="logo unieat"
        width="100"
        height="100"
        />
        <a class="ms-5 text-decoration-none" style="color: black"
        >MTK: <span><?php echo $itemm['idAccount']; ?></span></a
        >
    </div>
    <form class="ms-5 me-5 mt-3" onsubmit=" logFormData(event)">
        <div class="mb-3">
        <label class="form-label" for="account">Tên đăng nhập</label>
        <input
            class="form-control"
            id="account"
            name="account"
            type="text"
            value="<?php echo $itemm['userName']; ?>"
            placeholder="Nhập tên tài khoản"
            required
            style="width: 100%"
            autocomplete="username"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="passw">Mật khẩu</label>
        <input
            class="form-control"
            id="passw"
            name="passw"
            type="password"
            value="<?php echo $itemm['pass']; ?>"
            placeholder="Nhập mật khẩu"
            required
            style="width: 100%"
            autocomplete="current-password"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="nameshop">Tên quán</label>
        <input
            class="form-control"
            id="nameshop"
            name="nameshop"
            type="text"
            value="<?php echo $itemm['nameStore']; ?>"
            placeholder="Nhập tên quán"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="emailcontact">Email liên hệ</label>
        <input
            class="form-control"
            id="emailcontact"
            name="emailcontact"
            type="email"
            placeholder="Nhập mail liên hệ"
            value="<?php echo $itemm['email']; ?>"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="phonecontact"
            >Số điện thoại liên hệ</label
        >
        <input
            class="form-control"
            id="phonecontact"
            name="phonecontact"
            type="number"
            placeholder="Nhập số điện thoại liên hệ"
            value="<?php echo $itemm['phone']; ?>"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="address">Địa chỉ</label>
        <input
            class="form-control"
            id="address"
            name="address"
            type="text"
            placeholder="Nhập liên kết facebook của quán"
            value="<?php echo $itemm['address']; ?>"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="fblink">Liên kết facebook</label>
        <input
            class="form-control"
            id="fblink"
            name="fblink"
            type="text"
            placeholder="Nhập liên kết facebook của quán"
            value="<?php echo $itemm['facebook']; ?>"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="instalink">Liên kết instagram</label>
        <input
            class="form-control"
            id="instalink"
            name="instalink"
            type="text"
            placeholder="Nhập liên kết instagram của quán"
            value="<?php echo $itemm['instagram']; ?>"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="tiktoklink">Liên kết tiktok</label>
        <input
            class="form-control"
            id="tiktoklink"
            name="tiktoklink"
            type="text"
            placeholder="Nhập liên kết tiktok của quán"
            value="<?php echo $itemm['tiktok']; ?>"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="money">Tiền vốn</label>
        <input
            class="form-control"
            id="money"
            name="money"
            type="text"
            placeholder="Nhập liên kết tiktok của quán"
            value="<?php echo $itemm['money']; ?>"
            required min="0"
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="status">Tình trạng quán</label>
        <select
            class="form-select"
            id="status"
            name="status"
            aria-label="Default select example"
        >
            <option value="0" <?php echo ($itemm['isClose'] == '0') ? 'selected' : ''; ?>>Mở cửa</option>
            <option value="1" <?php echo ($itemm['isClose'] == '1') ? 'selected' : ''; ?>>Đóng cửa</option>
        </select>
        </div>
        <div class="mb-5 d-flex flex-row justify-content-center">
        <button
            type="reset"
            class="btn btn-outline-warning me-5"
            style="color: red"
        >
            HỦY
        </button>
        <button type="submit" class="btn btn-outline-warning ms-5">
            LƯU THAY ĐỔI
        </button>
        </div>
    </form>
    <script>
        function logFormData(event) {
            event.preventDefault();
            var form = event.target;

            if (!validateForm(form)) {
                return;
            }

            if (!confirm("Lưu thay đổi?")) {
                return;
            }

            var formData = new FormData(form);

            fetch('../../controller/seller/updateAccountdetail.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=account";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function validateForm(form) {
            var email = form.elements["emailcontact"].value;
            var phone = form.elements["phonecontact"].value;
            var money = form.elements["money"].value;

            if (!/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/.test(email)) {
                alert('Please enter a valid email address (<sth>@<sth>.<sth>)');
                return false;
            }
            if (phone.length > 11 || phone.length < 9) {
                alert('Please eneter a valid phone number (9-11 number)');
                return false;
            }
            if (money < 0){
                alert('Please enter a valid money (> 0)');
                return false;
            }
            return true;
        }
    </script>
    </div>
</div>