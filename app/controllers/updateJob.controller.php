<?php

class UpdateJob extends Controller
{

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
        $this->JobController = $this->controller('job');
    }

    public function index(){

        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
            
            header("location: loginUser");
            exit;

        }else{
            $data['var'] = "UpdateJob";
            $data['title'] = "SkillSparq";

            $jobId = $_GET['jobId'];
            $userId = $_GET['userId'];
            $publishMode = $_GET['publishMode'];

            if($_GET['userId'] == $_SESSION['userId']){

                $data['Basic-Details'] = mysqli_fetch_assoc($this->JobHandlerModel->getJob($jobId));
                $data['Auction-Details'] = [];
                if($publishMode == 'Auction Mode'){
                    $data['Auction-Details'] = mysqli_fetch_assoc($this->JobHandlerModel->getAuction($jobId, $userId));
                }

            }else{
                echo 
                "
                <script>alert('Unauthorized User!')</script>
                ";
            }

            $this->view('UpdateJob', $data);
            
        }



    }

}

?>