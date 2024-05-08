<?php
function getUserDetail($mysqli, $userID) {
    $sql_get_users = mysqli_query($mysqli,
        "SELECT accounts.email, accounts.phone, accounts.userName
        FROM accounts
        WHERE id = $userID");

    if(mysqli_num_rows($sql_get_users) > 0) {
        return mysqli_fetch_array($sql_get_users);
    } else {
        return null;
    }
}
?>
