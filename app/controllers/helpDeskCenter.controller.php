<?php

class HelpDeskCenter extends Controller
{

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function index()
    {

        $data['var'] = "HelpDeskCenter";
        $data['title'] = "SkillSparq";
        $this->view('HelpDeskCenter', $data);
    }
}
