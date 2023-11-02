<?php

class BuyerProfile extends Controller
{

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
    }

    public function index(){

        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
            
            header("location: loginUser");
            exit;

        }else{

            $data['var'] = "Buyer Profile Page";
            $data['title'] = "SkillSparq";
            $data["activeStatus"] =  "display: block;";

            $userId = $_SESSION["userId"];
            
            //get profile information
            $userProfile = $this->ProfileHandlerModel->getUserProfile($userId);
            $userProfile = mysqli_fetch_assoc($userProfile);
            $data["userProfile"] = $userProfile;


            //get Jobs
            $standardModeJobs = $this->JobHandlerModel->getAllJobs($userId);

            $jobs = array(); 

            if ($standardModeJobs) {
                while ($job = mysqli_fetch_assoc($standardModeJobs)) {
                    if ($job['publish_mode'] == 'Auction Mode') {

                        $auction = $this->JobHandlerModel->getAuction($job['job_id'], $userId);

                        if ($auction) {
                            $mergedJob = array_merge($job, mysqli_fetch_assoc($auction));
                            $jobs[] = $mergedJob; 
                        }
                    } else {
                        $jobs[] = $job; 
                    }
                }
            } else {
                echo "<script>alert('getAllJobs function is not Accessible!')</script>";
            }
            
            $data['jobs'] = $jobs;
            $this->view('buyerProfile', $data);
        }

    }

}

?>