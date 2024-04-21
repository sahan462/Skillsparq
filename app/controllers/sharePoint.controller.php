<?php

class SharePoint extends Controller
{
    // private $ProfileHandlerModel;
    public function __construct()
    {
        $this->ProfileHandlerModel = $this->model('profileHandler');
    }

    public function index(){

        $data['var'] = "share Point";
        $data['title'] = "SkillSparq";
        $this->view('sharePoint', $data);

    }

    //upload deliveries
    public function uploadDeliveries()
    {

        if(isset($_POST['submit'])){

            

        }else{

        }



    }

}

?>