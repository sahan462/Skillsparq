<?php

class CustomerSupportDashboard extends Controller
{

    public function index(){

        $data['var'] = "CustomerSupportDashboard";
        $data['title'] = "SkillSparq";

        $this->view('customersupportdashboard', $data);
    }

}

?>