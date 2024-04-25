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

        $buyerDetails = $this->displayProfileDetails($buyerId);
        $data['buyerDetails'] = $buyerDetails;

        if($_SESSION['role'] === "Seller"){
            $sellerId = $_SESSION['userId'];
            $sellerDetails = $this->displayProfileDetails($sellerId);
            $data['sellerDetails'] = $sellerDetails;
        }

        $buyerJobCount = $this->jobController->getBuyerJobCount($buyerId);
        $data['jobCount'] = $buyerJobCount['COUNT(*)'];
       
        $job = $this->jobHandlerModel->getJob($jobId);

        if ($job) {
            // $job = mysqli_fetch_assoc($standardJob);
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
            echo "<script>
                  alert('getJob function is not Accessible!');
                  </script>";
        }
        $this->view('displayJob', $data);
    }

    public function displayProfileDetails($userId)
    {
        $profile = $this->profileHandlerModel->getUserProfile($userId);
        $details = mysqli_fetch_assoc($profile);
        return $details;
    }

}