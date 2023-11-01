<?php

class AdminDashboard extends Controller
{

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function index(){

        $data['var'] = "admin Dashboard";
        $data['title'] = "SkillSparq";
        $this->view('adminDashboard', $data);

    }

}

?>