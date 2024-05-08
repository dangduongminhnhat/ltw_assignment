<?php
if ($isLogin) {
  $thisUser = Header::getUser($_SESSION["id"]);
  $isReported = $thisUser["isReported"];
}
include_once("model/connectdb.php");
$query = "SELECT sellers.tiktok, sellers.instagram, sellers.facebook, sellers.nameStore, sellers.address,
                    accounts.phone, accounts.email
            FROM accounts
            INNER JOIN sellers ON accounts.id = sellers.idAccount
            WHERE sellers.idAccount = 1";
$result = mysqli_query($mysqli, $query);
$info = mysqli_fetch_assoc($result);
?>
<div class="row">
  <div class="col" style="max-width: 20%; display: flex; align-items: center">
    <button style="background: white; border: 0px" onclick="sidebar_open()">
      <img
        src="/BTL/public/images/Vector.png"
        style="padding-left: 7px; height: 20px"
        alt=""
      />
    </button>
    <h3 class="uni-header" style="margin-top: 0px"><strong><?php echo $info["nameStore"]; ?></strong></h3>
  </div>
  <div class="col" style="display: flex; align-items: center">
  </div>
  <div class="col icon-header icon-nav">
    <?php 
    if ($isLogin) {
      echo '<div class="address-note">
              <span
                class="iconify"
                data-icon="fluent-emoji-high-contrast:telephone"
                style="color: red"
              ></span>
              <div style="display: inline; padding-left: 3px">Hotline: 0123456789</div>
            </div>
            <div class="market-icon">
              <button
                style="background: white; border: 0px"
                data-bs-toggle="modal"
                data-bs-target="#market"
              >
                <span
                  class="iconify"
                  data-icon="map:grocery-or-supermarket"
                  style="color: #ffc700; width: 30px; height: 30px"
                ></span>';
      if (count($product_in_cart) > 0) {
        echo '<div class="circle-number">';
        echo count($product_in_cart);
        echo '</div>';
      }
      echo '    </button>
            </div>';
    } else {
      echo '<div style="height: 100%; margin-right: 20px">
              <button style="background:  #FFC700; display: flex; align-items: center; border-radius: 20px; height: 100%" onclick="reDirectLogin()"> 
                <span
                  class="iconify"
                  data-icon="mdi:person"
                  style="color: black"
                ></span>
                <strong> LOGIN </strong> 
              </button>
            </div>
            <div style="height: 100%">
              <button style="background: black; display: flex; align-items: center; border-radius: 20px; height: 100%" onclick="reDirectSignUp()"> 
                <strong style="color: white"> SIGNUP </strong> 
              </button>
            </div>';
    }
    ?>
  </div>
