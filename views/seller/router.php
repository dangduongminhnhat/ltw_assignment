<?php
        // Kiểm tra nếu có tham số truyền vào từ URL, nếu không, mặc định là trang chính
$page = $_GET['page'] ?? 'mainpage';
$url_pages = [
    'mainpage' => './mainpage.php',
    'order' => './order.php',
    'order_cancel' => './order_cancel.php',
    // 'order_repay' => './order_repay.php',
    'product' => './product.php',
    'addproduct' => './addproduct.php',
    'productdetail' => './productdetail.php',
    'infringingproduct' => './infringingproduct.php',
    // 'venue' => 'venue.php',
    'account' => 'account.php',
    'rate' => 'rate.php',
    // 'voucher' => 'voucher.php',
    // 'voucherdetail' => 'voucherdetail.php',
    // 'addvoucher' => 'addvoucher.php',
    'orderdetail' => 'orderdetail.php',
    'community' => 'community.php',
    'notification' => 'notification.php',
    'listreporteduser' => 'listreporteduser.php'
];
$load_page = $url_pages[$page];

// Include nội dung của trang được yêu cầu
if (file_exists($load_page)) {
    include $load_page;
} else {
    echo '404.php'; // Trang không tồn tại
}
?>