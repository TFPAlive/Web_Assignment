<?php

class Home extends Controller{
        function Home_page($user){
            $cus = $this->model($user);
            $this->view("Home_page", [
                "user" => $user,
                "collection" => $cus->get_swiper_slide_collection(), //$data["collection"] = $cus->get_swiper_slide_collection() 
                "featured" => $cus->get_products("", ""),
                "order" => $cus->get_order(),
                "product-in-order" => $cus->product_in_order()
            ]);
        }
        function About_us($user){
            $this->view("About_US", []);
        }
        function Products($user, $sort_1="", $sort_2=""){
            $cus = $this->model($user);
            $this->view("Products", [
                "cate" => $cus->get_product_cates(),
                "product" => $cus->get_products($sort_1, $sort_2),
                "user" => $user
            ]);
        }
        function Item($user, $pid){
            $cus = $this->model($user);
            $comment = $cus->get_item_comment($pid[2], "");
            $cmt_info = array();
            foreach($comment as $cmt){
                array_push($cmt_info, (["id" => $cmt["id"], "pid" => $cmt["pid"], "uid" => $cmt["uid"], "uname" => $cus->get_cmt_user_name($cmt["uid"]), "star" => $cmt["star"], "content" => $cmt["content"], "time" => $cmt["time"]]));
            }
            $this->view("Item", [
                "product_id" => $cus->get_product_at_id($pid[2]),
                "sub_img" => $cus->get_sub_img($pid[2]),
                "cate_product" => $cus->get_product_same_cate($pid[2]),
                "comment" => $cmt_info,
                "user" => $user
            ]);
        }
        function Contact_us($user){
            $this->view("Contact_US", [
                "user" => $user,
                "message" => $this->model($user)->get_message()
            ]);
        }
        function register($user){
            $this->view("register", []);
        }
        function insert_message($user, $array){
            if($this->model($user)->insert_message($array[2], $array[3], $array[4], $array[5], $array[6])) echo "ok";
            else echo "null";
        }
        function update_user($user, $array){
            if($this->model($user)->update_user($array[2], $array[3], $array[4], $array[5])) echo "ok";
            else echo "null";
        }
        function delete_product_incart($user, $array){
            if($this->model($user)->delete_product_incart((int)$array[2])) echo "ok";
            else echo "null";
        }
        function check_login($user, $array){
            if($array[2] == "admin" &&  $array[3] == "admin"){ // bình luận trang tin tức / bình luần trang item // add to cart
                $_SESSION["user"] = "manager";
                if(!isset($array[4])) $array[4] = "Home_page";
                echo "?url=/Home/" . $array[4] . "/";
            }
        }
        function update_product_in_cart($user, $array){
            $action = $this->model($user);
            for($i = 0; $i < (int)$array[2]; $i++){
                $action->update_product_in_cart((int)$array[2 + 3*$i + 1], (int)$array[2 + 3*$i +2], $array[2 + 3*$i + 3]);
            }
            echo "?url=/Home/Payment/";
        }
        function delete_order_combo_id($user, $array){
            if($this->model($user)->delete_order_combo_id($array[2])) echo "ok";
            else echo "null";
        }
        function member_page($user){
                $this->view("Memberpage", [
                    "state" => $user,
                    "member" => $this->model($user)->get_all_user_info()
                ]);
            }
        function add_item_comment($user, $array){
            $this->model($user)->add_item_comment($array[2], $array[3], $array[4], $_SESSION["id"]);
        }   
        function update_profile($user){
            if( isset($_POST["fname"]) && isset($_POST["mail"]) && isset($_POST["username"]) && isset($_POST["cmnd"]) && isset($_POST["phone"]) && isset($_POST["address"]))
            {
                if(isset($_FILES["file_pic"])&& $_FILES["file_pic"]['name'] != ""){
                    if(!file_exists("./Views/images/" . $_FILES["file_pic"]['name']))
                        move_uploaded_file($_FILES['file_pic']['tmp_name'], './Views/images/' . $_FILES['file_pic']['name']);
                    $this->model($user)->update_pic($_SESSION["id"], './Views/images/' . $_FILES['file_pic']['name']);
                }
                $this->model($user)->update_profile_nope_img($_SESSION["id"], $_POST["fname"], $_POST["username"], $_POST["cmnd"], $_POST["phone"], $_POST["address"], $_POST["mail"]);
            }
            $this->member_page($user);
            
        }
        function update_password_profile($user, $array){
            if($this->model($user)->update_password_profile($_SESSION["id"], (string)$array[2])){
                echo "ok";
            }
            else echo "null";
        }
        function add_new_item($user){
            if(isset($_POST["iname"]) && isset($_POST["price"]) && isset($_FILES["image-url"]) && isset($_POST["description"]) && isset($_POST["remain"]) && isset($_POST["category"]))
            {
                if(!file_exists("./Views/images/" . $_FILES["image-url"]['name'][0])){
                    move_uploaded_file($_FILES['image-url']['tmp_name'][0], './Views/images/' . $_FILES['image-url']['name'][0]);
                }
                if(!file_exists("./Views/images/" . $_FILES["image-url"]['name'][1])){
                    move_uploaded_file($_FILES['image-url']['tmp_name'][1], './Views/images/' . $_FILES['image-url']['name'][1]);
                }  
                if(!file_exists("./Views/images/" . $_FILES["image-url"]['name'][2])){
                    move_uploaded_file($_FILES['image-url']['tmp_name'][2], './Views/images/' . $_FILES['image-url']['name'][2]);
                }    
                if(!file_exists("./Views/images/" . $_FILES["image-url"]['name'][3])){
                    move_uploaded_file($_FILES['image-url']['tmp_name'][3], './Views/images/' . $_FILES['image-url']['name'][3]);
                }
                if(!file_exists("./Views/images/" . $_FILES["image-url"]['name'][4])){
                    move_uploaded_file($_FILES['image-url']['tmp_name'][4], './Views/images/' . $_FILES['image-url']['name'][4]);
                }
                $pid = $this->model($user)->add_new_item($_POST["iname"], $_POST["price"], $_POST["description"], $_POST["remain"], $_POST["category"], './Views/images/' . $_FILES['image-url']['name'][0]);
                $this->model($user)->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][1]);
                $this->model($user)->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][2]);
                $this->model($user)->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][3]);
                $this->model($user)->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][4]);
            }
            $this->Products($user);
        }
        function update_item($user, $pid){
            if(isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["description"]) && isset($_POST["remain"]) && isset($_POST["category"]))
            {
                $sub_id = mysqli_fetch_all($this->model($user)->get_sub_img_id($pid[2]), MYSQLI_ASSOC);
                if(isset($_FILES["e-image-url"])){
                    if($_FILES['e-image-url']['name'][0] != ""){
                        if(!file_exists("./Views/images/" . $_FILES["e-image-url"]['name'][0])){
                            move_uploaded_file($_FILES['e-image-url']['tmp_name'][0], './Views/images/' . $_FILES['e-image-url']['name'][0]);
                        }
                        $this->model($user)->update_item_img($pid[2], './Views/images/' . $_FILES['e-image-url']['name'][0]);
                    }
                    for ($x = 1; $x < count($_FILES["e-image-url"]['name']); $x++) {
                        if(!file_exists("./Views/images/" . $_FILES["e-image-url"]['name'][1])){
                            move_uploaded_file($_FILES['e-image-url']['tmp_name'][$x], './Views/images/' . $_FILES['e-image-url']['name'][$x]);
                        }
                        $this->model($user)->update_sub_img($sub_id[$x -1]["id"], './Views/images/' . $_FILES['e-image-url']['name'][$x]);
                    }
                }
                $this->model($user)->update_item_nope_img($pid[2], $_POST["name"], $_POST["price"], $_POST["description"], $_POST["remain"], $_POST["category"], $_POST["featured_product"]);  
            }
            else {echo "Not Update";}
            $this->Item($user, $pid);
        }
        function delete_item($user, $array){
            if($this->model($user)->delete_item((int)$array[2])){
                echo "OK";
            } else {
                echo "Nope";
            }
        }
        function sendmessage($user, $array){
            $to = explode("-", $array[2])[1];
            $subject = explode("-", $array[3])[1];
            $message = explode("-", $array[4])[1];
            if(mail($to, $subject, $message)){
                $this->model($user)->update_message((int)$array[5]);
            }
            else echo "null";
        }
        function delete_comment($user, $array){
            if($this->model($user)->delete_comment((int)$array[2])){
                echo "OK";
            } else {
                echo "Nope";
            }
        }
        function sort_product($user){
            if(isset($_POST["sort-by"]) && isset($_POST["order-by"])){
                $sort_1 = $_POST["sort-by"];
                $sort_2 = $_POST["order-by"];
                $this->Products($user, $sort_1, $sort_2);
            }
        }
        function sort_comment($user, $array){
            $result = $this->model($user)->get_item_comment((int)$array[2], $array[3]);
            $cmt_info = array();
            foreach($result as $cmt){
                array_push($cmt_info, (["id" => $cmt["id"], "pid" => $cmt["pid"], "uid" => $cmt["uid"], "uname" => $this->model($user)->get_cmt_user_name($cmt["uid"]), "star" => $cmt["star"], "content" => $cmt["content"], "time" => $cmt["time"]]));
            }
            echo "<div class=\"no-filter-cmt\"></div>";
            if(empty($cmt_info)) echo "<div class=\"card\">
                                                  <div class=\"card-body\" id=\"if-no-cmt\">No comment</div></div>";
              else {
                $count = 0;
                foreach ($cmt_info as $row) {
                  echo "<div class=\"card filterCmt " . $row["star"] . "-star-num\">
                  <div class=\"card-body\">
                    <div class=\"header-cmt\">
                      <div>
                        <i class=\"fas fa-user-circle\"></i>";
                        foreach($row["uname"] as $name) {
                          echo "<span> " . $name["uname"] . "</span>";
                        }
                        echo "
                        <div class=\"star-cus-rate\">";
                          for($i = 0; $i < $row["star"]; $i++) {
                            echo "<i class=\"fas fa-star\"></i>";
                          }
                          for($i = 0; $i < 5 - $row["star"]; $i++) {
                            echo "<i class=\"far fa-star\"></i>";
                          }
                        echo "  
                        </div>
                      </div>
                      <div>
                        <p>" . $row["time"] . "</p>
                      </div>
                    </div>
                    <div class=\"comment-content\">
                      <div class=\"script-cmt\">
                        <p>" . $row["content"] . "</p>
                      </div>";
                    if($user == "manager"){
                      echo "<div><i class=\"fas fa-trash-alt\" data-bs-toggle=\"modal\" data-bs-target=\"#delcmtModal-" .$count . "\"></i></div>";
                      echo "<div class=\"modal fade\" id=\"delcmtModal-" .$count . "\" tabindex=\"-1\" aria-labelledby=\"delcmtModalLabel-" .$count . "\" aria-hidden=\"true\">
                        <div class=\"modal-dialog modal-dialog-centered\">
                          <div class=\"modal-content\">
                            <div class=\"modal-header\">
                              <h5 class=\"modal-title\" id=\"delcmtModalLabel-" .$count . "\">Bạn muốn xóa bình luận này</h5>
                              <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                            </div>
                            <div class=\"modal-body\">
                              
                            </div>
                            <div class=\"modal-footer\">
                              <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Đóng</button>
                              <button type=\"button\" class=\"btn btn-primary\" data-bs-dismiss=\"modal\" onclick=\"delete_comment(" . $row["id"] . ", this)\">Xác nhận</button>
                            </div>
                          </div>
                        </div>
                      </div>";
                      $count += 1;
                    }
                echo "</div>
                    </div>
                </div>";
                }
              }
        }
        function logout($user){
            if($user == "member"){
                $cart = mysqli_fetch_array($this->model($user)->get_sum_cart($_SESSION["id"]))["sum"];
                $combo = mysqli_fetch_array($this->model($user)->get_sum_order_Combo($_SESSION["id"]))["sum"];
                $total = 0;
                if($cart != NULL) $total += (int)$cart;
                if($combo != NULL) $total += (int)$combo;
                $this->model($user)->update_Rank($_SESSION["id"], $total);
                $this->model($user)->clear_cart();
            }
            session_unset(); 
           $this->Home_page("customer");
        }
        function change_passwork($user, $array){
            $to = mysqli_fetch_array($this->model($user)->change_passwork($array[2]))["mail"];
            echo $to;
            if( $to != ""){
                $subject = "CHANGE PASSWORD";
                $message = "Chào bạn, \nMật khẩu mới của bạn sẽ là: 123456hello\n";
                if(mail($to, $subject, $message)){
                    $this->model($user)->change_passwork_mail($to, "123456hello");
                    echo "OK";
                }
                else{ echo "null";}
            }
            else{ echo "null";}
        }
        function get_user($user, $array){
            $data = $this->model($user)->get_user((int)$array[2]);
            if(!empty($data)){
                foreach($data as $row){
                    echo "</div class=\"row\">";
                    echo "<div class=\"col-12\">
                            <div class=\"row\">
                                <div class=\"col-4\"><strong>Họ và tên:</strong></div>
                                <div class=\"col-8\"><h5>" . $row["name"] .  "</h5></div>
                            </div>
                        </div>";
                    echo "<div class=\"col-12\">
                            <div class=\"row\">
                                <div class=\"col-4\"><strong>SĐT:</strong></div>
                                <div class=\"col-8\"><h5>" . $row["phone"] .  "</h5></div>
                            </div>
                        </div>";
                    echo "<div class=\"col-12\">
                            <div class=\"row\">
                                <div class=\"col-4\"><strong>Email:</strong></div>
                                <div class=\"col-8\"><h5>" . $row["mail"] .  "</h5></div>
                            </div>
                        </div>";
                    echo "</div>";
                }
            }
            else echo "null";
        }
        function remove_user($user, $array){
            if($this->model($user)->remove_user((int)$array[2])) echo "ok";
            else echo "null";
        }
        function ban_user($user, $array){
            if($this->model($user)->ban_user((int)$array[2])){
                if($this->model($user)->remove_user($array[2])) echo "ok";
                else echo "null";
            }
            else echo "null";
        }
        function create_account($user, $array){
            if(mysqli_fetch_array($this->model($user)->check_account_ban($array[3]))["id"] == NULL){
                if(mysqli_fetch_array($this->model($user)->check_account_inside($array[3], $array[4]))["id"] == NULL){
                    if($this->model($user)->create_account($array[2], $array[3], $array[4], $array[5], $array[6])){
                        echo "ok";
                    }
                    else echo "null3";
                }
                else echo "null2";
            }
            else echo "null1";
        }
    }
?>