<?php

class JobProposals extends Controller
{
    private $JobHandlerModel;
    
    public function __construct()
    {
        $this->JobHandlerModel = $this->model('JobHandler');
    }

    public function index()
    {
        $data['var'] = "JobProposal Page";
        $data['title'] = "SkillSparq";
        
        $this->view('jobProposals', $data);
    }

    public function addJobProposal()
    {
        // logic to add a job proposal to table
        $sellerId = $_POST['sellerId'];
        $buyerId = $_POST['buyerId'];
        $jobId = $_POST['jobId'];
        $bidAmnt = $_POST['biddingAmnt'];
        $description = $_POST['descriptionJobProposal'];

        $attachment = ''; // do the file handling part 

        $result = $this->JobHandlerModel->createProposal($description,$bidAmnt,$attachment,$jobId,$buyerId, $sellerId);

    }

    public function viewSingleJobProposal()
    {
        // viewing a single job proposal.
    }

    public function viewAllJobProposals()
    {
        // viewing all job proposals available.
    }

}