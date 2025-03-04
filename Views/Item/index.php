<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Item</title>
        
        <script src="https://use.fontawesome.com/721412f694.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="stylesheet" href="Views/CSS/item.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap">
    </head>
    <body>
        <?php require_once("Views/Navbar/index.php");?>

        <div class="product-item"> 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 col-lg-12">
                        <div class="product-image">
                            <p>Home > Product</p>
                            <div class="main-img"> 
                                <?php $row_product = null;
                                if(empty($data["product_id"])) {echo "empty product";}
                                else {
                                    $row_product = mysqli_fetch_array($data["product_id"]);
                                    echo "<img src='" . $row_product["img"] . "'alt='image'/>";
                                }
                                ?> 
                            </div>
                        </div>
                        <div class="addition-img"> 
                            <?php
                            if(empty($data["sub_img"])) {echo "empty sub image";}
                            else {
                                echo "<img src='" . $row_product["img"] . "'alt='image'/>";
                                foreach ($data["sub_img"] as $row) {echo "<img src='" . $row["img"] . "' alt='image'/>";}
                            }
                            ?> 
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="right-content"> 
                            <?php
                            $sum = 0;
                            $sum_1 = 0;
                            $sum_2 = 0;
                            $sum_3 = 0;
                            $sum_4 = 0;
                            if(empty($data["product_id"])) {echo "empty product";}
                            else {
                                echo 
                                    "<h2 class='title-item'>" . $row_product["name"] . 
                                    "</h2>
                                    <p class='rating-star'>";
                            if(empty($data["comment"])) {echo "Chưa có đánh giá";} 
                            else {
                                foreach($data["comment"] as $cmt) {
                                    $sum += $cmt["star"];
                                    if ($cmt["star"] == "1") {$sum_1 += 1;} 
                                    else if ($cmt["star"] == "2") {$sum_2 += 1;} 
                                    else if ($cmt["star"] == "3") {$sum_3 += 1;} 
                                    else if ($cmt["star"] == "4") {$sum_4 += 1;}
                                }
                                $sum = round($sum / count($data["comment"]), 1);
                                echo $sum . "/5 <i class='fas fa-star'></i>";
                            }
                            echo 
                                "</p>
                                <p class='item-price'>" . $row_product["price"] . "đ</p>
                                <div class='descript-item'>
                                    <h3>Chi tiết sản phẩm</h3>
                                    <p>" . $row_product["decs"] . "</p>
                                </div>
                                <button type='button' id='edit-itemBtn'>Chỉnh sửa</button>
                                <span hidden id='get_name_val'>" . $row_product["name"] . "</span>
                                <div id='editItem-modal' class='edit-item-modal'>
                                    <div class='editItem-modal-content'>
                                        <div class='editItem-modal-header'>
                                            <span class='close-modal-edit'>&times;</span>
                                            <h2>Chỉnh sửa sản phẩm</h2>
                                        </div>
                                        <div class='editItem-modal-body'>
                                            <form action='?url=Home/update_item/" . $row_product["id"] . "/' method='POST' enctype='multipart/form-data'>
                                                <div class='row'>
                                                    <label class='col-lg-4' for='name'> Tên sản phẩm: </label>
                                                    <div class='col-lg-8'>
                                                        <input type='text' name='name' value='' placeholder='Nhập tên sản phẩm' class='form-control is-valid' id='validationSuccess' required>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <label class='col-lg-4' for='price'> Giá: </label>
                                                    <div class='col-lg-8'>
                                                        <input type='number' name='price' value='" . $row_product["price"] . "' placeholder='Nhập giá của sản phẩm' class='form-control is-valid' id='validationSuccess' required>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <label class='col-lg-4' for='e-image-url'>
                                                        <i class='far fa-image'></i> Ảnh sản phẩm: </label>
                                                    <div class='col-lg-8'>
                                                        <img src='" . $row_product["img"] . "' alt='main_img' style='width: 50%; margin-bottom: 1rem;'>
                                                        <input type='file' id='e-image-url' name='e-image-url[]' onchange='upload_pic(this)' hidden>
                                                    </div>
                                                </div>";
                            $count = 1;
                            foreach($data["sub_img"] as $row) {
                                echo
                                    "<div class='row'>
                                        <label class='col-lg-4' for='e-image-url-" . $count . "'>
                                            <i class='far fa-image'></i> Ảnh phụ thứ " . $count . ": </label>
                                        <div class='col-lg-8'><img src='" . $row["img"] . "' alt='main_img' style='width: 50%; margin-bottom: 1rem;'><input type='file' id='e-image-url-" . $count . "' name='e-image-url[]' onchange='upload_pic(this)' hidden></div>
                                    </div>";
                                $count += 1;
                            }
                            echo 
                                "<div class='row'>
                                    <label class='col-lg-4' for='description'> Mô tả: </label>
                                    <div class='col-lg-8'>
                                        <textarea rows='10' name='description' placeholder='Nhập mô tả sản phẩm' class='form-control is-valid' id='validationSuccess' required>" . $row_product["decs"] . "</textarea>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='remain'> Số lượng tồn kho: </label>
                                    <div class='col-lg-8'>
                                        <input type='number' name='remain' value='" . $row_product["num"] . "' placeholder='Nhập số lượng sản phẩm' class='form-control is-valid' id='validationSuccess' required>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='featured_product'> Top sản phẩm: </label>
                                    <div class='col-lg-8'>
                                        <select id='featured_product' name='featured_product'>
                                            <option value='0'"; if ($row_product["top_item"] == 0) echo "selected"; 
                                  echo">0</option>
                                  <option value='1'"; if ($row_product["top_item"] == 1) echo "selected"; 
                                  echo">1</option>
                                </select>
                              </div>
                            </div>
                            <div class='row'>
                              <label class='col-lg-4' for='category'>
                                Loại:
                              </label>
                              <div class='col-lg-8'>
                                <select id='category' name='category'>
                                  <option value='PC Gaming'"; if ($row_product["cate"] == "PC Gaming") echo "selected"; 
                                  echo">PC Gaming</option>
                                  <option value='Laptop Gaming'"; if ($row_product["cate"] == "Laptop Gaming") echo "selected"; 
                                  echo">Laptop Gaming</option>
                                  <option value='Console'"; if ($row_product["cate"] == "Console") echo "selected"; 
                                  echo">Console</option>
                                  <option value='Accessories'"; if ($row_product["cate"] == "Accessories") echo "selected"; 
                                  echo">Accessories</option>
                                </select>
                            </div>
                        </div>
                        <div class='btn-conf-edit'>
                            <button type='submit'>Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>";
                            }
                            ?> 
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <h2>Sản phẩm tương tự</h2>
                    <div class="related-items">
                        <div class="grid-product"> 
                            <?php
                            if(empty($data["cate_product"])) echo "empty product";
                            else {
                                foreach ($data["cate_product"] as $row) {
                                    echo 
                                        "<div class='col'>
                                            <div class='card'>
                                                <a class='img-holder' href='?url=Home/Item/" . $row["id"] . "'>
                                                    <img src='" . $row["img"] . "' class='card-img-top' alt='card-grid-image' />
                                                </a>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>" . $row["name"] . "</h5>
                                                    <p class='card-text related-item-price'> " . $row["price"] . " đ</p>
                                                </div>
                                            </div>
                                        </div>";
                                }
                            }
                            ?> 
                        </div>
                    </div>
                    <div class="comment-rating" id="rate-cmt">
                        <div class="row">
                            <div class="col-lg-2 star-numbers"> 
                                <?php
                                if(empty($data["comment"])) {
                                    echo "Chưa có đánh giá";
                                } else {
                                    echo 
                                        "<div class='sum-of-star'>" . $sum . " <span> <i class='fas fa-star'></i> </span>
                                        </div>
                                        <div class='according-to'>Theo " . count($data["comment"]) . " đánh giá</div>";
                                }
                                ?> 
                            </div>
                            <div class="col-lg-10">
                                <p>Lọc đánh giá</p>
                                <div class="filter-rating">
                                    <span id="filter-rating-btn">
                                        <button type="button" class="button-filter btn btn-primary current-btn" onclick="filterComment('all')">Tất cả ( <?php echo count($data["comment"]) ?>) </button>
                                        <button type="button" class="button-filter btn btn-primary" onclick="filterComment('5-star-num')">5 <span>
                                                <i class="fas fa-star"></i>
                                            </span> ( <?php echo count($data["comment"]) - $sum_1 - $sum_2 - $sum_3 - $sum_4 ?>) </button>
                                        <button type="button" class="button-filter btn btn-primary" onclick="filterComment('4-star-num')">4 <span>
                                                <i class="fas fa-star"></i>
                                            </span> ( <?php echo $sum_4 ?>) </button>
                                        <button type="button" class="button-filter btn btn-primary" onclick="filterComment('3-star-num')">3 <span>
                                                <i class="fas fa-star"></i>
                                            </span> ( <?php echo $sum_3 ?>) </button>
                                        <button type="button" class="button-filter btn btn-primary" onclick="filterComment('2-star-num')">2 <span>
                                                <i class="fas fa-star"></i>
                                            </span> ( <?php echo $sum_2 ?>) </button>
                                        <button type="button" class="button-filter btn btn-primary" onclick="filterComment('1-star-num')">1 <span>
                                                <i class="fas fa-star"></i>
                                            </span> ( <?php echo $sum_1 ?>) </button>
                                    </span>
                                    <div>
                                        <select name="sort-with" id="sort-with" <?php echo "onchange='sort_comment(" . $row_product["id"] . ")'"?>>
                                            <option value="show" selected="selected" disabled>Hiển thị</option>
                                            <option value="high-first">Đánh giá cao nhất trước</option>
                                            <option value="low-first">Đánh giá thấp nhất trước</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-script">
                        <div class="no-filter-cmt"></div> 
                        <?php
                        if(empty($data["comment"])) echo 
                                                        "<div class='card'>
                                                            <div class='card-body' id='if-no-cmt'>No comment</div>
                                                        </div>";
                        else {
                            $count = 0;
                            foreach ($data["comment"] as $row) {
                                echo 
                                    "<div class='card filterCmt " . $row["star"] . "-star-num'>
                                        <div class='card-body'>
                                            <div class='header-cmt'>
                                                <div>
                                                    <i class='fas fa-user-circle'></i>";
                                foreach($row["uname"] as $name) {echo "<span> " . $name["uname"] . "</span>";}
                                echo "<div class='star-cus-rate'>";
                                for($i = 0; $i < $row["star"]; $i++) {echo "<i class='fas fa-star'></i>";}
                                for($i = 0; $i < 5 - $row["star"]; $i++) {echo "<i class='far fa-star'></i>";}
                                echo 
                                    "</div>
                                </div>
                                <div>
                                    <p>" . $row["time"] . "</p>
                                </div>
                            </div>
                            <div class='comment-content'>
                                <div class='script-cmt'>
                                    <p>" . $row["content"] . "</p>
                                </div>
                                <div>
                                    <i class='fas fa-trash-alt' data-bs-toggle='modal' data-bs-target='#delcmtModal-" .$count . "'></i>
                                </div>
                                <div class='modal fade' id='delcmtModal-" .$count . "' tabindex='-1' aria-labelledby='delcmtModalLabel-" .$count . "' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='delcmtModalLabel-" .$count . "'>Bạn muốn xóa bình luận này</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'></div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Đóng</button>
                                                <button type='button' class='btn btn-primary' data-bs-dismiss='modal' onclick='delete_comment(" . $row["id"] . ", this)'>Xác nhận</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                                $count += 1;
                                echo 
                                    "</div>
                                </div>
                            </div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div> 
        </div>

        <?php require_once("Views/footer/index.php");?>
        <script src="Views/JS/item.js"></script>
    </body>
</html>