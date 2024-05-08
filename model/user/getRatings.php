<?php
function getRatings($mysqli, $sortOption) {
    $orderBy = "ratings.timeRating DESC";

    // Check the selected sorting option
    if ($sortOption == "highest") {
        $orderBy = "ratings.stars DESC";
    }

    $sql_get_ratings = mysqli_query($mysqli,
        "SELECT ratings.ID, ratings.idOrder, ratings.content, ratings.timeRating, ratings.stars, ratings.respone, ratings.isHidden,
            accounts.userName, accounts.id, users.isReported
        FROM ratings
        INNER JOIN accounts ON ratings.idUser = accounts.id
        LEFT JOIN users ON accounts.id = users.idAccount
        ORDER BY $orderBy");

    $ratings = array();

    if(mysqli_num_rows($sql_get_ratings) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_ratings)) {
            $ratings[] = $row;
        }
    }

    return $ratings;
}
?>
