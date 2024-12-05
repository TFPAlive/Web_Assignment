<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Member Info</title>

        <script src="https://use.fontawesome.com/721412f694.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		
		<link rel="stylesheet" href="Views/CSS/memberpage.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;1,200;1,400;1,500;1,600;1,700;1,800&display=swap">
  </head>
  <body> 
    <?php require_once("./Views/Navbar/index.php"); ?> 
    
    <div class="container-fuild member-info">
      <div class="row flex-wrap m-0 justify-content-center">
        <h2>Danh sách thành viên</h2> 
        <?php 
        if(!empty($data["member"])) {
            foreach($data["member"] as $row) {
                echo "<div class='col-sm-6 col-md-5 col-lg-4 col-xl-3'>
                    <div class='card card_node'>
                        <img class='card-img-top' src=' " . $row["img"] . " ' alt='Card image'>
                        <div class='card-body flex justify-content-center'>
                            <button type='button' class='btn btn-primary' onclick='see_profile(this)' value=' " . $row["id"] . " '>Chi tiết </button>
                        </div>
                    </div>
                </div> ";
            }
        }
        ?>
      </div>
    </div> 
    <?php echo 
        "<div id='myModal' class='modal'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h2>Thông tin khách hàng</h2>
                    <span class='close'>&times;</span>
                </div>
                <div class='modal-body'></div>
                <div class='modal-footer justify-content-end d-inline-flex'>
                    <button type='button' class='btn btn-danger modal-button' onclick='remove_account(this)'>Xóa tài khoản</button>
                    <button type='button' class='btn btn-danger modal-button' onclick='ban_account(this)'>Cấm tài khoản</button>
                </div>
            </div>
        </div>";
     ?> 
     <?php require_once("./Views/footer/index.php");?> 
     <script src="./Views/JS/manascript.js"></script>
  </body>
</html>