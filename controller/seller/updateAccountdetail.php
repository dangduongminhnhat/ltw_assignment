<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function isValidPhoneNumber($phone) {
        $phone = preg_replace('/[^0-9]/', '', $phone);
        return (strlen($phone) >= 9 && strlen($phone) <= 11);
    }

    // Function to validate money greater than zero
    function isValidMoney($money) {
        return ($money > 0);
    }

    $accountID = "1"; 
    
    $account = $_POST["account"];
    $passw = $_POST["passw"];
    $nameshop = $_POST["nameshop"];
    $address = $_POST["address"];
    $emailcontact = $_POST["emailcontact"];
    $phonecontact = $_POST["phonecontact"];
    $fblink = $_POST["fblink"];
    $instalink = $_POST["instalink"];
    $tiktoklink = $_POST["tiktoklink"];
    $money = $_POST["money"];
    $status = $_POST["status"];

    include_once("../../model/seller/updateAccountdetail.php");

    $success = updateAccountdetail($mysqli, $accountID, $account, $passw, $nameshop, $address, $emailcontact, $phonecontact, $fblink, $instalink, $tiktoklink, $money, $status);

    if ($success) {
        header("Location: ../../views/seller/?page=account");
        exit();
    } else {
        header("Location: ../../views/seller/?page=account");
        exit();
    }
}
?>
