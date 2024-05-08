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
            href="?page=voucher"
            class="text-decoration-none"
            style="color: black"
            >Voucher</a
            >
        </li>
        </ol>
    </nav>
    <div>
        <div class="d-flex flex-row align-items-center">
        <button
            type="button"
            class="btn btn-outline-warning"
            onclick="redirectToAddVoucher()"
        >
            THÊM VOUCHER/KHUYẾN MÃI
        </button>
        </div>
        <div class="justify-content-center mt-4">
        <div class="row border rounded-4">
            <div
            class="col-12 col-md-8 col-lg-7 mt-2 mb-2 d-flex flex-column justify-content-center"
            >
            <div class="d-flex flex-row align-item-center">
                <a
                class="mb-2 mt-2 text-decoration-none fw-bold"
                style="color: black"
                ><span>Giảm 10% Giảm tối đa 50K</span>
                (<span>20P50K0021</span>)</a
                >
                <div class="dropdown d-lg-none d-flex ms-1">
                <button
                    type="button"
                    class="dropdown-toggle border-0 bg-transparent"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    fill="#FCC700"
                    class="bi bi-three-dots"
                    viewBox="0 0 16 16"
                    >
                    <path
                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"
                    />
                    </svg>
                </button>
                <ul class="dropdown-menu">
                    <li>
                    <a class="dropdown-item" href="?page=voucherdetail"
                        >THÔNG TIN</a
                    >
                    </li>
                    <li>
                    <a class="dropdown-item" onclick="deleteVoucher()"
                        >XÓA</a
                    >
                    </li>
                </ul>
                </div>
            </div>
            <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Đơn tối thiểu: <span>90000</span>đ</a
            >
            <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Giảm %: <span>10%</span> - Giảm tối đa:
                <span>50000</span>đ</a
            >
            <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Giảm tiền: <span>0</span>đ</a
            >
            <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Thời gian áp dụng: <span>28/09/2023</span> -
                <span>28/09/2024</span></a
            >
            <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Phương thức thanh toán:
                <span>Mọi hình thức thanh toán</span></a
            >
            </div>
            <div
            class="col-12 col-md-4 col-lg-3 d-flex flex-column justify-content-center mt-2 mb-2"
            >
            <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Đã sử dụng: <span>200</span></a
            >
            <a class="mb-2 mt-2 text-decoration-none" style="color: black"
                >Số lượng còn lại: <span>200</span></a
            >
            </div>
            <div
            class="col-lg-2 d-none d-lg-flex flex-column justify-content-center mt-2 mb-2"
            >
            <button
                type="button"
                class="btn btn-outline-warning border-black mb-2 mt-2"
                onclick="redirectToVoucherDetail()"
            >
                SỬA
            </button>
            <button
                type="button"
                class="btn btn-outline-warning mb-2 mt-2"
                style="color: red"
                onclick="deleteVoucher()"
            >
                XÓA
            </button>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- content -->
    <script>
    function redirectToAddVoucher() {
        window.location.href = "?page=addvoucher";
    }
    function redirectToVoucherDetail() {
        window.location.href = "?page=voucherdetail";
    }
    function deleteVoucher() {
        var confirmation = confirm(
        "Bạn có chắc chắn muôn xóa voucher 'ABC'?"
        );
        if (!confirmation) {
        event.preventDefault();
        }
    }
    </script>
</div>