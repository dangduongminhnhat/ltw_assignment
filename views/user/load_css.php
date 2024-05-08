<?php
$page = $_SERVER['REQUEST_URI'] ?? '/BTL/user/homepage';
$part = explode('?orderId=', $page);
$check_part = $part[1] ?? '';
$orderIdForPage = NULL;
if (strlen($check_part) > 0) {
    $orderIdForPage = $check_part;
    $page = $part[0];
}
if ($page == '/BTL/') {
    $page = '/BTL/user/homepage';
}

$css_files = [
    '/BTL/user/homepage' => '/BTL/public/css/styles_homepage.css',
    '/BTL/user/userinfo' => '/BTL/public/css/styles_userInfor.css',
    '/BTL/user/orderdetail' => '/BTL/public/css/styles_orderdetail.css',
    '/BTL/user/orders' => '/BTL/public/css/styles_orders.css',
    '/BTL/user/community' => '/BTL/public/css/styles_community.css',
    '/BTL/user/mainpage' => '/BTL/public/css/styles_mainpage.css',
    '/BTL/user/review' => '',
    '/BTL/user/search' => '',
];

$page_css = $css_files[$page];
?>

<link rel="stylesheet" href="<?php echo $page_css; ?>">