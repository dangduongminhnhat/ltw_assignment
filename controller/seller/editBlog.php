<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $data = json_decode(file_get_contents("php://input"));
    $blogID = mysqli_real_escape_string($mysqli, $data->blogID); // Escape input
    $content = mysqli_real_escape_string($mysqli, $data->content);
    $title = mysqli_real_escape_string($mysqli, $data->title);
    $images = $data->images;

    $uploadDirectory = '../../public/BlogImage/';
    $imagePaths = array();

    foreach ($images as $base64Image) {
        $imageName = uniqid() . '.png'; // Generate unique filename
        $imagePath = $uploadDirectory . $imageName;
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
        file_put_contents($imagePath, $imageData);
        $imagePaths[] = $imagePath;
    }

    // Include the file containing the function to add a blog
    include_once '../../model/seller/editBlog.php';
    // Call the function to add the blog post
    $success = editBlog($mysqli, $blogID,$title,$content,$imagePaths);

    // Check if the addition was successful
    if ($success) {
        // Return a success message
        echo "success";
    } else {
        // Return an error message if the addition failed
        echo "error";
    }
}
?>
