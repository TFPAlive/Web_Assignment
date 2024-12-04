<?php
class manager extends DB{
    public function get_swiper_slide_collection(){
        $query = "SELECT `product`.`IMG_URL` AS \"img\", `product`.`CATEGORY` AS \"cate\" FROM `product` WHERE `product`.`TOP_PRODUCT` = 1;";
        return mysqli_query($this->connect, $query);
    }
    public function get_product_cates(){
        $query = "SELECT `product`.`CATEGORY` AS \"cate\" FROM `product` GROUP BY `product`.`CATEGORY` ORDER BY `product`.`ID`;";
        return mysqli_query($this->connect, $query);
    }
    public function get_products($sort_1, $sort_2){
        $query = "";
        if($sort_1 == "" && $sort_2 == ""){
            $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` AS \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_seller\" FROM `product`;";
        }
        else if($sort_1 == "pname" && $sort_2 == "ASC"){
            $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` AS \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_seller\" FROM `product` ORDER BY `product`.`NAME` ASC;";
        }
        else if($sort_1 == "pname" && $sort_2 == "DESC"){
            $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` AS \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_seller\" FROM `product` ORDER BY `product`.`NAME` DESC;";
        }
        else if($sort_1 == "price" && $sort_2 == "ASC"){
            $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` AS \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_seller\" FROM `product` ORDER BY `product`.`PRICE` ASC;";
        }
        else if($sort_1 == "price" && $sort_2 == "DESC"){
            $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` AS \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_seller\" FROM `product` ORDER BY `product`.`PRICE` DESC;";
        }
        
        return mysqli_query($this->connect, $query);
    }
    function insert_message($fname, $email, $phone, $subject, $content){
        $query =    "INSERT INTO `message`(`message`.`FNAME`, `message`.`EMAIL`, `message`.`PHONE`, `message`.`SUBJECT`, `message`.`CONTENT`) VALUES
                    (\"" . $fname . "\", \"" . $email . "\", \"" . $phone . "\", \"" . $subject . "\", \"" . $content . "\");";
        return mysqli_query($this->connect, $query); //insert delete update => true false -> 
    }
    public function get_product_at_id($pid) {
        $query = "SELECT `product`.`ID` AS `id`, `product`.`IMG_URL` AS \"img\", `product`.`NAME` \"name\", `product`.`PRICE` AS \"price\", `product`.`NUMBER` AS \"num\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\", `product`.`TOP_PRODUCT` as \"top_item\" FROM `product` WHERE `product`.`ID` = " . (int)$pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_sub_img($pid) {
        $query = "SELECT `sub_img_url`.IMG_URL AS \"img\" FROM `sub_img_url` WHERE `sub_img_url`.`PID` = " . (int)$pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_product_same_cate($pid) {
        $sql = "SELECT `product`.`CATEGORY` as \"cate\" FROM `product` WHERE `product`.`ID` = " . (int)$pid . ";";
        $cate_temp = mysqli_query($this->connect, $sql);
        $cate = mysqli_fetch_array($cate_temp)["cate"];
        $query = "SELECT `product`.`ID` AS \"id\", `product`.`IMG_URL` AS \"img\", `product`.`NAME` \"name\", `product`.`PRICE` AS \"price\", `product`.`DECS` AS \"decs\", `product`.`CATEGORY` as \"cate\" FROM `product` WHERE `product`.`CATEGORY` = \"" . $cate . "\";";
        return mysqli_query($this->connect, $query);
    }
    public function get_item_comment($pid, $sort) {
        $query = "";
        if($sort == ""){
            $query = "SELECT `comment`.ID AS \"id\", `comment`.PID AS \"pid\", `comment`.UID AS \"uid\", `comment`.STAR AS \"star\", `comment`.CONTENT AS \"content\", `comment`.TIME AS \"time\" FROM `comment` WHERE `comment`.`PID` = " . (int)$pid . ";";
        } else if($sort == "high-first"){
            $query = "SELECT `comment`.ID AS \"id\", `comment`.PID AS \"pid\", `comment`.UID AS \"uid\", `comment`.STAR AS \"star\", `comment`.CONTENT AS \"content\", `comment`.TIME AS \"time\" FROM `comment` WHERE `comment`.`PID` = " . (int)$pid . " ORDER BY `comment`.STAR DESC;";
        } else if($sort == "low-first"){
            $query = "SELECT `comment`.ID AS \"id\", `comment`.PID AS \"pid\", `comment`.UID AS \"uid\", `comment`.STAR AS \"star\", `comment`.CONTENT AS \"content\", `comment`.TIME AS \"time\" FROM `comment` WHERE `comment`.`PID` = " . (int)$pid . " ORDER BY `comment`.STAR ASC;";
        }
        
        return mysqli_query($this->connect, $query);
    }
    public function get_cmt_user_name($uid) {
        $query = "SELECT `account`.`NAME` AS \"uname\" FROM `account` WHERE `account`.`ID` = " . (int)$uid . ";";
        return mysqli_query($this->connect, $query);
    }
    
    public function get_id_user($username, $pwd){
        $query =    "SELECT `account`.`ID` AS `id` FROM `account`
                    WHERE `account`.`USERNAME` = \"" . $username . "\"
                            AND `account`.`PWD` = \"" . $pwd ."\";";
        return mysqli_query($this->connect, $query);
    }
    public function check_account_ban($cmnd){
        $query =    "SELECT `ban_account`.`ID` as `id`   FROM `ban_account` WHERE `ban_account`.`CMND` = \"" . $cmnd . "\"";
        return mysqli_query($this->connect, $query);
    }
    public function check_account_inside($cmnd, $mail){
        $query =    "SELECT `account`.`ID` as `id` FROM `account` WHERE `account`.`EMAIL` = \"" . $mail ."\" OR `account`.`CMND` = \"" . $cmnd . "\";";
        return mysqli_query($this->connect, $query);
    }
    public function add_new_item($name, $price, $desc, $remain, $cate, $path){
        $name_mod = explode("'", $name);
        $desc_mod = explode("'", $desc); 
        $name = $name_mod[0];
        $desc = $desc_mod[0];
        for($i = 1; $i < count($name_mod); $i++){
            $name = $name . "\\'" . $name_mod[$i];
        }
        for($i = 1; $i < count($desc_mod); $i++){
            $desc = $desc . "\\'" . $desc_mod[$i];
        }
        $query = "INSERT INTO `product`(`NAME`, `PRICE`, `IMG_URL`, `NUMBER`, `DECS`, `CATEGORY`, `TOP_PRODUCT`)
                  VALUE ('" . $name . "', " . (int)$price . ", '" . $path . "', " . $remain . ", '" . $desc . "', '" . $cate . "', 0);";
        mysqli_query($this->connect, $query);
        return mysqli_insert_id($this->connect);
    }
    public function add_sub_img($pid, $path){
        if($path == "./Views/images/"){
            $path = './Views/images/default_image.png';
        }
        $query = "INSERT INTO `sub_img_url`(`sub_img_url`.`PID`, `sub_img_url`.`IMG_URL`)
                  VALUE (" . (int)$pid . ", '" . $path . "');";
        return mysqli_query($this->connect, $query);
    }
    public function update_item_nope_img($pid, $name, $price, $desc, $remain, $cate, $top_product){
        $desc_mod = explode("'", $desc);
        $name_mod = explode("'", $name);
        $desc = $desc_mod[0];
        $name = $name_mod[0];
        for($i = 1; $i < count($desc_mod); $i++){
            $desc = $desc . "\\'" . $desc_mod[$i];
        }
        for($i = 1; $i < count($name_mod); $i++){
            $name = $name . "\\'" . $name_mod[$i];
        }
        $query = "UPDATE `product` SET `NAME` = '" . $name . "', `PRICE` = " . (int)$price . ", `NUMBER` = " . (int)$remain . ", `DECS` = '" . $desc . "', `CATEGORY` = '" . $cate . "', `TOP_PRODUCT` = " . (int)$top_product . " WHERE `ID` = " . (int)$pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function update_item_img($pid, $path){
        $query = "UPDATE `product` SET `IMG_URL` = '" . $path . "' WHERE `ID` = " . (int)$pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_sub_img_id($pid){
        $query = "SELECT `sub_img_url`.`ID` AS `id`, `sub_img_url`.`IMG_URL` AS `img` FROM `sub_img_url` WHERE `sub_img_url`.`PID` = " . (int)$pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function update_sub_img($sub_id, $path){
        $query = "UPDATE `sub_img_url` SET `sub_img_url`.`IMG_URL` = '" . $path . "' WHERE `sub_img_url`.`ID` = ". (int)$sub_id . ";";
        return mysqli_query($this->connect, $query);
    }
    public function delete_item($pid){
        $query = "DELETE FROM `sub_img_url` WHERE `sub_img_url`.`PID` = " . $pid . ";";
        mysqli_query($this->connect, $query);
        $query = "DELETE FROM `product_in_order` WHERE `product_in_order`.`PID` = " . $pid . ";";
        mysqli_query($this->connect, $query);
        $query = "DELETE FROM `product_in_combo` WHERE `product_in_combo`.`PID` = " . $pid . ";";
        mysqli_query($this->connect, $query);
        $query = "DELETE FROM `product` WHERE `ID` = " . $pid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function delete_comment($cid){
        $query = "DELETE FROM `comment` WHERE `comment`.`ID` = " . $cid . ";";
        return mysqli_query($this->connect, $query);
    }
    public function get_all_user_info(){
        $query =    "SELECT `account`.`ID` AS `id`,
                            `account`.`NAME` AS `name`, 
                            `account`.`PHONE` AS `phone`, 
                            `account`.`ADDRESS` AS `add`,
                            `account`.`EMAIL` AS `mail`,
                            `account`.`IMG_URL` AS `img`
                    FROM `account`";
        return mysqli_query($this->connect, $query);
    }
    public function get_user($id){
        $query =    "SELECT `account`.`NAME` AS `name`,
                            `account`.`PHONE` AS `phone`, 
                            `account`.`ADDRESS` AS `add`, 
                            `account`.`USERNAME` AS `username`, 
                            `account`.`IMG_URL` AS `img`, 
                            `account`.`EMAIL` AS `mail`
                    FROM    `account`
                    WHERE   `account`.`ID` = " . $id;
        return mysqli_query($this->connect, $query);
    }
    public function remove_user($id){
        $query =    "DELETE FROM `comment` WHERE `comment`.`UID` = " . $id;
        mysqli_query($this->connect, $query);
        $query =    "DELETE FROM `product_in_order` WHERE `product_in_order`.`OID` IN (SELECT `order`.`ID` FROM `order` WHERE `order`.`UID` = " . $id . ")";
        echo $query;
        mysqli_query($this->connect, $query);
        $query =    "DELETE FROM `order` WHERE `order`.`UID` = " . $id;
        echo $query;
        mysqli_query($this->connect, $query);
        $query =    "DELETE FROM `account` WHERE `account`.`ID` = " . $id;
        echo $query;
        return mysqli_query($this->connect, $query);
    }
    public function ban_user($id){
        $query =    "INSERT INTO `ban_account`(`ban_account`.`CMND`) VALUES ((SELECT `account`.`CMND` FROM `account` WHERE `account`.`ID` = " . $id ."));";
        return mysqli_query($this->connect, $query);
    }
    public function get_order() {
            $query = "SELECT `order`.`ID`, `account`.`NAME`, `order`.`TIME`,  `order`.`TOTAL`
                                FROM `order` 
                                LEFT JOIN `account` ON `order`.`UID` = `account`.`ID`";
            return mysqli_query($this->connect, $query);
    }
    public function product_in_order() {
        $query = "SELECT `product_in_order`.`ID`, `product`.`NAME`,  `product_in_order`.`OID`,  `product_in_order`.`QUANTITY`
                            FROM `product_in_order` 
                            LEFT JOIN `product` ON `product_in_order`.`PID` = `product`.`ID`;";
        return mysqli_query($this->connect, $query);
    }
    public function get_message(){
        $query =    "SELECT    `message`.`FNAME` AS `name`, 
                                `message`.`EMAIL` AS `email`, 
                                `message`.`PHONE` AS `phone`, 
                                `message`.`SUBJECT` AS `sub`, 
                                `message`.`CONTENT` AS `content`, 
                                `message`.`CHECK` AS `check`, 
                                `message`.`ID` AS `id`
                    FROM `message`";
        return mysqli_query($this->connect, $query);
    }
}
?>