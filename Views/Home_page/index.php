<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Homepage</title>

        <script src="https://use.fontawesome.com/721412f694.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link rel="stylesheet" href="Views/CSS/home.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.8/css/boxicons.min.css">
    </head>
    <body> 
        <?php require("Views/Navbar/index.php");?> 

        <div class="homepage">
            <div class="hero">
                <div class="row1">
                    <div class="swiper-container slider-1">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="Views/images/1.jpg" alt=""/>
                                <div class="content">
                                    <h1 style="color: #ffc107;"> UNLOCK <br/> YOUR POTENTIAL</h1>
                                    <p style="color: #ffc107;"> With Apple, HP, Lenovo, DELL, ACER, ASUS </p>
                                    <a href="?url=Home/Products/" style="color: white;">Buy Now</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="Views/images/2.png" alt="hero image"/>
                                <div class="content">
                                    <h1> Hỗ trợ tư vấn trực tiếp<br/>
                                        <span>20% off</span> tại cửa hàng
                                    </h1>
                                    <p style="color: white;"> Cung cấp các gói chứa đầy đủ một bộ sưu tập phù hợp với từng sở thích, tính cách </p>
                                    <a href="?url=Home/Products/">Mua ngay</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="Views/images/3.webp" alt="hero image"/>
                                <div class="content">
                                    <h1>Đăng ký ngay</h1>
                                    <p style="color: #ffc107;">Nhanh tay đăng ký tài khoản để nhận được nhiều ưu đãi hấp dẫn cũng như những trải nghiệm thú vị nhé!</p>
                                    <a href="?url=Home/Products/">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="arrows d-flex">
                    <div class="swiper-prev d-flex">
                        <i class="bx bx-chevrons-left swiper-icon"></i>
                    </div>
                    <div class="swiper-next d-flex">
                        <i class="bx bx-chevrons-right swiper-icon"></i>
                    </div>
                </div>
            </div>
            <div class="shop-collection">
                <h2>
                    <i class="far fa-hand-point-right"></i> Các sản phẩm của Shop <i class="far fa-heart"></i>
                </h2>
                <div class="container">
                    <div class="collection-layout"> 
                        <?php
                        $shirt = false;
                        $pant = false;
                        $ass = false;
                            foreach($data["collection"] as $row) {
                                if(($row["cate"] == "Shirt" && !$shirt) || ($row["cate"] == "Trousers" && !$pant) || ($row["cate"] == "Accessories" && !$ass)){
                                    if($row["cate"] == "Shirt") {$shirt = true;}
                                    if($row["cate"] == "Trousers") {$pant = true;}
                                    if($row["cate"] == "Accessories") {$ass = true;}
                                    echo    
                                        "<div class='shop-item'>
                                            <img src='" . $row["img"] . "' alt='image'/>
                                            <div class='collection-content'>
                                                <h3>" . $row["cate"] . "</h3>
                                                <a href='?url=Home/Products'>MUA NGAY</a>
                                            </div>
                                        </div>";
                                }
                            }
                        ?> 
                    </div>
                </div>
            </div>
            <div class="featured">
                <h2>
                    <i class="far fa-hand-point-right"></i> Sản phẩm được ưa chuộng <i class="fas fa-chart-line"></i>
                </h2>
                <div class="row1 container">
                    <div class="swiper-container slider-2">
                        <div class="swiper-wrapper noneheight"> 
                            <?php
                            if(empty($data["featured"])) echo "featured empty";
                            else
                                foreach($data["featured"] as $row) {
                                    if($row["top_seller"] == 1){
                                        echo 
                                            "<div class='swiper-slide'>
                                                <span></span>
                                                <div class='product'>
                                                    <div class='img-container'>
                                                        <img src='" . $row["img"] ."' alt=''/>
                                                    </div>
                                                    <div class='bottom'>
                                                        <a href='?url=Home/Item/" . $row["id"] . "'>" . $row["name"] . "</a>
                                                        <div class='price'>
                                                            <span class='feature-item-price'>" . $row["price"] . "đ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                    }
                                }
                            ?> 
                        </div>
                    </div>
                </div>
                <div class="arrows d-flex">
                    <div class="custom-next d-flex">
                        <i class="bx bx-chevrons-right swiper-icon"></i>
                    </div>
                    <div class="custom-prev d-flex">
                        <i class="bx bx-chevrons-left swiper-icon"></i>
                    </div>
                </div>
            </div>
        </div> 

        <?php require_once("Views/footer/index.php");?> 
        <script src="Views/JS/home.js"></script>
        <script>
            document.querySelector("#navbar > nav > div.login-button > div > button").onclick = function() {
                change_show();
            }
        </script>
    </body>
</html>