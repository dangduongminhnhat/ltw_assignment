<?php
function updateCategory($mysqli, $categoryID, $namecategory, $image){
    $query = "UPDATE category SET typeName = '$namecategory', image = '$image'
    WHERE id = '$categoryID'";

    $result = mysqli_query($mysqli,$query);

    return ($result);
}
?>
