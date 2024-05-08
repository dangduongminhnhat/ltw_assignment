<div class="row">
    <!-- content -->
    <div class="col align-items-center justify-content-center mt-3 me-3">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#" class="text-decoration-none" style="color: black"
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
            href="?page=addvoucher"
            class="text-decoration-none"
            style="color: black"
            >Thêm Voucher-Khuyến mãi</a
            >
        </li>
        </ol>
    </nav>
    <form class="ms-5 me-5" onsubmit="logFormData(event)">
        <div class="mb-3">
        <label class="form-label" for="idvoucher">Mã voucher</label>
        <input
            class="form-control"
            id="idvoucher"
            name="idvoucher"
            type="text"
            value="20P50K0021"
            readonly
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="tenvoucher">Tên voucher</label>
        <input
            class="form-control"
            id="tenvoucher"
            name="tenvoucher"
            type="text"
            placeholder="Nhập tên voucher"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="soluongvoucher">Số lượng</label>
        <input
            class="form-control"
            id="soluongvoucher"
            name="soluongvoucher"
            placeholder="Nhập số lượng voucher"
            type="number"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="percent">Giảm %</label>
        <input
            class="form-control"
            id="percent"
            name="percent"
            placeholder="Nhập % giảm"
            type="number"
            required
            style="width: 100%"
            aria-describedby="percenthelp"
        />
        <div id="percenthelp" class="form-text">
            Điền 0 nếu chọn giảm theo tiền
        </div>
        </div>
        <div class="mb-3">
        <label class="form-label" for="maxvalue">Giảm tối đa</label>
        <input
            class="form-control"
            id="maxvalue"
            name="maxvalue"
            placeholder="Nhập giá trị giảm tối đa"
            type="number"
            required
            style="width: 100%"
            aria-describedby="maxvaluehelp"
        />
        <div id="maxvaluehelp" class="form-text">
            Điền nếu chọn giảm theo %, nếu chọn giảm theo tiền thì điền 0
        </div>
        </div>
        <div class="mb-3">
        <label class="form-label" for="discount">Giảm tiền:</label>
        <input
            class="form-control"
            id="discount"
            name="discount"
            placeholder="Nhập giá trị tiền giảm"
            type="number"
            required
            style="width: 100%"
            aria-describedby="discounthelp"
        />
        <div id="discounthelp" class="form-text">
            Điền 0 nếu chọn giảm theo %
        </div>
        </div>
        <div class="mb-3">
        <label class="form-label" for="minvalue"
            >Giá trị đơn hàng tối thiểu được áp dụng</label
        >
        <input
            class="form-control"
            id="minvalue"
            name="minvalue"
            type="number"
            placeholder="Nhập giá trị đơn hàng tối thiểu"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="start">Thời gian bắt đầu</label>
        <input
            class="form-control"
            id="start"
            name="start"
            type="date"
            placeholder="Chọn ngày bắt đầu"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="end">Thời gian kết thúc</label>
        <input
            class="form-control"
            id="end"
            name="end"
            type="date"
            placeholder="Chọn ngày kết thúc"
            required
            style="width: 100%"
        />
        </div>
        <div class="mb-3">
        <label class="form-label" for="status">Tình trạng voucher</label>
        <select
            class="form-select"
            id="status"
            name="status"
            aria-label="Default select example"
        >
            <option value="1">Đang phát</option>
            <option value="0">Ẩn</option>
        </select>
        </div>
        <div class="mb-5">
        <label class="form-label" for="pay">Phương thức thanh toán</label>
        <select
            class="form-select"
            id="pay"
            name="pay"
            aria-label="Default select example"
        >
            <option value="Tất cả hình thức thanh toán">
            Tất cả hình thức thanh toán
            </option>
            <option value="Tiền mặt">Tiền mặt</option>
            <option value="MoMo">MoMo</option>
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
            TẠO VOUCHER
        </button>
        </div>
    </form>
    <script>
        function logFormData(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        var confirmation = confirm(
            "Bạn có chắc chắn muốn thêm voucher mới mới?"
        );
        if (confirmation) {
            for (let pair of formData.entries()) {
            console.log(pair[0] + ": " + pair[1]);
            }
            console.log("Form data will be sent to the server...");
        }
        }
    </script>
    </div>
    <!-- content -->
</div>