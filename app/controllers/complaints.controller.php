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
        $totalInquiries = $this->inquiryHandlerModel->totalInquiries();
        $data['totalInquiries'] = $totalInquiries;

        $this->view('complaints', $data);
    }
}
