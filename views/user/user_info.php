<div class="row">
    <!-- content -->
    <div class="col align-items-center justify-content-center mt-3 me-3">
    <div class="d-flex flex-row align-items-center justify-content-center">
        <a
        class="fw-bold fs-4 text-decoration-none align-items-center justify-content-center"
        style="color: black"
        >THÔNG TIN TÀI KHOẢN</a
        >
    </div>
    <div class="d-flex flex-row align-items-center ms-5">
        <img
        src="/BTL/public/images/logo.png"
        alt="logo unieat"
        width="100"
        height="100"
        />
        <a class="ms-5 text-decoration-none" style="color: black"
        >MTK: <span><?php echo $itemm['id']; ?></span></a
        >
    </div>
    <form class="ms-5 me-5 mt-3" onsubmit="logFormData(event)">
        <div class="mb-3">
        <label class="form-label" for="account">Tên đăng nhập</label>
        <input
            class="form-control"
            id="account"
            name="account"
            type="text"
            value="<?php echo $itemm["userName"]; ?>"
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
            value=""
            placeholder="Nhập mật khẩu"
            required
            style="width: 100%"
            autocomplete="current-password"
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

            const formData = {
                "username": form.elements["account"].value,
                "phone": form.elements["phonecontact"].value,
                "mail": form.elements["emailcontact"].value,
                "pass": form.elements["passw"].value,
            }
            fetch('../controller/user/updateAccountdetail.php', {
                method: 'POST',
                headers: {
                'Content-Type': 'application/json' 
                },
                body: JSON.stringify(formData)
            })
            .then(response =>response.json())
            .then(response => {
                if(response['Update successful']){
                    alert("Update successfull, login please.")
                    window.location.reload();
                }
                else{
                    alert("Update failed.");
                    alert(response)
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error)
            });
        }

        function validateForm(form) {
            var email = form.elements["emailcontact"].value;
            var phone = form.elements["phonecontact"].value;
            var pass = form.elements["passw"].value;

            if (!/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/.test(email)) {
                alert('Please enter a valid email address (<sth>@<sth>.<sth>)');
                return false;
            }
            if (phone.length > 11 || phone.length < 9) {
                alert('Please eneter a valid phone number (9-11 number)');
                return false;
            }
            if (pass.trim() === ''|| pass.length < 8 || !/[a-z]/.test(pass) || !/[A-Z]/.test(pass) || !/\d/.test(pass) || !/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(pass)){
                alert('Please enter a valid passsword');
                return false;
            }
            return true;
        }
    </script>
    </div>
</div>