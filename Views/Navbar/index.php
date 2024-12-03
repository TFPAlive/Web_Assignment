<link rel="stylesheet" href="Views/CSS/navbar.css">

<div id="navbar" class="sticky-top">
    <nav>
        <h1><i><img src="Views/images/Icon.png" width="39" height="39"></i><a href="?url=Home/Home_page/">BPC</a></h1>

        <div class="burger">  
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>

        <ul class="nav-links">
            <li><a href="?url=Home/Home_page/">Trang chủ</a></li>
            <li><a href="?url=Home/About_us/">Về chúng tôi</a></li>
            <li><a href="?url=Home/Products/">Sản phẩm</a></li>
            <li><a href="?url=Home/Contact_us/">Liên hệ</a></li>
            <li><a href="?url=Home/member_page/">Quản lý</a></li>
        </ul>

        <form class="form">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Search...">  
            </div>
            <button class="btn btn-dark" type="button" onclick="search_item(this)"><i class="fas fa-search"></i></button>
        </form>
    </nav>
</div>

<script src="Views/JS/navbarScript.js"></script>