<?php

class SentJobProposals extends Controller
{
    private $JobHandlerModel;
    
    public function __construct()
    {
        $this->JobHandlerModel = $this->model('JobHandler');
    }

    public function index()
    {
        $data['var'] = "sent Job Proposals Page";
        $data['title'] = "SkillSparq";

        $sellerId = $_SESSION['userId'];
        $myProposals = $this->JobHandlerModel->getSendJobProposals($sellerId);
        $data['myProposals'] = $myProposals;
        $this->view('sentJobProposals', $data);
    }
}