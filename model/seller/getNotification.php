<?php
function getNotification($mysqli, $accountID) {
    $sql_get_noti_detail = mysqli_query($mysqli,
        "SELECT notifications.id, notifications.message, notifications.timeNoti, notifications.title,
            notify.isRead
        FROM notifications
        INNER JOIN notify ON notifications.id = notify.idNotifications
        WHERE notify.idAccount = $accountID AND notify.isDeleted = 0
        ORDER BY timeNoti DESC" );

    $notifications = array();

    if(mysqli_num_rows($sql_get_noti_detail) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_noti_detail)) {
            $notifications[] = $row;
        }
    }

    return $notifications;
}
?>
