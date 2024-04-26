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

        $jobs = $this->OrderHandlerModel->getJobOrders($_SESSION['userId'], $_SESSION['role']);
        $packages = $this->OrderHandlerModel->getPackageOrders($_SESSION['userId'], $_SESSION['role']);
        $milestones = $this->OrderHandlerModel->getMilestoneOrders($_SESSION['userId'], $_SESSION['role']);

        $data['MYORDERS'] = array_merge($jobs,$packages,$milestones);
        
        // show($data['MYORDERS']);

        // show($_SESSION);
        $this->view('manageOrders', $data); 
    }

    //read orders
    public function getOrders($userId, $userRole){

        $myOrders = $this->OrderHandlerModel->getOrders($userId, $userRole);

        if($myOrders){

            return $myOrders;

        }else{

            echo "<script>
                alert('getOrders function is not Accessible!')
            </script>";

        }
    }

}

?>