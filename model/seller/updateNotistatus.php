<?php
function updateNotistatus($mysqli, $accountID, $notiID){
    $query = "UPDATE notify SET isRead = 1
              WHERE idAccount = '$accountID' AND idNotifications = '$notiID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
