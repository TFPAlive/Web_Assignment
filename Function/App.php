<?php
class App{
    protected $controller="Home";
    protected $action="Statistic";
    protected $params=[];

    function __construct(){
 
        $arr = $this->UrlProcess();
        if(!empty($arr) && file_exists(filename: "./Controller/" . $arr[0].".php")){
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once ("./Controller/"). $this->controller .".php";
        $this->controller = new $this->controller;

        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        $this->params = [];
        array_push($this->params,'manager');
        if(!empty($arr)) array_push($this->params,$arr);
        call_user_func_array([$this->controller, $this->action], $this->params);

    }
    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode(separator: "/", string: filter_var(value: trim(string: $_GET["url"], characters: "/")));
        }
    }
}