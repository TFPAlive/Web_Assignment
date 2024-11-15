<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Login</title>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://use.fontawesome.com/721412f694.js"></script>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<link rel="stylesheet" type="text/css" href="Views/CSS/loginregister.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap">
	</head>
	<body>
		<div class="login-pf-page">
            <div id="kc-header" class="login-pf-page-header">
                <div id="kc-header-wrapper">
                    <a href="../Member/index.html" style="height:100%" rel="nofollow">
                        <div class="kc-logo-text">
                            <span id="md-wordmark">Reincarnation of Bookworm</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="card-pf">
                <header class="login-pf-header">
                    <h1 id="kc-page-title"> Sign in to your account</h1>
                </header>
				<div id="notice"></div>
                <div id="kc-content">
                    <div id="kc-content-wrapper">
                        <div id="kc-form">
                            <div id="kc-form-wrapper">
								<form method="POST" class="my-login-validation" novalidate="" onsubmit="return false">
									<div class="form-group">
										<label for="validationCustomUsername" class="form-label">Username</label>
										<div class="input-group has-validation">
											<input type="text" class="form-control" id="validationCustomUsername" required name="user">
											<div class="invalid-feedback">Blank username</div>
										</div>
									</div>
									<div class="form-group mt-2 mb-2">
										<label class="d-flex justify-content-between" for="password">Password
										</label>
										<input id="password" type="password" class="form-control mt-2" name="password" required data-eye>
										<div class="invalid-feedback">Blank password</div>
									</div>
									<div class="form-check">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
                                    <div id="kc-form-buttons" class="form-group">
                                        <input type="hidden" id="id-hidden-input" name="credentialId" />
                                        <input onclick="login()" tabindex="4" class="pf-c-button pf-m-primary pf-m-block btn-lg" id="kc-login" type="button" value="Sign In" />
                                    </div>
								</form>
                            </div>
                        </div>
                        <div id="kc-info" class="login-pf-signup">
                            <div id="kc-info-wrapper">
                                <div id="kc-registration-container">
                                    <div id="kc-registration">
                                        <span>New user?<a tabindex="6" href="?url=/Home/Register/">Register</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="demo" hidden>
			<?php if(is_array($data["key"])) echo $data["key"][2]; else echo $data["key"]; ?>
		</div>
		<script src="Views/JS/login.js"></script>
	</body>
</html>
