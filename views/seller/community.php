<div class="col align-items-center justify-content-center mt-3 me-3">
    <nav aria-label="breadcrumb" class="d-none d-md-flex d-lg-flex ms-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=mainpage" class="text-decoration-none"
                    style="color: black; font-size: large">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                    style="color: black; font-size: large">Giao tiếp</a></li>
            <li class="breadcrumb-item"><a href="?page=community" class="text-decoration-none"
                    style="color: black; font-size: large">Trang cộng đồng</a></li>
        </ol>
    </nav>
    <div class="ms-5 border border-solid rounded mb-4" style="width: 90%;border-width: 1px; border-radius: 5px;">
        <div class="container mt-3 mb-3">
            <div class="d-flex align-items-center">
                <img class="ms-4 avatar avatar-48 bg-light rounded-circle text-white p-1"
                    src="../../public/images/logo.png">
                <div class="ms-3" style="width: 90%; background-color:#e8e8e8;border-radius: 5px;">
                    <p class="m-1 ms-3" onclick="openPopup()">Hãy chia sẻ bài đăng của bạn</p>
                </div>
            </div>
        </div>
    </div>
    <div id="editModal" class="popup">
        <div class="popup-content"
            style="display: flex; flex-direction: column; align-items: flex-start; min-width: 40vh;  max-height: 80vh; overflow-y: auto;">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h5>Chỉnh sửa bài viết</h5>
            <form id="editBlogForm" style="width: 100%;">
                <input type="hidden" id="editBlogID">
                <input type="text" placeholder="Tiêu đề" class="mb-3" style="width: 100%;" id="editTitleInput">
                <textarea placeholder="Nội dung bài đăng" class="mb-3" style="width: 100%;"
                    id="editContentInput"></textarea>
                <input type="file" accept="image/*" style="margin-bottom: 10px;" id="editFileInput" name="editFileInput"
                    onchange="previewEditImage(event)" multiple>
                <div id="editPreviewImage" class="mt-3 mb-3"></div>
                <div id="editfileNames"></div>
                <button type="button" onclick="submitEditForm()" style="background-color:#ffd700;"
                    class="btn btn-primary text-dark">Lưu</button>
            </form>
        </div>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content"
            style="display: flex; flex-direction: column; align-items: flex-start; min-width: 40vh;  max-height: 80vh; overflow-y: auto;">
            <span class="close" onclick="closePopup()">&times;</span>
            <h5>Hãy chia sẻ suy nghĩ của bạn</h5>
            <form id="blogForm" enctype="multipart/form-data" style="width: 100%;">
                <input type="text" placeholder="Tiêu đề" class="mb-3" style="width: 100%;" id="titleInput">
                <textarea placeholder="Nội dung bài đăng" class="mb-3" style="width: 100%;"
                    id="contentInput"></textarea>
                <input type="file" accept="image/*" style="margin-bottom: 10px;" id="fileInput" name="fileInput"
                    onchange="previewImage(event)" multiple>
                <div id="fileNames"></div>
                <button type="button" onclick="submitForm()" style="background-color:#ffd700;"
                    class="btn btn-primary text-dark">Đăng
                    bài</button>
            </form>
        </div>
    </div>
    <?php
    include_once ("../../controller/seller/getAccountdetail.php");
    $account = fetchAccountdetail(1);
    include_once ("../../controller/seller/fetchListBlog.php");
    $blogList = fetchListBlog();
    foreach ($blogList as $blog) {
        ?>
        <div class="ms-5 border border-solid rounded mb-5" style="width: 90%;border-width: 1px; border-radius: 5px;">
            <div style="display: flex; justify-content: center">
                <div style="width: 96%; padding-left: 20px; padding-right: 20px;">
                    <div style="display: flex; align-items: center;justify-content: space-between;">
                        <div style="display: flex; align-items: center;">
                            <img class="avatar avatar-48 bg-light rounded-circle text-white p-1"
                                src="../../public/images/logo.png">
                            <div style="padding-left: 12px">
                                <div>
                                    <strong><?php echo $account['nameStore']; ?></strong>
                                </div>
                                <!-- <div class="note-style">43 phút trước</div> -->
                            </div>

                        </div>

                        <div class="d-flex">
                            <a class="ms-4" href="#"
                                onclick="openEditModal(<?php echo $blog['id']; ?>, '<?php echo $blog['header']; ?>', '<?php echo $blog['content']; ?>','(<?php echo $blog['image']; ?>')"
                                style="text-decoration: none;">Chỉnh sửa</a>
                            <a class="ms-4" href="#" onclick="confirmDelete(<?php echo $blog['id']; ?>)"
                                style="text-decoration: none; color: red;">Xóa bài</a>

                        </div>

                    </div>
                    <div>
                        Tiêu đề: <?php echo $blog['header']; ?>
                    </div>
                </div>
            </div>
            <div class="container container-border-page">
                <div>
                    <?php
                    $blog_content = $blog['content'];
                    $cleaned_content = str_replace(array("\\r", "\\n", "\\r\\n"), '', $blog_content);
                    echo "<div>$cleaned_content</div>"; ?>
                    <img src="<?php echo $blog['image']; ?>" alt="" class="mt-3"
                        style="max-height: 400px; max-width: 70%;" />
                </div>
                <?php
                include_once ("../../controller/seller/fetchCommentList.php");
                $blogID = $blog["id"];
                $commentList = fetchCommentList($blogID);
                $commentCount = count($commentList);
                ?>
                <div style="
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
                ">
                    <?php if ($commentCount > 0): ?>
                        <div id="countComment"><?php echo $commentCount; ?> bình luận</div>
                    <?php else: ?>
                        <div id="countComment">Không có bình luận</div>
                    <?php endif; ?>
                </div>
                <hr />
                <!-- <div style="display: flex; justify-content: space-between">
                    <div class="like-style">
                        <span class="iconify" data-icon="mdi-light:comment"
                            style="color: #ffd700; height: 24px; width: 24px"></span>
                        <div>Bình luận</div>
                    </div>
                    <div class="like-style">
                        <span class="iconify" data-icon="majesticons:share-line"
                            style="color: #ffd700; height: 24px; width: 24px"></span>
                        <div>Chia sẻ</div>
                    </div>
                </div> -->
                <!-- <hr /> -->
                <!-- <div>
                    <a class="link-underline-light linkStyleColor" href="#">Xem thêm bình luận</a>
                </div> -->
                <?php
                foreach ($commentList as $index => $comment) {
                    $modalId = 'detailUser_' . $index;
                    ?>
                    <div class="row" style="margin-top: 5px; margin-bottom:10px;">
                        <div class="col-12 d-flex flex-row align-items-center">
                            <img
                                src="https://res.cloudinary.com/hy4kyit2a/f_auto,fl_lossy,q_70/learn/modules/salesforce-b2b-commerce-storefront-experience/support-your-buyers-b2b-journey/images/4889eb0c3f27a0c1a53bc4e89b09bdb4_b-42-aa-2-e-0-1-bc-4-4-cb-9-a-91-e-016914-c-0-a-473.png"
                                width="60"
                                height="60"
                                alt="avatar"
                                class="d-none d-lg-flex d-md-flex"
                            />
                            <div class=" d-flex flex-column ms-2 rounded-3" style="background-color:#FFC700;">
                                <div class="d-flex flex-row justify-content-center ms-4 me-4 mt-2">
                                    <strong class=""><?php echo $comment['userName']; ?></strong>
                                    <span class="me-5 ms-5 text-decoration-underline fw-light" data-bs-toggle="modal" data-bs-target="#<?php echo $modalId; ?>">Xem thông tin</span>
                                        <?php if ($comment['isReported'] == 0) { ?>
                                            <span class="text-decoration-underline fw-light" style="color:red" onclick="reportUser(<?php echo $comment['idAccount']; ?>)">Chặn</span>
                                            <?php } 
                                        ?>
                                        <?php if ($comment['isReported'] == 1) { ?>
                                            <span class="text-decoration-underline fw-light" style="color:red" onclick="unblockUser(<?php echo $comment['idAccount']; ?>)">Gỡ chặn</span>
                                            <?php } 
                                        ?>
                                </div>
                                <div class="mb-2 ms-4"><?php echo $comment['content']; ?></div>
                                
                            </div>
                            

                        </div>
                            <?php
                                include_once("../../controller/seller/getUserdetail.php");
                                $userID = $comment['idAccount'];
                                $userdetail = fetchUserDetail($userID);
                                
                            ?>
                            <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="infoUser" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="infoUser">
                                            Thông tin khách hàng
                                            </h1>
                                            <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                            ></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label" for="username"
                                                >Tên khách hàng</label
                                                >
                                                <input
                                                class="form-control"
                                                id="username"
                                                name="username"
                                                type="text"
                                                value="<?php echo $userdetail['userName']?>"
                                                readonly
                                                style="width: 100%"
                                                />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="email"
                                                >Email</label
                                                >
                                                <input
                                                class="form-control"
                                                id="email"
                                                name="email"
                                                type="text"
                                                value="<?php echo $userdetail['email']; ?>"
                                                readonly
                                                style="width: 100%"
                                                />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="phonenum"
                                                >Số điện thoại</label
                                                >
                                                <input
                                                class="form-control"
                                                id="phonenum"
                                                name="phonenum"
                                                type="number"
                                                value="<?php echo $userdetail['phone']; ?>"
                                                readonly
                                                style="width: 100%"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- <div class="note-style" style="margin-left: 60px">
                            <a class="linkStyleColor" href="#" style="margin-left: 10px">Phản hồi</a>
                        </div> -->
                    </div>
                <?php } ?>
                <div id="commentContainer"></div>
                <!-- <div style="
                margin-top: 5px;
                display: flex;
                margin-bottom: 20px;
                align-items: center;
                ">
                    <img class="avatar avatar-48 bg-light rounded-circle text-white p-1" src="../../public/images/logo.png">
                    <input type="text" placeholder="Viết bình luận" class="comment-note-style"
                        onkeypress="submitComment(event,<?php echo $blog['id']; ?>,'<?php echo $account['nameStore']; ?>')" />
                </div> -->
            </div>
        </div>
    <?php } ?>
