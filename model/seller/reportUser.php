<?php
function reportUser($mysqli, $userID){
    $query = "UPDATE users SET isReported = 1
              WHERE idAccount = '$userID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
