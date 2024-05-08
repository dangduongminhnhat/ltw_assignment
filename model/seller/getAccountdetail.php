<?php
function getAccountDetail($mysqli, $accountID) {
    $sql_get_account_detail = mysqli_query($mysqli,
        "SELECT sellers.idAccount, sellers.nameStore, sellers.address, sellers.money, sellers.tiktok, sellers.instagram, sellers.facebook, sellers.isClose,
            accounts.email, accounts.pass, accounts.phone, accounts.userName
        FROM sellers, accounts
        WHERE sellers.idAccount = accounts.id AND sellers.idAccount = $accountID");

    if(mysqli_num_rows($sql_get_account_detail) > 0) {
        return mysqli_fetch_array($sql_get_account_detail);
    } else {
        return null;
    }
}
?>