</div>
<script>
    function previewImage() {
        const input = event.target;
        const preview = document.getElementById("fileNames");

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("img-fluid");
                preview.innerHTML = "";
                preview.appendChild(img);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.innerHTML = "";
        }
    }
    function previewEditImage(event) {
        const input = event.target;
        const preview = document.getElementById("editfileNames");
        const editPreviewImage = document.getElementById("editPreviewImage");
        console.log("ahihi: ", editPreviewImage)
        editPreviewImage.innerHTML = "";
        console.log("ahihi: ", editPreviewImage)
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("img-fluid");
                preview.innerHTML = "";
                preview.appendChild(img);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.innerHTML = "";
        }
    }

    function openEditModal(blogID, title, content, imageUrl) {
        console.log("open edit modal")
        var editModal = document.getElementById('editModal');
        var editBlogIDInput = document.getElementById('editBlogID');
        var editTitleInput = document.getElementById('editTitleInput');
        var editContentInput = document.getElementById('editContentInput');
        var editPreviewImage = document.getElementById('editPreviewImage');

        editBlogIDInput.value = blogID;
        editTitleInput.value = title;
        editContentInput.textContent = content
            .replace(/<p>/g, '\n')
            .replace(/<br\s*\/?>/g, '\n')
            .replace(/<\/p>/g, '\n')
            .replace(/^\s+|\s+$/g, '')
            .replace(/[\r\n]+/g, '\n');

        if (imageUrl) {
            var absoluteImageUrl = window.location.origin + "/BTL/" + imageUrl;
            editPreviewImage.innerHTML = '<img src="' + absoluteImageUrl + '" class="img-fluid" style="max-width: 100%; max-height: 200px;" />';
        } else {
            console.log("khong")
            editPreviewImage.innerHTML = '';
        }

        editModal.style.display = 'block';
    }

    function closeEditModal() {
        document.getElementById("editfileNames").innerHTML = "";

        // Clear the content of the editPreviewImage div
        document.getElementById("editPreviewImage").innerHTML = "";

        // Hide the edit modal
        document.getElementById("editModal").style.display = "none";
    }

    function submitEditForm() {
        console.log("submitForm")
        var blogID = document.getElementById('editBlogID').value;
        var title = document.getElementById('editTitleInput').value.trim();
        var content = document.getElementById('editContentInput').value.trim();
        content = content.replace(/\n/g, '<br/>');
        console.log(content);

        var files = document.getElementById('editFileInput').files;
        var images = [];
        var reader;
        var counter = 0;
        if (files.length == 0) {
            {
                    // All files processed, send JSON data
                    var requestBody = {
                        blogID: blogID,
                        title: title,
                        content: content,
                    };

                    fetch('../../controller/seller/editBlogWithoutImage.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(requestBody)
                    })
                        .then(response => {
                            if (response.ok) {
                                console.log(response)
                                return response.text();
                            } else {
                                throw new Error('Network response was not ok');
                            }
                        })
                        .then(data => {
                            if (data === 'success') {
                                closeEditModal();
                                // window.location.reload()
                                console.log("success");
                            } else {
                                console.error('Error:', data);
                            }
                        })
                        .catch(error => {
                            // Catch any fetch errors
                            console.error('Error:', error);
                        });

                    closeEditModal();
                }
            
        }
        for (var i = 0; i < files.length; i++) {
            reader = new FileReader();
            reader.onload = function (event) {
                console.log("agugu")
                images.push(event.target.result);
                counter++;
                if (counter === files.length) {
                    // All files processed, send JSON data
                    var requestBody = {
                        blogID: blogID,
                        title: title,
                        content: content,
                        images: images
                    };

                    fetch('../../controller/seller/editBlog.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(requestBody)
                    })
                        .then(response => {
                            if (response.ok) {
                                console.log(response)
                                return response.text();
                            } else {
                                throw new Error('Network response was not ok');
                            }
                        })
                        .then(data => {
                            if (data === 'success') {
                                closeEditModal();
                                window.location.reload()
                                console.log("success");
                            } else {
                                console.error('Error:', data);
                            }
                        })
                        .catch(error => {
                            // Catch any fetch errors
                            console.error('Error:', error);
                        });

                    closeEditModal();
                }
            };
            reader.readAsDataURL(files[i]);
        }
    }

    function submitForm() {
        if (!validateForm()) {
            return;
        } else {
            console.log("Submit")
            var title = document.getElementById('titleInput').value.trim();
            var content = document.getElementById('contentInput').value.trim();
            content = content.replace(/\n/g, '<br/>');
            var files = document.getElementById('fileInput').files;
            var images = [];
            var reader;
            var counter = 0;
            if (files.length == 0) {
            {
                    // All files processed, send JSON data
                    var requestBody = {
                        title: title,
                        content: content,
                    };

                    fetch('../../controller/seller/addBlogWithoutImage.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(requestBody)
                    })
                        .then(response => {
                            if (response.ok) {
                                console.log(response)
                                return response.text();
                            } else {
                                throw new Error('Network response was not ok');
                            }
                        })
                        .then(data => {
                            if (data === 'success') {
                                closeEditModal();
                                window.location.reload()
                                console.log("success");
                            } else {
                                console.error('Error:', data);
                            }
                        })
                        .catch(error => {
                            // Catch any fetch errors
                            console.error('Error:', error);
                        });

                    closeEditModal();
                }
            
        }
            for (var i = 0; i < files.length; i++) {
                reader = new FileReader();
                reader.onload = function (event) {
                    images.push(event.target.result);
                    counter++;
                    if (counter === files.length) {
                        // All files processed, send JSON data
                        var requestBody = {
                            title: title,
                            content: content,
                            images: images
                        };

                        fetch('../../controller/seller/addBlog.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(requestBody)
                        })
                            .then(response => {
                                if (response.ok) {
                                    return response.text();
                                } else {
                                    throw new Error('Network response was not ok');
                                }
                            })
                            .then(data => {
                                if (data === 'success') {
                                    window.location.href = "?page=community";
                                    console.log("success");
                                } else {
                                    console.error('Error:', data);
                                }
                            })
                            .catch(error => {
                                // Catch any fetch errors
                                console.error('Error:', error);
                            });

                        closePopup();
                    }
                };
                reader.readAsDataURL(files[i]);
            }
        }
    }


    function validateForm() {
        var title = document.getElementById('titleInput').value.trim();
        var content = document.getElementById('contentInput').value.trim();
        var image = document.getElementById('fileInput').value.trim();

        if (title === '' || content === '') {
            alert('Vui lòng nhập Tiêu đề và Nội dung bài đăng');
            return false; // Prevent form submission
        }

        return true;
    }
    function confirmDelete(blogID) {
        if (confirm("Are you sure you want to delete?")) {
            // If the user confirms deletion, make the DELETE request
            fetch('../../controller/seller/deleteBlog.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ blogID: blogID })
            })
                .then(response => {
                    if (response.ok) {
                        console.log("Blog post deleted successfully");
                        window.location.reload(); // For example, reload the page
                    } else {
                        console.error('Error:', response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            // Cancel deletion
            console.log("Delete action canceled");
        }
    }
    function openPopup() {
        document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
        // Clear input fields
        document.getElementById("titleInput").value = "";
        document.getElementById("contentInput").value = "";
        document.getElementById("fileInput").value = "";
        document.getElementById("fileNames").innerHTML = "";

        // Hide the popup
        document.getElementById("popup").style.display = "none";
    }

    document.getElementById('fileInput').addEventListener('change', function () {
        var fileNamesDiv = document.getElementById('fileNames');
        fileNamesDiv.innerHTML = ''; // Clear previous content

        var files = this.files;
        for (var i = 0; i < files.length; i++) {
            var fileName = document.createElement('p');
            fileName.textContent = 'File ' + (i + 1) + ': ' + files[i].name;
            fileNamesDiv.appendChild(fileName);
        }
    });
    function reportUser(userID){
            console.log("User ID:", userID);
            var confirmation = confirm("Xác nhận chặn khách hàng này?");
            if(!confirmation){
                return;
            }
            fetch('../../controller/seller/reportUser.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ userID: userID }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=community";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        }
        function unblockUser(userID){
            console.log("User ID:", userID);
            var confirmation = confirm("Xác nhận gỡ chặn khách hàng này?");
            if(!confirmation){
                return;
            }
            fetch('../../controller/seller/unblockUser.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ userID: userID }),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "?page=community";
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

        }
</script>