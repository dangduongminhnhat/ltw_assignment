<?php
require_once '../../model/user/search.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["searchproduct"])) {
        $name = $_POST["searchproduct"];
        $products = searchProduct($name);
        $cat = getAllCatogeries();
        if ($name !== "") {
            $name = strtolower($name);
            $len = strlen($name);
            $hint = "";
            foreach($products as $pro) {
              if (stristr($name, substr($pro["name"], 0, $len))) {
                $add = '<div class="row border rounded-4 mb-3" >
                            <div class="col-lg-3 d-none mt-2 mb-2 d-lg-flex justify-content-center align-items-center">
                                <div class="container">
                                    <img src="' . $pro["image"] . '" class="img-fluid" alt="product image" style="max-height:200px; max-width:200px"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-7 col-lg-4 d-flex flex-column justify-content-center mt-2 mb-2">
                                <div class="d-flex flex-row align-item-center">
                                    <a class="mb-2 mt-2 text-decoration-none fw-bold" style="color: black">
                                        <span>' . $pro["name"] . ' - <span>' . $pro["id"] . '</span></a>
                                </div>
                                    <a class="mb-2 mt-2 text-decoration-none" style="color: black"><span>' . $pro["price"] . '</span> đồng</a>
                                    <a class="mb-2 mt-2 text-decoration-none" style="color: black">Danh mục: <span>' . $cat[$pro["idCategory"]] . '</span></a>
                                    <a class="mb-2 mt-2 text-decoration-none" style="color: #aba9a9">Mô tả: <span>' . $pro["description"] . '</span></a>
                            </div>
                        </div>';
                $hint = $hint . $add;
              }
            }
          }
        echo json_encode($hint);
    } else {
        echo json_encode([]);
    }
}
?>