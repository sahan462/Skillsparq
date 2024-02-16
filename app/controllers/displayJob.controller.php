<?php

class DisplayJob extends Controller
{
    private $jobHandlerModel;

    public function __construct()
    {
        $this->jobHandlerModel = $this->model('JobHandler');
    }

    public function index(){

        $data['title'] = "SkillSparq";
        $buyerId = $_GET['buyerId'];
        $jobId = $_GET['jobId'];

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
        // print_r($data);
        $this->view('displayJob', $data);
    }

}