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
        $myPropWholeDetails = $this->JobHandlerModel->getBuyerDetailsProposalDetailsOfJob($sellerId);
        $data['sentPropDets'] = $myPropWholeDetails;
        $data['AcceptedCount'] = $this->JobHandlerModel->getPropCountByAcceptedStatus($sellerId);
        $data['PendingCount'] = $this->JobHandlerModel->getPropCountByPendingStatus($sellerId);
        $data['RejectedCount'] = $this->JobHandlerModel->getPropCountByRejectedStatus($sellerId);
        // show($data);
        $this->view('sentJobProposals', $data);
    }
}