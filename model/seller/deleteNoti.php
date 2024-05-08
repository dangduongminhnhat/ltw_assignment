<?php
function deleteNoti($mysqli, $accountID, $notiID){
    $query = "UPDATE notify SET isDeleted = 1
              WHERE idAccount = '$accountID' AND idNotifications = '$notiID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
