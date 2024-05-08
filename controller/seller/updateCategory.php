<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idcategory = isset($_POST["idcategory"]) ? $_POST["idcategory"] : null;
    $namecategory = isset($_POST["namecategory"]) ? $_POST["namecategory"] : null;

    // Retrieve existing image path from database
    $getimage_query = "SELECT image FROM category WHERE id = '$idcategory'";
    $getimage_result = mysqli_query($mysqli, $getimage_query);

    if ($getimage_result) {
        $getimage_row = mysqli_fetch_assoc($getimage_result);
        $existing_image = $getimage_row['image'];
    } else {
        echo "Failed to retrieve existing image.";
        exit();
    }

    $image = null;
    if(isset($_FILES['imagecategory']) && $_FILES['imagecategory']['error'] == UPLOAD_ERR_OK) {
        // Handle new image upload
        $imageTmpName = $_FILES['imagecategory']['tmp_name'];
        $imageName = $_FILES['imagecategory']['name'];
        $uploadDirectory = '../../public/CategoryImage/';
        $image = $uploadDirectory . $imageName;
        
        move_uploaded_file($imageTmpName, $image);
    } else {
        // No new image uploaded, maintain the existing image path
        $image = $existing_image;
    }

    include_once '../../model/seller/updateCategory.php';

    $success =  updateCategory($mysqli, $idcategory, $namecategory, $image);

    if ($success) {
        // header("Location: ../../views/seller/?page=productdetail&productID=" . $productID);
        exit();
    } else {
        echo "Failed to update product details.";
        exit();
    }
}
?>
