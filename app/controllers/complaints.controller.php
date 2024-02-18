<?php

class complaints extends Controller
{

    private $inquiryHandlerModel;
    public function __construct()
    {
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
    }

    public function index()
    {

        $data['var'] = "HelpDeskCenter";
        $data['title'] = "SkillSparq";
        $recentComplaints = $this->inquiryHandlerModel->getComplaints();
        $data['recentComplaints'] = $recentComplaints;

        $this->view('complaints', $data);
    }
}
