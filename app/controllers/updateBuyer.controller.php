<?php

class updateBuyer extends Controller
{

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function index(){

        $data['var'] = "manage Users";
        $data['title'] = "SkillSparq";
        $this->view('updateBuyer', $data);

    }

}

?>