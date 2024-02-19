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
        $recentRequests = $this->inquiryHandlerModel->getHelpRequests();
        $data['recentRequests'] = $recentRequests;

        $this->view('viewHelpRequests', $data);
    }
}
