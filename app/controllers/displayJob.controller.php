<?php

class DisplayJob extends Controller
{
    private $jobHandlerModel;
    private $profileHandlerModel;
    private $jobController;

    public function __construct()
    {
        $this->jobHandlerModel = $this->model('JobHandler');
        $this->jobController = $this->controller('job');
        $this->profileHandlerModel = $this->model('profileHandler');
    }

    public function index(){

        $data['title'] = "SkillSparq";
        $buyerId = $_GET['buyerId'];
        $jobId = $_GET['jobId'];

        $buyerDetails = $this->displayBuyerDetails($buyerId);
        $data['buyerDetails'] = $buyerDetails;

        $buyerJobCount = $this->jobController->getBuyerJobCount($buyerId);
        $data['jobCount'] = $buyerJobCount['COUNT(*)'];
       
        $standardJob = $this->jobHandlerModel->getJob($jobId);

        if ($standardJob) {
            $job = mysqli_fetch_assoc($standardJob);
            if ($job['publish_mode'] == 'Auction Mode') {

                $auction = $this->jobHandlerModel->getAuction($job['job_id'], $buyerId);

                if ($auction) {
                    $auction =  mysqli_fetch_assoc($auction);
                    $mergedJob = array_merge($job,$auction);
                    $data['job'] = $mergedJob;
                }
            } else {
                $data['job'] = $job;
            }
            
        } else {
            echo "<script>alert('getJob function is not Accessible!')</script>";
        }
        $this->view('displayJob', $data);
    }

    public function displayBuyerDetails($userId)
    {
        $profile = $this->profileHandlerModel->getUserProfile($userId);
        $details = mysqli_fetch_assoc($profile);
        return $details;
    }

}