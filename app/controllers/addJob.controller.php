<?php

class AddJob extends Controller
{

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function index(){

        $data['var'] = "AddJob";
        $data['title'] = "SkillSparq";
        $this->view('addJob', $data);

    }

}

?>