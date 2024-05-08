<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $data = json_decode(file_get_contents("php://input"));
    $title = mysqli_real_escape_string($mysqli, $data->title); // Escape input
    $content = mysqli_real_escape_string($mysqli, $data->content); // Escape input
    $images = $data->images;

    $uploadDirectory = '../../public/BlogImage/';
    $imagePaths = array();

    // Save base64 images to files
    foreach ($images as $base64Image) {
        $imageName = uniqid() . '.png'; // Generate unique filename
        $imagePath = $uploadDirectory . $imageName;
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
        file_put_contents($imagePath, $imageData);
        $imagePaths[] = $imagePath;
    }

    // Include the file containing the function to add a blog
    include_once '../../model/seller/addBlog.php';

    // Call the function to add the blog post
    $success = addBlog($mysqli, $content, $title, $imagePaths);

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
