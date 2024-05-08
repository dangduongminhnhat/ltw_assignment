
<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idsp = isset($_POST["idsp"]) ? $_POST["idsp"] : null;
    $tensp = isset($_POST["tensp"]) ? $_POST["tensp"] : null;
    $category = isset($_POST["category"]) ? $_POST["category"] : null;
    $price = isset($_POST["price"]) ? $_POST["price"] : null;
    $soluong = isset($_POST["soluong"]) ? $_POST["soluong"] : null;
    $status = isset($_POST["status"]) ? $_POST["status"] : null;
    $ship = isset($_POST["ship"]) ? $_POST["ship"] : null;
    $description = isset($_POST["description"]) ? $_POST["description"] : null;

    $image = null;
    if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $uploadDirectory = '../../public/ProductImage/';
        $image = $uploadDirectory . $imageName;
        move_uploaded_file($imageTmpName, $image);
    }


    include_once '../../model/seller/addProduct.php';

    $success = addProduct($mysqli, $idsp, $tensp, $category, $price, $soluong, $status, $ship, $description, $image);

    if ($success) {
        header("Location: ../../views/seller/?page=product");
        exit();
    } else {
        echo "Failed to add product.";
        exit();
    }
}
?>

