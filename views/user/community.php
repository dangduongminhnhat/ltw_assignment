<div class="container-fluid" style="margin-bottom: 50px">
    <div class="linkStyle">
    <a class="link-underline-light linkStyleColor" href="/BTL/user/community">Cộng đồng</a>
    </div>
    <?php
    for ($i = count($blogs) - 1; $i > -1 ; $i --) {
        if ($blogs[$i]["isDelete"] == 1) {
            continue;
        }
        echo '<div style="display: flex; justify-content: center">';
        echo '    <div style="width: 96%; padding-left: 20px; padding-right: 20px">';
        echo '        <div style="display: flex; align-items: center">';
        echo '            <img src="/BTL/public/images/Ellipse 2.png" alt="" />';
        echo '            <div style="padding-left: 12px">';
        echo '                <div>';
        echo '                    <strong>' .$accounts[$blogs[$i]["idSeller"]] .'</strong>';
        echo '                </div>';
        echo '            </div>';
        echo '        </div>';
        echo '        <div>';
        echo '            Tiêu đề: ' . $blogs[$i]["header"];
        echo '        </div>';
        echo '    </div>';
        echo '</div>';
        echo '<div class="container container-border-page" style="margin-bottom: 50px">';
        echo '    <div>';
        echo '        <p>' . $blogs[$i]["content"] . '</p>';
        echo '        <div style="display: flex; justify-content: center">';
        $newPath = str_replace("../../public/", "/BTL/public/", $blogs[$i]["image"]);
        echo '            <img src="' . $newPath . '" alt="" style="width: 45%" />';
        echo '        </div>';
        echo '    </div>';
        echo '    <div style="display: flex; justify-content: space-between; margin-top: 20px;">';
        echo '        <div>'. count($commentsId[$blogs[$i]["id"]]) . ' bình luận</div>';
        echo '    </div>';
        echo '    <hr />';
        for ($j = 0; $j < count($commentsId[$blogs[$i]["id"]]); $j ++) {
            echo '    <div style="margin-top: 10px; margin-bottom: 10px">';
            echo '        <div style="display: flex">';
            echo '            <img src="/BTL/public/images/Avatar-Profile-PNG-Photos 1.png" alt="" style="height: 49px; width: 49px"/>';
            echo '            <div class="comment-style">';
            echo '                <div>';
            echo '                    <strong>' . $accounts[$commentsId[$blogs[$i]["id"]][$j]["idAccount"]] . '</strong>';
            echo '                </div>';
            echo '                <div>' . $commentsId[$blogs[$i]["id"]][$j]["content"] . '</div>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
        }
        if ($isLogin) {
            echo '<form id="comment-form' . $i . '">';
            echo '    <div style="margin-top: 5px; display: flex; margin-bottom: 20px; align-items: center;">';
            echo '        <input type="hidden" id="comment-id" name="idBlog" value="' . $blogs[$i]["id"] . '">';
            echo '        <img src="/BTL/public/images/Avatar-Profile-PNG-Photos 1.png" alt="" />';
            echo '        <input type="text" placeholder="Viết bình luận" class="comment-note-style" name="content" />';
            echo '        <button type="submit" style="margin-left: 5px; background: white; border: 0"> <span class="iconify" data-icon="mdi:send" style="font-size: 30px"></span> </button>';
            echo '    </div>';
            echo '</form>';
        }
        echo '</div>';
    }
    ?>
</div>
<script>
<?php
for ($i = 0; $i < count($blogs); $i ++) {
    if ($blogs[$i]["isDelete"] == 1) {
        continue;
    }
    echo '
    var form' . $blogs[$i]["id"] . ' = document.getElementById("comment-form' . $i . '");
    form' . $blogs[$i]["id"] . '.addEventListener("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        fetch("../controller/user/add-comment.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then(data => {
            window.location.reload();
        })
        .catch(error => {
            console.log(error);
            alert("Error submitting form. Please try again later.");
        });
    });
    ';
}
?>
</script>