</div>
<div class="modal" id="market">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="padding-left: 30px; padding-right: 30px">
      <!-- Modal body -->
      <div class="modal-body">
        <div style="text-align: center; margin-top: 10px">
          <h3><strong>Giỏ hàng <?php echo $info["nameStore"]; ?></strong></h3>
        </div>
        <hr />
        <div
          class="address-note"
          style="
            height: 40px;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
          "
        >
          <span
            class="iconify"
            data-icon="fluent-emoji-high-contrast:telephone"
            style="color: red"
          ></span>
          <div style="display: inline; padding-left: 3px">Hotline: 0123456789</div>
        </div>
        <h5><strong>Tóm tắt đơn hàng</strong></h5>
        <?php
          if ($isLogin) {
            if (count($product_in_cart) > 0) {
              echo '<form id="cart-form">';
              $size = count($product_in_cart);
              for ($i = 0; $i < $size; $i ++) {
                $product = Header::getProductById($product_in_cart[$i]["idProduct"]);
                echo '<input type="hidden" name="product_ids[]" value="' . $product_in_cart[$i]["id"] . '">';
                echo '<div';
                echo '  class="container container-border-modal"';
                echo '  style="padding-top: 20px; padding-bottom: 20px"';
                echo '>';
                echo '  <div class="row" style="display: flex; align-items: center">';
                echo '    <div class="col number-food">';
                echo '      <button';
                echo '        type="button"';
                echo '        class="minus-button"';
                echo '        style="border: none; background: white; padding: 0"';
                echo '        onclick="decrease_number(' . $i . ')"';
                echo '      >';
                echo '        <span';
                echo '          class="iconify"';
                echo '          data-icon="mdi:minus-box-outline"';
                echo '          style="color: #ffc700; height: 30px; width: 30px"';
                echo '        ></span>';
                echo '      </button>';
                echo '      <div style="text-align: center; width: 30px">';
                echo '        <strong';
                echo '          class="number-order"';
                echo '          style="margin-left: 10px; margin-right: 10px"';
                echo '          >' . $product_in_cart[$i]["quantity"] . '</strong';
                echo '        >';
                echo '        <input type="hidden" class="numberofitem" name="quantity[]" value="' . $product_in_cart[$i]["quantity"] . '">';
                echo '      </div>';
                echo '      <button';
                echo '        type="button"';
                echo '        class="plus-button"';
                echo '        style="border: none; background: white; padding: 0"';
                echo '        onclick="increase_number(' . $i . ', ' . $product["quantity"] . ')"';
                echo '      >';
                echo '        <span';
                echo '          class="iconify"';
                echo '          data-icon="mdi:plus-box-outline"';
                echo '          style="color: #ffc700; height: 30px; width: 30px"';
                echo '        ></span>';
                echo '      </button>';
                echo '    </div>';
                echo '    <div class="col form-food">';
                echo '      <img src="' . $product["image"] . '" alt="" style="height: 75px; width: 75px" />';
                echo '      <div style="margin-left: 20px">';
                echo '        <div>';
                echo '          <strong>' . $product["name"] . '</strong>';
                echo '        </div>';
                echo '        <div class="note-style">' . $product_in_cart[$i]["note"] . '</div>';
                echo '      </div>';
                echo '    </div>';
                echo '    <div class="col price-food">' .$product["price"] . 'đ/món</div>';
                echo '  </div>';
                echo '</div>';
              }
              echo '    <h5><strong>Thông tin hóa đơn</strong></h5>';
              echo '</div>';
              echo '<div class="container container-border-modal" style="padding-top: 20px; padding-bottom: 20px">';
              echo '    <div class="linkStyleColor">Phương thức thanh toán</div>';
              echo '    <select class="form-select" style="border-radius: 20px" name="payment">';
              echo '        <!-- <option selected>Open this select menu</option> -->';
              echo '        <option value="1">Tiền mặt</option>';
              echo '        <option value="2">Chuyển khoản</option>';
              echo '    </select>';
              echo '    <div class="linkStyleColor">Vị trí</div>';
              echo '    <select class="form-select" style="border-radius: 20px" name="address">';
              echo '        <!-- <option selected>Open this select menu</option> -->';
              echo '        <option value="1">KTX Khu A</option>';
              echo '        <option value="2">KTX Khu B</option>';
              echo '    </select>';
              echo '</div>';
              echo '<div class="container container-border-modal" style="padding-top: 20px; padding-bottom: 10px; margin-bottom: 20px">';
              echo '    <div class="row" style="margin-bottom: 10px">';
              echo '        <div class="col">';
              echo '            <h5>TỔNG CỘNG</h5>';
              echo '        </div>';
              echo '        <div class="col" style="text-align: right">';
              echo '            <h5 id="sum-price">115.400 <u style="padding-left: 3px">đ</u></h5>';
              echo '            <input type="hidden" name="total" value="" id="sum-price-hidden">';
              echo '        </div>';
              echo '    </div>';
              echo '    <button type="submit" class="btn" style="background: #ffc700; width: 100%; border-radius: 20px" data-bs-dismiss="modal">';
              echo '        Đặt đơn';
              echo '    </button>';
              echo '</div>';
              echo '            <input type="hidden" name="isReprted" value="' . $isReported . '" id="isReported">';
              echo '</form>';
            } else {
              echo '<div style="text-align: center; margin-top: 10px">';
              echo '  <h5><strong>Chưa có đơn hàng</strong></h5>';
              echo '</div>';
            }
          }
        ?>
      </div>
    </div>
  </div>
