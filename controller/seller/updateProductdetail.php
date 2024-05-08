<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = isset($_POST["idsp"]) ? $_POST["idsp"] : null;
    $tensp = isset($_POST["tensp"]) ? $_POST["tensp"] : null;
    $category = isset($_POST["category"]) ? $_POST["category"] : null;
    $price = isset($_POST["price"]) ? $_POST["price"] : null;
    $soluong = isset($_POST["soluong"]) ? $_POST["soluong"] : null;
    $status = isset($_POST["status"]) ? $_POST["status"] : null;
    $ship = isset($_POST["ship"]) ? $_POST["ship"] : null;
    $description = isset($_POST["description"]) ? $_POST["description"] : null;

    // Retrieve existing image path from database
    $getimage_query = "SELECT image FROM product WHERE id = '$productID'";
    $getimage_result = mysqli_query($mysqli, $getimage_query);

    if ($getimage_result) {
        $getimage_row = mysqli_fetch_assoc($getimage_result);
        $existing_image = $getimage_row['image'];
    } else {
        echo "Failed to retrieve existing image.";
        exit();
    }

    $image = null;
    if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Handle new image upload
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $uploadDirectory = '../../public/ProductImage/';
        $image = $uploadDirectory . $imageName;
        
        move_uploaded_file($imageTmpName, $image);
    } else {
        // No new image uploaded, maintain the existing image path
        $image = $existing_image;
    }

    include_once '../../model/seller/updateProductdetail.php';

    $success =  updateProductdetailByID($mysqli, $productID, $tensp, $category, $price, $soluong, $status, $ship, $description, $image);

    if ($success) {
        // header("Location: ../../views/seller/?page=productdetail&productID=" . $productID);
        exit();
    } else {
        echo "Failed to update product details.";
        exit();
    }
}
?>
