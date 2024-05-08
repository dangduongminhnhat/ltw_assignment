<?php
include_once("../../model/connectdb.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idcategory = isset($_POST["idcategory"]) ? $_POST["idcategory"] : null;
    $namecategory = isset($_POST["namecategory"]) ? $_POST["namecategory"] : null;

    $image = null;
    if(isset($_FILES['imagecategory']) && $_FILES['imagecategory']['error'] == UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['imagecategory']['tmp_name'];
        $imageName = $_FILES['imagecategory']['name'];
        $uploadDirectory = '../../public/CategoryImage/';
        $image = $uploadDirectory . $imageName;
        move_uploaded_file($imageTmpName, $image);
    }

    include_once '../../model/seller/addCategory.php';

    $success = addCategory($mysqli,$idcategory, $namecategory, $image);

    if ($success) {
        header("Location: ../../views/seller/?page=product");
        exit();
    } else {
        header("Location: ../../views/seller/?page=product");
        exit();
    }
}
?>
