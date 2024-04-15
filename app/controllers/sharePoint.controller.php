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

}

?>