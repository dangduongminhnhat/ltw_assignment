<?php
function addResponeRating($mysqli, $ratingID, $respone){
    $query = "UPDATE ratings SET respone = '$respone'
              WHERE ID = '$ratingID'";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
