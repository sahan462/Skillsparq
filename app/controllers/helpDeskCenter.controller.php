<?php

class HelpDeskCenter extends Controller
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
        $recentInquiries = $this->inquiryHandlerModel->getRecentUsers();
        $data['recentInquiries'] = $recentInquiries;
        $recentRequests = $this->inquiryHandlerModel->getHelpRequests();
        $data['recentRequests'] = $recentRequests;
        $recentComplaints = $this->inquiryHandlerModel->getComplaints();
        $data['recentComplaints'] = $recentComplaints;

        $this->view('helpDeskCenter', $data);
    }
}
