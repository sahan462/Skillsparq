<?php

//change the class name
class ManageOrders extends Controller
{
    private $OrderHandlerModel;

    public function __construct(){
        $this->OrderHandlerModel = $this->model('orderHandler');
    }

    public function index(){

        $data['var'] = "Manage Orders Page";
        $data['title'] = "SkillSparq";
        $data['myOrders'] = $this->getOrders($_SESSION['userId'], $_SESSION['role']);

        // show($data['myOrders']);
        // show($_SESSION);
        $this->view('manageOrders', $data); 
    }


    //read orders
    public function getOrders($userId, $userRole){

        $myOrders = $this->OrderHandlerModel->getOrders($userId, $userRole);

        if($myOrders){

            return $myOrders;

        }else{

            echo "<script>alert('getOrders function is not Accessible!')</script>";

        }
    }

}

?>