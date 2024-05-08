<?php
function unblocktUser($mysqli, $userID){
    $query = "UPDATE users SET isReported = 0
              WHERE idAccount = '$userID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
