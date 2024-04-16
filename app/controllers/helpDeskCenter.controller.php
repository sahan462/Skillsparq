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
        if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {

            header("location: loginUser");
            exit;
        } else {

            $data['var'] = "HelpDeskCenter";
            $data['title'] = "SkillSparq";
            $recentUsers = $this->inquiryHandlerModel->getRecentUsers();
            $data['recentUsers'] = $recentUsers;

            $recentInquiries = $this->inquiryHandlerModel->getInquiries();
            $data['recentInquiries'] = $recentInquiries;

            $recentRequests = $this->inquiryHandlerModel->getHelpRequests();
            $data['recentRequests'] = $recentRequests;
            $recentComplaints = $this->inquiryHandlerModel->getComplaints();
            $data['recentComplaints'] = $recentComplaints;


            $this->view('helpDeskCenter', $data);
        }
    }
}
