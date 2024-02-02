<?php

class notifications extends Controller
{

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function index()
    {

        $data['var'] = "notifications";
        $data['title'] = "SkillSparq";
        $this->view('notifications', $data);
    }
}
