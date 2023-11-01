<?php

class BuyerDashboard extends Controller
{

    public function index(){

        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
            header("location: loginUser");
        }else{

            $data['var'] = "Home Page";
            $data['title'] = "SkillSparq";
    
            $this->view('buyerdashboard', $data);
        }

    }

}

?>