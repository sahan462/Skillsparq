<?php

class BuyerDashboard extends Controller
{

    public function index(){

        $data['var'] = "Home Page";
        $data['title'] = "SkillSparq";

        $this->view('buyerdashboard', $data);
    }

}

?>