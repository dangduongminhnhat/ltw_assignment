<?php
function showProduct($mysqli, $productID){
    $query = "UPDATE product SET isHidden = 0
              WHERE id = '$productID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
