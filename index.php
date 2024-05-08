<?php
session_start();
$router = require_once './core/Routes.php';
$orderIdForPage = '';
$isLogin = isset($_COOKIE["id"]) && isset($_SESSION["id"]) && isset($_SESSION["author"]) && isset($_SESSION["phonemail"]) && isset($_SESSION["phone"]);
if ($isLogin) {
    $author = $_SESSION["author"];
    if ($author == "user") {
        $orderIdForPage = isset($_GET['orderId']) ? $_GET['orderId'] : '';
        $request_uri = isset($_GET['url']) ? $_GET['url'] : '';
        $request_uri = '/' . $request_uri;
        if ($request_uri == '' || $request_uri == '/') {
            $request_uri = '/user/homepage';
        }
    } else {
        header("location: /BTL/views/seller/index.php");
        exit();
    }

} else {
    $pages = array("/user/homepage", "/user/mainpage", "/user/community", "/user/review", "/user/search");
    $request_uri = isset($_GET['url']) ? $_GET['url'] : '';
    $request_uri = '/' . $request_uri;
    if (in_array($request_uri, $pages) == FALSE) {
        header("location: /BTL/user/homepage");
        exit();
    }
}
$router->handle($request_uri, $orderIdForPage);
?>
