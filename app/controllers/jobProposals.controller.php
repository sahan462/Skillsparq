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
        
        if($_SESSION['role'] === "Seller"){

            // logic to add a job proposal to table
            $jobMode = $_POST['mode'];
            $sellerId = $_POST['sellerId'];
            $buyerId = $_POST['buyerId'];
            $jobId = $_POST['jobId'];
            $description = $_POST['descriptionJobProposal'];

            $attachment = ''; // do the file handling part 

            if($jobMode == "Auction"){
                $bidAmnt = $_POST['biddingAmnt'];
                $proposalId = $this->JobHandlerModel->createProposal($description,$bidAmnt,$attachment,$jobId,$buyerId, $sellerId);
            }else{
                $proposalId = $this->JobHandlerModel->createProposal($description,NULL,$attachment,$jobId,$buyerId, $sellerId);
            }
            // $data['proposalId'] = $proposalId;

            header("Location:sellerProfile");
        }else if($_SESSION['role'] === "Buyer"){
            $data['jobId'] = $_SESSION['jobId'];
            $allProposals = $this->viewAllJobProposals($data['jobId']);
            $data['proposalDetails'] = $allProposals;
            $this->view('jobProposals',$data);
            show($data);
        }
        
    }

    // viewing a single job proposal.
    public function viewSingleJobProposal($proposalId)
    {
        $proposalDets = $this->JobHandlerModel->getSingleJobProposal($proposalId);
        $proposalInfo = mysqli_fetch_assoc($proposalDets);
        return $proposalInfo;
    }

    // viewing all job proposals for a particular job created .
    public function viewAllJobProposals($jobId)
    {
        $proposalDets = $this->JobHandlerModel->viewJobProposals($jobId);
        $proposalInfo = mysqli_fetch_assoc($proposalDets);
        return $proposalInfo;
    }

}