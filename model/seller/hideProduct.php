<?php
function hideProduct($mysqli, $productID){
    $query = "UPDATE product SET isHidden = 1
              WHERE id = '$productID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
