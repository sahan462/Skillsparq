<?php

class viewHelpRequests extends Controller
{
    private $inquiryHandlerModel;
    public function __construct()
    {
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
    }

    public function index()
    {

        $data['var'] = "viewHelpRequests";
        $data['title'] = "SkillSparq";
        $recentInquiries = $this->inquiryHandlerModel->getRecentUsers();
        $data['recentInquiries'] = $recentInquiries;

        $this->view('viewHelpRequests', $data);
    }
}
