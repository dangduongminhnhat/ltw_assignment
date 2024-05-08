<?php
function updateProductdetailByID($mysqli, $productID, $tensp, $category, $price, $soluong, $status, $ship, $description, $image){
    $query = "UPDATE product SET name = '$tensp', idCategory = '$category', price = '$price', quantity = '$soluong', 
    isHidden = '$status', description = '$description', image = '$image', deliveryType = '$ship'
    WHERE id = '$productID'";


    $result = mysqli_query($mysqli,$query);

    return ($result);
}
?>