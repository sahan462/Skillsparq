<?php

class updateBuyer extends Controller
{
    // private $ProfileHandlerModel;
    public function __construct()
    {
        $this->ProfileHandlerModel = $this->model('profileHandler');
    }

    public function index(){

        $data['var'] = "manage Users";
        $data['title'] = "SkillSparq";
        $this->view('updateBuyer', $data);

    }

}

?>