<?php
function hideRating($mysqli, $ratingID){
    $query = "UPDATE ratings SET isHidden = 1
              WHERE ID = '$ratingID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
