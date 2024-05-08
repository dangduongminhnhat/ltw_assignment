<?php
function editBlog($mysqli, $blogID, $title, $content, $image){
    $imageString = implode(',', $image);
    $query = "UPDATE blog SET header = '$title', content = '$content', image = '$imageString'
              WHERE id = '$blogID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
function  editBlogWithoutImage($mysqli, $blogID, $title, $content){
    $query = "UPDATE blog SET header = '$title', content = '$content'
              WHERE id = '$blogID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
