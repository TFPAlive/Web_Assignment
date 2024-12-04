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
            <div class="order">
                <h2>Đơn hàng gần đây</h2>
                <?php
                if(empty($data["order"])) echo "order empty";
                else
                    foreach($data["order"] as $row) {
                        echo   "<div class='order-card'>
                    <div class='time-ordered'>". $row['TIME'] . "</div>
                    <div class='order-name'>". $row['NAME'] . "</div>
                    <div class='order-details'>";
                        foreach($data["product-in-order"] as $pio) {
                            if ($pio['OID'] == $row['ID']) {
                                echo "<div class='product-order'>
                            <div class='quantity'>". $pio['QUANTITY'] . "</div>
                            <div class='product-name'>". $pio['NAME'] . "</div>
                        </div>";
                            }
                        }
                        echo "<div class='total'>
                            Total: 
                            <div class='total-price'><span>". $row['TOTAL'] . "</span> VND</div>
                        </div>
                    </div>
                </div>";
                    }
                ?>
            </div>
        </div> 

        <?php require_once("Views/footer/index.php");?> 
        <script src="Views/JS/home.js"></script>
    </body>
</html>