<?php
function deleteProduct($mysqli, $productID){
    $query = "UPDATE product SET isDeleted = 1
              WHERE id = '$productID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
