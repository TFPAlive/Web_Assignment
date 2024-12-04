<?php

class Home extends Controller{
        function Statistic(): void{
            $cus = $this->model(model: 'manager');
            $this->view(view: "Home_page", data: [
                "collection" => $cus->get_swiper_slide_collection(),
                "featured" => $cus->get_products("", ""),
                "order" => $cus->get_order(),
                "product-in-order" => $cus->product_in_order()
            ]);
        }
        function About_us(): void{
            $this->view(view: "About_US", data: []);
        }
        function Products($_, $sort_1="", $sort_2=""): void{
            $cus = $this->model(model: 'manager');
            $this->view(view: "Products", data: [
                "cate" => $cus->get_product_cates(),
                "product" => $cus->get_products($sort_1, $sort_2)
            ]);
        }
        function Item($_, $pid): void{
            $cus = $this->model(model: 'manager');
            $comment = $cus->get_item_comment($pid[2], "");
            $cmt_info = array();
            foreach($comment as $cmt){
                array_push( $cmt_info, (["id" => $cmt["id"], "pid" => $cmt["pid"], "uid" => $cmt["uid"], "uname" => $cus->get_cmt_user_name($cmt["uid"]), "star" => $cmt["star"], "content" => $cmt["content"], "time" => $cmt["time"]]));
            }
            $this->view(view: "Item", data: [
                "product_id" => $cus->get_product_at_id($pid[2]),
                "sub_img" => $cus->get_sub_img($pid[2]),
                "cate_product" => $cus->get_product_same_cate($pid[2]),
                "comment" => $cmt_info
            ]);
        }
        function Contact_us(): void{
            $this->view(view: "Contact_US", data: [
                "message" => $this->model(model: 'manager')->get_message()
            ]);
        }
        function member_page(): void{
            $this->view("Memberpage", data: [
                "member" => $this->model(model: 'manager')->get_all_user_info()
            ]);
        }
        function add_new_item(){
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
                $pid = $this->model(model: 'manager')->add_new_item($_POST["iname"], $_POST["price"], $_POST["description"], $_POST["remain"], $_POST["category"], './Views/images/' . $_FILES['image-url']['name'][0]);
                $this->model(model: 'manager')->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][1]);
                $this->model(model: 'manager')->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][2]);
                $this->model(model: 'manager')->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][3]);
                $this->model(model: 'manager')->add_sub_img($pid, './Views/images/' . $_FILES['image-url']['name'][4]);
            }
            $this->Products(null);
        }
        function update_item($pid){
            if(isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["description"]) && isset($_POST["remain"]) && isset($_POST["category"]))
            {
                $sub_id = mysqli_fetch_all($this->model(model: 'manager')->get_sub_img_id($pid[2]), MYSQLI_ASSOC);
                if(isset($_FILES["e-image-url"])){
                    if($_FILES['e-image-url']['name'][0] != ""){
                        if(!file_exists("./Views/images/" . $_FILES["e-image-url"]['name'][0])){
                            move_uploaded_file($_FILES['e-image-url']['tmp_name'][0], './Views/images/' . $_FILES['e-image-url']['name'][0]);
                        }
                        $this->model(model: 'manager')->update_item_img($pid[2], './Views/images/' . $_FILES['e-image-url']['name'][0]);
                    }
                    for ($x = 1; $x < count($_FILES["e-image-url"]['name']); $x++) {
                        if(!file_exists("./Views/images/" . $_FILES["e-image-url"]['name'][1])){
                            move_uploaded_file($_FILES['e-image-url']['tmp_name'][$x], './Views/images/' . $_FILES['e-image-url']['name'][$x]);
                        }
                        $this->model(model: 'manager')->update_sub_img($sub_id[$x -1]["id"], './Views/images/' . $_FILES['e-image-url']['name'][$x]);
                    }
                }
                $this->model(model: 'manager')->update_item_nope_img($pid[2], $_POST["name"], $_POST["price"], $_POST["description"], $_POST["remain"], $_POST["category"], $_POST["featured_product"]);  
            }
            else {echo "Not Update";}
            $this->Item(null, $pid);
        }
        function delete_item($array){
            if($this->model(model: 'manager')->delete_item((int)$array[2])){
                echo "OK";
            } else {
                echo "Nope";
            }
        }
        function delete_comment($array){
            if($this->model(model: 'manager')->delete_comment((int)$array[2])){
                echo "OK";
            } else {
                echo "Nope";
            }
        }
        function sort_product(){
            if(isset($_POST["sort-by"]) && isset($_POST["order-by"])){
                $sort_1 = $_POST["sort-by"];
                $sort_2 = $_POST["order-by"];
                $this->Products($sort_1, $sort_2);
            }
        }
        function sort_comment($array){
            $result = $this->model(model: 'manager')->get_item_comment((int)$array[2], $array[3]);
            $cmt_info = array();
            foreach($result as $cmt){
                array_push($cmt_info, (["id" => $cmt["id"], "pid" => $cmt["pid"], "uid" => $cmt["uid"], "uname" => $this->model(model: 'manager')->get_cmt_user_name($cmt["uid"]), "star" => $cmt["star"], "content" => $cmt["content"], "time" => $cmt["time"]]));
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
        function get_user($_, $array){
            $data = $this->model(model: 'manager')->get_user((int)$array[2]);
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
        function remove_user($array){
            if($this->model(model: 'manager')->remove_user((int)$array[2])) echo "ok";
            else echo "null";
        }
        function ban_user($array){
            if($this->model(model: 'manager')->ban_user((int)$array[2])){
                if($this->model(model: 'manager')->remove_user($array[2])) echo "ok";
                else echo "null";
            }
            else echo "null";
        }
    }
?>