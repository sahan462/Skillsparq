<?php

class DisplayJob extends Controller
{

    private $jobHandlerModel;
    public function index(){

        $data['title'] = "SkillSparq";
        $userId = $_SESSION['userId'];
        $jobId = $_GET['jobId'];

        $this->jobHandlerModel = $this->model('JobHandler');
        $job = mysqli_fetch_assoc($this->jobHandlerModel->getJob($_GET['jobId'] ));

        if ($job['publish_mode'] === "Auction Mode"){

            $auction = $this->jobHandlerModel->getAuction($jobId, $userId);
            $auction = mysqli_fetch_assoc($auction);
            $data['job'] = $job;
            $data['auction'] = $auction;
            $this->view('displayJob', $data);

        }else if($job['publish_mode'] === "Standard Mode"){
            $data['job'] = $job;
            $this->view('displayJob', $data);
        }
        else{
            echo "
            <script>
                alert('Job is not available');
            </script>
            ";
            $this->view('buyerProfile', $data);
        }

    }

}

?>