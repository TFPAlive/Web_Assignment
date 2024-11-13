<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product</title>
        
        <script src="https://use.fontawesome.com/721412f694.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="stylesheet" href="Views/CSS/product.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="company-product">
            <?php require_once "./Views/Navbar/index.php";?>
            <div class="header-product">
                <div id="myBtnContainer" class="filterBar">
                    <div class="tab-filter active-filter" onclick="filterSelection('all')"> All</div> 
                    <?php 
                    if (empty($data["cate"])) {echo "empty cate";} 
                    else {foreach ($data["cate"] as $row) {echo "<div class=\"tab-filter\" onclick=\"filterSelection('" . $row["cate"] . "')\">" . $row["cate"] ."</div>";}} 
                    ?>
                </div>
                <div class='form-sort'>
                    <button type='button' id='add-itemBtn'><i class='fas fa-plus'></i> Thêm sản phẩm </button>
                </div>
                <div id='addItem-modal' class='add-item-modal'>
                    <div class='addItem-modal-content'>
                        <div class='addItem-modal-header'>
                            <span class='close-modal-add'>&times;</span>
                            <h2>Thêm sản phẩm</h2>
                        </div>
                        <div class='addItem-modal-body'>
                            <form action='?url=Home/add_new_item' method='POST' class='needs-validation ' novalidate='' enctype='multipart/form-data'>
                                <div class='row'>
                                    <label class='col-lg-4' for='iname'> Tên sản phẩm: </label>
                                    <div class='col-lg-8'>
                                        <input type='text' name='iname' placeholder='Nhập tên sản phẩm' class='form-control is-valid' id='validationSuccess' required>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='price'> Giá: </label>
                                    <div class='col-lg-8'>
                                        <input type='number' name='price' placeholder='Nhập giá của sản phẩm' class='form-control is-valid' id='validationSuccess' required>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='image-url'>
                                        <i class='far fa-image'></i> Ảnh sản phẩm: </label>
                                    <div class='col-lg-8'>
                                        <input class='img_url' type='file' id='image-url' name='image-url[]' onchange='upload_pic(this)' class='form-control is-valid' id='validationSuccess' required hidden>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='image-url-1'>
                                        <i class='far fa-image'></i> Ảnh phụ thứ 1: </label>
                                    <div class='col-lg-8'>
                                        <input type='file' id='image-url-1' name='image-url[]' onchange='upload_pic(this)' hidden>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='image-url-2'>
                                        <i class='far fa-image'></i> Ảnh phụ thứ 2: </label>
                                    <div class='col-lg-8'>
                                        <input type='file' id='image-url-2' name='image-url[]' onchange='upload_pic(this)' hidden>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='image-url-3'>
                                        <i class='far fa-image'></i> Ảnh phụ thứ 3: </label>
                                    <div class='col-lg-8'>
                                        <input type='file' id='image-url-3' name='image-url[]' onchange='upload_pic(this)' hidden>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='image-url-4'>
                                        <i class='far fa-image'></i> Ảnh phụ thứ 4: </label>
                                    <div class='col-lg-8'>
                                        <input type='file' id='image-url-4' name='image-url[]' onchange='upload_pic(this)' hidden>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='description'> Mô tả: </label>
                                    <div class='col-lg-8'>
                                        <textarea name='description' placeholder='Nhập mô tả sản phẩm' class='form-control is-valid' id='validationSuccess' required></textarea>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='remain'> Số lượng tồn kho: </label>
                                    <div class='col-lg-8'>
                                        <input type='number' name='remain' placeholder='Nhập số lượng sản phẩm' class='form-control is-valid' id='validationSuccess' required>
                                    </div>
                                </div>
                                <div class='row'>
                                    <label class='col-lg-4' for='category' class='form-control is-valid' id='validationSuccess' required> Loại: </label>
                                    <div class='col-lg-8'>
                                        <label for='validationCustom04' class='form-label'></label>
                                        <select name='category' class='form-select' id='validationCustom04' required=''>
                                            <option selected='' disabled='' value=''>Chọn loại</option>
                                            <option value='PC Gaming'>PC Gaming</option>
                                            <option value='Laptop Gaming'>Laptop Gaming</option>
                                            <option value='Console'>Console</option>
                                            <option value='Accessories'>Accessories</option>
                                        </select>
                                        <div class='invalid-feedback'> Vui lòng chọn loại. </div>
                                    </div>
                                </div>
                                <div class='btn-conf-add'>
                                    <button type='submit' onclick='Validate()'>Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="list-product">
                    <div class="grid-product"> 
                        <?php if (empty($data["product"])) {echo "empty product";} 
                        else {
                            $count = 0;
                            foreach ($data["product"] as $row) {
                                echo 
                                    "<div class='grid-item filterDiv " . $row["cate"] ."'>
                                        <div class='card'>
                                                <a class='img-holder' href='?url=Home/Item/" . $row["id"] ."/'>
                                                    <img src='" . $row["img"] . "'class='card-img-top' alt='card-grid-image'/>
                                                </a>
                                            <div class='card-body'>
                                                <h5 class='card-title'>" . $row["name"] . "</h5>
                                                <p class='card-text each-item-price fw-bold fs-5'>" . $row["price"] . "đ</p>
                                                <div class='d-flex justify-content-between'>
                                                    <div style='text-align: left;' class='quantity-section'>
                                                            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal-" . $count . "'>
                                                                <i class='far fa-trash-alt'></i>Xóa
                                                            </button>
                                                            <div class='modal fade' id='exampleModal-" . $count . "' tabindex='-1' aria-labelledby='exampleModalLabel-" . $count . "' aria-hidden='true'>
                                                            <div class='modal-dialog modal-dialog-centered'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='exampleModalLabel-" . $count . "'>Xác nhận</h5>
                                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='modal-body'>Bạn có chắc chắn muốn xóa sản phẩm này</div>
                                                                    <div class='modal-footer'>
                                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Đóng</button>
                                                                        <button type='button' class='btn btn-primary' data-bs-dismiss='modal' onclick='remove_item(" . (int) $row["id"] . ", this)'>Xác nhận</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style='text-align: right'>
                                                        <a href='?url=Home/Item/" . $row["id"] . "/'>
                                                            <button type='button' class='btn btn-primary'>
                                                                <i class='far fa-edit'></i> Chỉnh sửa
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                $count += 1;
                            }
                        } 
                        ?> 
                    </div>
                </div>
            </div>
            <div id="notice"></div>
        </div>
        <?php require_once "./Views/footer/index.php"; ?>
        <script src="./Views/JS/product.js"></script>
    </body>
</html>