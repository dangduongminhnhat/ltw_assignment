<?php
require_once 'model/user/Homepage.php';
require_once 'model/user/Mainpage.php';
require_once 'model/user/Orders.php';
require_once 'model/user/Orderdetail.php';
require_once 'model/user/Community.php';
require_once 'model/user/Userinfo.php';
require_once 'model/user/Header.php';

class UserController {
    public $orderIdForPage;

    function __construct($orderIdForPage) {
        $this->orderIdForPage = $orderIdForPage;
    }

    public function homepage() {
        $products = Homepage::getAllProducts();
        $categories = Homepage::getAllCategories();
        $isLogin = isset($_COOKIE["id"]) && isset($_SESSION["id"]) && isset($_SESSION["author"]) && isset($_SESSION["phonemail"]) && isset($_SESSION["phone"]);
        if ($isLogin) {
            $product_in_cart = Header::getProductInCart();
        } else {
            $product_in_cart = NULL;
        }

        ob_start();
        require_once 'views/user/homepage.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function mainpage() {
        $products = Mainpage::getAllProducts();
        $categories = Mainpage::getAllCategories();
        $isLogin = isset($_COOKIE["id"]) && isset($_SESSION["id"]) && isset($_SESSION["author"]) && isset($_SESSION["phonemail"]) && isset($_SESSION["phone"]);
        if ($isLogin) {
            $product_in_cart = Header::getProductInCart();
        } else {
            $product_in_cart = NULL;
        }

        $pro_in_cat = [];
        for ($i = 1; $i <= count($categories); $i ++) {
            $pro_in_cat[$i] = [];
        }
        for ($i = 0; $i < count($products); $i ++) {
            $pro_in_cat[$products[$i]["idCategory"]][] = $products[$i];
        }
        $products_id = [];
        for ($i = 0; $i < count($products); $i ++) {
            $products_id[$products[$i]["id"]] = $products[$i];
        }
        ob_start();
        require_once 'views/user/mainpage.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function orders() {
        $isLogin = isset($_COOKIE["id"]) && isset($_SESSION["id"]) && isset($_SESSION["author"]) && isset($_SESSION["phonemail"]) && isset($_SESSION["phone"]);
        if ($isLogin) {
            $product_in_cart = Header::getProductInCart();
        } else {
            $product_in_cart = NULL;
        }
        $orders = Orders::getAllOrders();
        $allrates = Orders::getAllRatings();
        $ratesId = [];
        for ($i = 0; $i < count($allrates); $i ++) {
            $ratesId[] = $allrates[$i]["idOrder"];
        }
        
        ob_start();
        require_once 'views/user/orders.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function orderdetail() {
        $isLogin = isset($_COOKIE["id"]) && isset($_SESSION["id"]) && isset($_SESSION["author"]) && isset($_SESSION["phonemail"]) && isset($_SESSION["phone"]);
        if ($isLogin) {
            $product_in_cart = Header::getProductInCart();
        } else {
            $product_in_cart = NULL;
        }
        $orderIdForPage = $this->orderIdForPage;
        $orderUse = Orderdetail::getOrdersById($orderIdForPage);
        $product_in_order = Orderdetail::getAllProductsByOrderId($orderIdForPage);
        $products = [];
        for ($i = 0; $i < count($product_in_order); $i ++) {
            $products[] = Orderdetail::getProductById($product_in_order[$i]["idProduct"]);
        }
        $allrates = Orders::getAllRatings();
        $ratesId = [];
        for ($i = 0; $i < count($allrates); $i ++) {
            $ratesId[] = $allrates[$i]["idOrder"];
        }

        ob_start();
        require_once 'views/user/orderdetail.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function community() {
        $isLogin = isset($_COOKIE["id"]) && isset($_SESSION["id"]) && isset($_SESSION["author"]) && isset($_SESSION["phonemail"]) && isset($_SESSION["phone"]);
        if ($isLogin) {
            $product_in_cart = Header::getProductInCart();
        } else {
            $product_in_cart = NULL;
        }
        $blogs = Community::getAllBlogs();
        $accounts = Community::getAllAccounts();
        $comments = Community::getAllComments();
        $commentsId = [];
        for ($i = 0; $i < count($blogs); $i ++) {
            $commentsId[$blogs[$i]["id"]] = [];
        }
        for ($i = 0; $i < count($comments); $i ++) {
            $commentsId[$comments[$i]["idBlog"]][] = $comments[$i];
        }

        ob_start();
        require_once 'views/user/community.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function userinfo() {
        $isLogin = isset($_COOKIE["id"]) && isset($_SESSION["id"]) && isset($_SESSION["author"]) && isset($_SESSION["phonemail"]) && isset($_SESSION["phone"]);
        if ($isLogin) {
            $product_in_cart = Header::getProductInCart();
        } else {
            $product_in_cart = NULL;
        }
        $itemm = UserInfo::getAccount();

        ob_start();
        require_once 'views/user/user_info.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function review() {
        $isLogin = isset($_COOKIE["id"]) && isset($_SESSION["id"]) && isset($_SESSION["author"]) && isset($_SESSION["phonemail"]) && isset($_SESSION["phone"]);
        if ($isLogin) {
            $product_in_cart = Header::getProductInCart();
        } else {
            $product_in_cart = NULL;
        }
        ob_start();
        require_once 'views/user/review.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
    public function search() {
        $isLogin = isset($_COOKIE["id"]) && isset($_SESSION["id"]) && isset($_SESSION["author"]) && isset($_SESSION["phonemail"]) && isset($_SESSION["phone"]);
        if ($isLogin) {
            $product_in_cart = Header::getProductInCart();
        } else {
            $product_in_cart = NULL;
        }
        $products = Homepage::getAllProducts();

        ob_start();
        require_once 'views/user/findproduct.php';
        $content = ob_get_clean();
        require_once 'views/user/index.php';
    }
}
?>
