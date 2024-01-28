<?php

class buyerNotifications extends Controller
{

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function index()
    {

        $data['var'] = "buyerNotifications";
        $data['title'] = "SkillSparq";
        $this->view('buyerNotifications', $data);
    }
}
