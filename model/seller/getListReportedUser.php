<?php
function getListReportedUser($mysqli) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT users.idAccount, accounts.userName, accounts.email, accounts.phone
        FROM accounts
        INNER JOIN users ON accounts.id = users.idAccount
        WHERE users.isReported = 1
        ORDER BY users.idAccount");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }

    return $listuser;
}
?>
