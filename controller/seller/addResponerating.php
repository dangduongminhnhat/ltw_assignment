<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ratingID = $_POST["idrating"];
    $respone = $_POST["respone"];

    include_once("../../model/seller/addResponerating.php");

    $success = addResponeRating($mysqli, $ratingID, $respone);

    if ($success) {
        header("Location: ../../views/seller/?page=rate");
        exit();
    } else {
        header("Location: ../../views/seller/?page=rate");
        exit();
    }
}
?>