</div>
<div class="blur" id="blur-sidebar" onclick="sidebar_close()"></div>
<div class="sidebar" id="mySidebar">
  <div
    class="modal-body"
    style="
      padding-left: 35px;
      padding-right: 35px;
      margin-top: 20px;
      height: 100vh;
    "
  > 
    <?php
    if ($isLogin) {
      $userId = $_SESSION["id"];
      $user = Header::getUserById($userId);
      echo '<div style="display: flex">
              <div style="display: flex; align-items: center">
                <img
                  src="/BTL/public/images/Avatar-Profile-PNG-Photos 1.png"
                  alt=""
                  style="height: 55px; width: 55px"
                />
              </div>
              <div style="margin-left: 40px; display: flex; align-items: center">
                <div>
                  <div>
                    <h5><strong>' . $user["userName"] . '</strong></h5>
                  </div>
                  <div>
                    <a href="/BTL/user/userinfo" class="linkStyleColor" style="font-size: small"
                      >Quản lý tài khoản</a
                    >
                  </div>
                </div>
              </div>
            </div>
            <hr />';
    }
    ?>
    <div class="container container-border-modal">
      <div style="display: flex; justify-content: center">
        <div>
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="ci:main-component"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="/BTL/user/homepage"
                style="text-decoration: none; color: black; font-size: small"
                >Trang chủ</a
              >
            </div>
          </div>
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="material-symbols:rate-review"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="/BTL/user/mainpage"
                style="text-decoration: none; color: black; font-size: small"
                >Danh mục sản phẩm</a
              >
            </div>
          </div>
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="ant-design:product-filled"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="/BTL/user/review"
                style="text-decoration: none; color: black; font-size: small"
                >Đánh giá và nhận xét</a
              >
            </div>
          </div>
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="icomoon-free:search"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="/BTL/user/search"
                style="text-decoration: none; color: black; font-size: small"
                >Tìm kiếm sản phẩm</a
              >
            </div>
          </div>
          <?php
          if ($isLogin) {
            echo'
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="mingcute:bill-fill"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="/BTL/user/orders"
                style="text-decoration: none; color: black; font-size: small"
                >Đơn hàng</a
              >
            </div>
          </div>
          ';
          }
          ?>
          <div class="item-menu">
            <span
              class="iconify"
              data-icon="fluent:people-community-16-filled"
              style="color: #ffc700; height: 25px; width: 25px"
            ></span>
            <div style="margin-left: 10px">
              <a
                href="/BTL/user/community"
                style="text-decoration: none; color: black; font-size: small"
                >Cộng đồng</a
              >
            </div>
          </div>
          <div
            style="
              text-align: center;
              margin-top: 10px;
              font-size: small;
              margin-bottom: 10px;
            "
          >
            <?php
            if ($isLogin) {
              echo '
            <a href="#" style="color: #ff0000" onclick="signOut()">
              <strong>Sign Out</strong>
            </a>
              ';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="icon-sidebar" style="justify-content: center; margin-top: 20px">
      <div style="display: flex">
        <span
          class="iconify"
          data-icon="f7:bell-fill"
          style="color: #ffc700; width: 30px; height: 30px"
        ></span>
        <div style="position: relative; margin-left: 20px">
          <button
            style="background: white; border: 0px"
            data-bs-toggle="modal"
            data-bs-target="#market"
          >
            <span
              class="iconify"
              data-icon="map:grocery-or-supermarket"
              style="color: #ffc700; width: 30px; height: 30px"
            ></span>
            <?php
            if ($isLogin) {
              if (count($product_in_cart) > 0) {
                echo '<div class="circle-number">';
                echo count($product_in_cart);
                echo '</div>';
              }
            }
            ?>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
