<?php
function getProductsByCategory($mysqli, $categoryId) {
    $sql_get_products = mysqli_query($mysqli,
        "SELECT product.id, product.name, product.quantity, product.description, product.price, product.image, product.isHidden, product.rate,
        category.typeName
        FROM product
        INNER JOIN category ON product.idCategory = category.id
        WHERE product.idCategory = $categoryId AND product.isDeleted = 0
        ORDER BY product.isHidden");

    $products = array();

    if(mysqli_num_rows($sql_get_products) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_products)) {
            $products[] = $row;
        }
    }

    return $products;
}

function getProductsByCategoryAndSearch($mysqli, $categoryId, $searchQuery) {
    $searchQuery = mysqli_real_escape_string($mysqli, $searchQuery);
    
    // Split the search query into individual words
    $searchTerms = explode(" ", $searchQuery);
    
    // Prepare an array to hold individual search conditions
    $conditions = array();
    
    // Loop through each search term and add it to the conditions array
    foreach ($searchTerms as $term) {
        $conditions[] = "product.name LIKE '%$term%'";
    }
    
    // Combine the individual search conditions using OR
    $conditionsString = implode(" OR ", $conditions);

    $sql_get_products = mysqli_query($mysqli,
        "SELECT product.id, product.name, product.quantity, product.description, product.price, product.image, product.isHidden, product.rate,
        category.typeName
        FROM product
        INNER JOIN category ON product.idCategory = category.id
        WHERE product.isDeleted = 0 AND (product.idCategory = $categoryId OR '$categoryId' IS NULL) AND 
        ($conditionsString)
        ORDER BY product.isHidden");

    $products = array();

    if(mysqli_num_rows($sql_get_products) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_products)) {
            $products[] = $row;
        }
    }

    return $products;
}



?>
