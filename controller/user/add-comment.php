<?php
require_once '../../model/user/add-comment.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["content"]) && isset($_POST["idBlog"])) {
        if (strlen($_POST["content"]) > 0) {
            addComment($_POST["idBlog"], $_POST["content"]);
        }
        echo json_encode("Success");
    } else {
        echo json_encode("Fail");
    }
}
?>