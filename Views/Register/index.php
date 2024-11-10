<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Register</title>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://use.fontawesome.com/721412f694.js"></script>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<link rel="stylesheet" type="text/css" href="Views/Login/loginregister.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap">
    </head>
    <body>
        <div class="login-pf-page">
            <div id="kc-header" class="login-pf-page-header">
                <div id="kc-header-wrapper" class="">
                    <a href="../Member/index.html" style="height:100%" rel="nofollow">
                        <div class="kc-logo-text">
                            <span id="md-logo"></span>
                            <span id="md-wordmark">Reincarnation of Bookworm</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card-pf">
                <header class="login-pf-header">
                    <div class="">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 subtitle">
                            <span class="subtitle"><span class="required">*</span> Required fields </span>
                        </div>
                        <h1 id="kc-page-title">Register an account</h1>
                    </div>
                </header>
                <div id="notice"></div>
                <div id="kc-content">
                    <div id="kc-content-wrapper">
                        <form method="POST" class="my-login-validation" novalidate="" onsubmit="return false">
                            <div class="form-group">
                                <label for="fname">Họ và tên</label>
                                <input id="fname" type="text" class="form-control mt-1" name="fname" required autofocus />
                                <div class="invalid-feedback">Họ và tên trống!</div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="cmnd">CMND/CCCD</label>
                                <input id="cmnd" type="text" class="form-control mt-1" name="cmnd" required />
                                <div class="invalid-feedback">CMND/CCCD trống!</div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">E-Mail</label>
                                <input id="email" type="email" class="form-control mt-1" name="email" required />
                                <div class="invalid-feedback">Email không hợp lệ!</div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="name">Tên đăng nhập</label>
                                <input id="name" type="text" class="form-control mt-1" name="name" required autofocus />
                                <div class="invalid-feedback">Tên đăng nhập trống!</div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="password">Mật khẩu</label>
                                <input id="password" type="password" class="form-control mt-1" name="password" required data-eye />
                                <div class="invalid-feedback">Mật khẩu trống!</div>
                            </div>
                            <div class="form-group mt-2">
                                <label for="re_password">Xác thực mật khẩu</label>
                                <input id="re_password" type="password" class="form-control mt-1" name="re_password" required data-eye />
                                <div class="invalid-feedback">Mật khẩu xác thực trống!</div>
                                <div class="invalid-feedback">Mật khẩu không trùng khớp!</div>
                            </div>
                            <div id="kc-form-options" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="">
                                    <span><a href="?url=/Home/Login">Back to Login</a></span>
                                </div>
                            </div>
                            <div id="kc-form-buttons" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input onclick="register()" type="button" class="pf-c-button pf-m-primary pf-m-block btn-lg" id="register-button" value="Register">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="Views/JS/register.js"></script>
    </body>
</html>