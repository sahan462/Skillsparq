<?php

//change the class name
class ManageOrders extends Controller
{

    public function index(){

        $data['var'] = "Manage Orders Page";
        $data['title'] = "SkillSparq";

        $this->view('manageOrders', $data); //change this
    }

    public function createOrder(){
        echo "
        <script>
            alert('Order created successfully');
            window.location.href = '" . BASEURL . "manageOrders';
        </script>
    ";
    }

    

}

?>