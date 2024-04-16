<?php

class AdminDashboard extends Controller
{
    private $inquiryHandlerModel;
    private $JobHandlerModel;
    private $GigHandlerModel;

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
        $this->GigHandlerModel = $this->model('GigHandler');
    }

    public function index()
    {

        $data['var'] = "admin Dashboard";
        $data['title'] = "SkillSparq";
        $this->view('adminDashboard', $data);
        $recentGigs = $this->GigHandlerModel->getRecentGigs();
        $data['recentGigs'] = $recentGigs;
    }
}
