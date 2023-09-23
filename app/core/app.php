<?php


class App
{

    protected $controller = "_404";
    protected $method = "index";

    function __construct()
    {

        $arr = $this->getURL();
        $filename = "../app/controllers/".ucfirst($arr[0]).".controller.php";

        if(file_exists($filename)){
            require $filename;
            $this->controller = $arr[0];
            unset($arr[0]);
        }else{
            require "../app/controllers/".$this->controller.".controller.php";
        }
        $mycontroller = new $this->controller();

        if(!empty($arr[1])){
            if(method_exists($mycontroller, strtolower($arr[1])))
            {
                $this->method = strtolower($arr[1]);
                unset($arr[1]);
            }
        }


        $arr = array_values($arr);
        call_user_func_array([$mycontroller, $this->method], $arr);

    }

    private function getURL() {
        $url = isset($_GET['url']) ? $_GET['url'] : "not found";
        $arr = explode("/", $url);
        return $arr;
    }


}

?>