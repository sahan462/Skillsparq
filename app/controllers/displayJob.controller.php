<?php

class DisplayJob extends Controller
{
    public function index(){

        $data['title'] = "SkillSparq";
        $userId = $_SESSION['userId'];

        $this->jobHandlerModel = $this->model('JobHandler');
        $job = mysqli_fetch_assoc($this->jobHandlerModel->getJob($_GET['jobId'] ));

        if ($job['publish_mode'] == 'Auction Mode'){

            $auction = $this->jobHandlerModel->getAuction($job['job_id'], $userId);
            $data['job'] =  array_merge($job, mysqli_fetch_assoc($auction));
            $this->view('displayJob', $data);

        }else if($job['publish_mode'] == 'Standard Mode'){
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