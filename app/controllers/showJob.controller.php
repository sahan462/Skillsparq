<?php

class ShowJob extends Controller{
    private $JobHandlerModel;

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function index()
    {
        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
            header("location: loginUser");
            exit;
        }else{
            $data['var'] = "ViewJob";
            $data['title'] = "SkillSparq";

            $jobId = $_GET['jobId'];
            $userId = $_GET['userId'];
            $publishMode = $_GET['publishMode'];
            $data['jobId'] = $jobId;

            $data['Auction-Details'] = [];

            if($_GET['userId'] == $_SESSION['userId']){
                if($publishMode == 'Auction Mode'){

                    $data['Basic-Details'] = mysqli_fetch_assoc($this->JobHandlerModel->getJob($jobId));
                    $data['Auction-Details'] = mysqli_fetch_assoc($this->JobHandlerModel->getAuction($jobId, $userId));

                }else if($publishMode == 'Standard Mode'){

                    $data['Basic-Details'] = mysqli_fetch_assoc($this->JobHandlerModel->getJob($jobId));

                }else{
                    echo 
                    "
                    <script>alert('Can not perform viewing!')</script>
                    ";
                }
            }else{
                echo 
                "
                <script>alert('Unauthorized User!')</script>
                ";
            }
            $this->view('ShowJobs', $data);   
        }
    }
}