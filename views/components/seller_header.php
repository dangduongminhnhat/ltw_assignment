<?php
include_once("../../model/connectdb.php");
$query = "SELECT sellers.tiktok, sellers.instagram, sellers.facebook, sellers.nameStore, sellers.address,
                    accounts.phone, accounts.email
            FROM accounts
            INNER JOIN sellers ON accounts.id = sellers.idAccount
            WHERE sellers.idAccount = 1";
$result = mysqli_query($mysqli, $query);
$info = mysqli_fetch_assoc($result);

$query1 = "SELECT COUNT(*) as unreadnoti FROM notify 
                  WHERE idAccount = 1 AND isRead = 0";
$result1 = mysqli_query($mysqli, $query1);
$unreadnoti = mysqli_fetch_assoc($result1);
?>

<header id="header" class="container-fluid shadow p-3">
  <div class="row d-flex align-items-center justify-content-center mt-2">
    <div class="col-10 col-md-5 col-lg-5 align-items-center justify-content-center d-lg-flex d-md-flex">
      <button class="border-0 bg-transparent btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#FFC700" class="bi bi-list" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
        </svg>
      </button>
      <a href="?page=mainpage" class="fs-2 fw-bold text-decoration-none " style="color: #FFC700;"><?php echo $info['nameStore'] ?> <span style="color: red;">For Seller</span></a>
    </div>
    <!-- <div class="col-6 col-md-6 col-lg-4 align-items-center justify-content-center d-lg-flex">
          <input class="form-control" type="text" placeholder="Tìm kiếm sản phẩm/đơn hàng">
      </div> -->
    <div class="col-lg-5 col-md-5 align-items-center justify-content-center d-none d-md-flex d-lg-flex">
      <a href="?page=account" class="fw-bold text-decoration-none text-center" style="color: black;">Xin chào, <span class="fs-4" style="color:#FFC700"><?php echo $info['nameStore'] ?></span></a>
    </div>
    <div class="col-2 col-md-2 col-lg-2 align-items-center justify-content-center d-flex">
      <button type="button" class="border-0 bg-transparent position-relative" onclick="redirectToNofications()">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FFC700" class="bi bi-bell-fill" viewBox="0 0 16 16">
          <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
        </svg>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger">
          <?php echo $unreadnoti['unreadnoti'] ?>
        </span>
      </button>
     
<button type="button" class="ms-4 border-0 bg-transparent position-relative" onclick="signOut()">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FFC700" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
</svg>
      </button>
      <script>
        function redirectToNofications() {
          window.location.href = "?page=notification";
        }

        function signOut() {
          fetch("/BTL/controller/default/signout.php", {
              method: "POST",
            })
            .then((response) => {
              if (!response.ok) {
                throw new Error("Network response was not ok");
              }
              return response.json();
            })
            .then((data) => {
              window.location = "/BTL/user/homepage";
            })
            .catch((error) => {
              console.log(error);
              alert("Error submitting form. Please try again later.");
            });
        }
      </script>
    </div>
  </div>
  <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel" style="height:100vh;">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">
        Menu cho seller
      </h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="container-fluid" style="margin-bottom: 50px">
      <div class="row">
        <div class="col">
          <div class="overflow-auto" style="max-height: 100vh">
            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="accordion-item border-top-0">
                <h2 class="accordion-header">
                  <button class="accordion-button bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FFC700" class="bi bi-journal-text" viewBox="0 0 16 16">
                      <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                      <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                      <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                    </svg>
                    <span style="
                        margin-left: 10px;
                        margin-right: 10px;
                        color: black;
                      ">Quản lý đơn hàng</span>
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                  <div class="accordion-body">
                    <div class="list-group">
                      <a href="?page=order" class="list-group-item list-group-item-action border-0">Tất cả đơn hàng</a>
                      <a href="?page=order_cancel" class="list-group-item list-group-item-action border-0">Đơn đã hủy</a>
                      <!-- <a
                        href="?page=order_repay"
                        class="list-group-item list-group-item-action border-0"
                        >Đơn hoàn tiền/trả lại</a
                      > -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FFC700" class="bi bi-bag" viewBox="0 0 16 16">
                      <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                    </svg>
                    <span style="
                        margin-left: 10px;
                        margin-right: 10px;
                        color: black;
                      ">Quản lý sản phẩm</span>
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                  <div class="accordion-body">
                    <div class="list-group">
                      <a href="?page=product" class="list-group-item list-group-item-action border-0">Sản phẩm hiện tại</a>
                      <a href="?page=addproduct" class="list-group-item list-group-item-action border-0">Thêm sản phẩm</a>
                      <a href="?page=infringingproduct" class="list-group-item list-group-item-action border-0">Sản phẩm vi phạm</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="accordion-item">
                <h2 class="accordion-header">
                  <button
                    class="accordion-button bg-transparent"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapseFour"
                    aria-expanded="false"
                    aria-controls="panelsStayOpen-collapseThree"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="25"
                      height="25"
                      fill="#FFC700"
                      class="bi bi-wallet2"
                      viewBox="0 0 16 16"
                    >
                      <path
                        d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"
                      />
                    </svg>
                    <span
                      style="
                        margin-left: 10px;
                        margin-right: 10px;
                        color: black;
                      "
                      >Tài chính</span
                    >
                  </button>
                </h2>
                <div
                  id="panelsStayOpen-collapseFour"
                  class="accordion-collapse collapse show"
                >
                  <div class="accordion-body">
                    <div class="list-group">
                      <a
                        href="?page=venue"
                        class="list-group-item list-group-item-action border-0"
                        >Doanh thu</a
                      >
                    </div>
                  </div>
                </div> 
              </div>-->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FCC700" class="bi bi-tags" viewBox="0 0 16 16">
                      <path d="M3 2v4.586l7 7L14.586 9l-7-7zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586z" />
                      <path d="M5.5 5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1z" />
                    </svg>
                    <span style="
                        margin-left: 10px;
                        margin-right: 10px;
                        color: black;
                      ">Marketing</span>
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show">
                  <div class="accordion-body">
                    <div class="list-group">
                      <a href="?page=account" class="list-group-item list-group-item-action border-0">Quản lý tài khoản</a>
                      <a href="?page=rate" class="list-group-item list-group-item-action border-0">Đánh giá và nhận xét</a>
                      <!-- <a
                        href="?page=voucher"
                        class="list-group-item list-group-item-action border-0"
                        >Voucher/Khuyến mãi</a
                      >
                      <a
                        href="?page=addvoucher"
                        class="list-group-item list-group-item-action border-0"
                        >Thêm Voucher/Khuyến mãi</a
                      > -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item border-bottom-0">
                <h2 class="accordion-header">
                  <button class="accordion-button bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#FCC700" class="bi bi-chat-dots" viewBox="0 0 16 16">
                      <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                      <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2" />
                    </svg>
                    <span style="
                        margin-left: 10px;
                        margin-right: 10px;
                        color: black;
                      ">Giao tiếp</span>
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse show">
                  <div class="accordion-body" style="margin-bottom: 100px">
                    <div class="list-group">
                      <a href="?page=community" class="list-group-item list-group-item-action border-0">Trang cộng đồng</a>
                      <a href="?page=notification" class="list-group-item list-group-item-action border-0">Thông báo</a>
                      <a href="?page=listreporteduser" class="list-group-item list-group-item-action border-0">Danh sách khách hàng bị chặn</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>