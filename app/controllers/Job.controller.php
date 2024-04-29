<?php

class Job extends Controller
{

    private $JobHandlerModel;

    public function index()
    {
    }

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function getBuyerJobCount($userId)
    {
        $count = $this->JobHandlerModel->getJobCount($userId);
        $count = mysqli_fetch_assoc($count);
        return $count;
    }

    public function getJob()
    {
    }

    public function viewJob()
    {
        // create the method to view the job card in the sellerdashboard.
    }

    public function searchJob(){
        // create the method to search job functionality
        if(isset($_GET['search']) && isset($_GET['submit'])){
            $searchName = $_GET['search'];
            $searchResult = $this->JobHandlerModel->searchForJobs($searchName);
            if($searchResult){
                
            }
        }else{

        }
    }

    public function publishJob()
    {

        if (isset($_GET['submit'])) {

            $title = $_GET['title'];
            $description = $_GET['description'];
            $file = $_GET['fileToUpload'];
            $category = $_GET['category'];
            $deadline = $_GET['deadline_1'];
            $publishMode = $_GET['publishMode'];
            $currentDateTime = date('Y-m-d H:i:s');
            $buyerId = $_SESSION['userId'];

            if ($publishMode == 'Standard Mode') {

                $amount = $_GET['amount_3'];
                if (isset($_GET['flexible-amount'])) {
                    $flexible_amount = 1;
                } else {
                    $flexible_amount = 0;
                };

                $job = $this->model("JobHandler")->addNewJob($title, $description, $file,  $category, $amount, $deadline, $publishMode, $flexible_amount, $currentDateTime, $buyerId);
            } else if ($publishMode == 'Auction Mode') {

                $amount = $_GET['amount_1'];
                if (isset($_GET['flexible-amount'])) {
                    $flexible_amount = 1;
                } else {
                    $flexible_amount = 0;
                };

                $jobId = $this->JobHandlerModel->addNewJob($title, $description, $file,  $category, $amount, $deadline, $publishMode, $flexible_amount, $currentDateTime, $buyerId);

                $starting_time = $_GET['deadline_2'];
                $end_time = $_GET['deadline_3'];
                $starting_bid = $_GET['amount_1'];
                $min_bid_amount = $_GET['amount_2'];

                $job = $this->JobHandlerModel->createAuction($starting_time, $end_time, $starting_bid, $min_bid_amount, $jobId, $buyerId);

            }else{
                echo "
                <script>alert('Invalid Publish Mode')</script>
                ";
            }
            if($job){

            if ($job) {
                $data['redirectURL'] = BASEURL . 'buyerProfile';
                $data['message'] = "Job is Published Successfully";
                $this->view('successful', $data);
            }else{
                echo "<script>alert('Error');</script>";
                }
            }
        }
    }
    
    public function updateJob(){

        if(isset($_GET["update"])){

            $jobId = $_GET["jobId"];
            $title = $_GET['title'];
            $description = $_GET['description'];
            $file = $_GET['fileToUpload'];
            $category = $_GET['category'];
            $deadline = $_GET['deadline_1'];
            $publishMode = $_GET['publishMode'];
            $currentDateTime = date('Y-m-d H:i:s'); 
            $buyerId = $_SESSION['userId'];

            if($publishMode == 'Standard Mode'){

                $amount = $_GET['amount_3'];
                if(isset($_GET['flexible-amount'])){$flexible_amount = 1;}else{$flexible_amount = 0;};

                $job = $this->JobHandlerModel->updateJob($jobId, $title, $description, $file,  $category, $amount, $deadline, $publishMode, $flexible_amount, $currentDateTime, $buyerId);
                if($job){
                    $data['redirectURL'] = BASEURL . 'buyerProfile';
                    $data['message'] = "Standard Job is Updated Successfully";
                    $this->view('successful', $data);
                }

            }else if($publishMode == 'Auction Mode'){

                $amount = $_GET['amount_1'];
                if(isset($_GET['flexible-amount'])){$flexible_amount = 1;}else{$flexible_amount = 0;};

                $job = $this->JobHandlerModel->updateJob($jobId, $title, $description, $file,  $category, $amount, $deadline, $publishMode, $flexible_amount, $currentDateTime, $buyerId);

                $starting_time = $_GET['deadline_2'];
                $end_time = $_GET['deadline_3'];
                $starting_bid = $_GET['amount_1'];
                $min_bid_amount = $_GET['amount_2'];

                $auction = $this->JobHandlerModel->updateAuction($jobId, $buyerId, $starting_time, $end_time, $starting_bid, $min_bid_amount, $jobId, $buyerId);

                if($job and $auction){
                    $data['redirectURL'] = BASEURL . 'buyerProfile';
                    $data['message'] = "Auction Job is Updated Successfully";
                    $this->view('successful', $data);
                }

            }else{
                echo "
                <script>alert('Invalid Publish Mode')</script>
                ";
            }
        }
    }

    public function deleteJob(){

        $jobId = $_GET['jobId'];
        $userId = $_GET['userId'];
        $publishMode = $_GET['publishMode'];

        if($publishMode == 'Auction Mode'){
            
            if($this->JobHandlerModel->deleteAuction($jobId, $userId)){
                if($this->JobHandlerModel->deleteJob($jobId)){
                    $data['redirectURL'] = BASEURL . 'buyerProfile';
                    $data['message'] = "Job deleted Successfully";
                    $this->view('successful', $data);
                    // echo 
                    // "
                    // <script>alert('Job deleted Successfully')
                    // window.location.href = '" . BASEURL . "buyerProfile';
                    // </script>
                    // ";
                }else{
                    echo 
                    "
                    <script>alert('Job deletion failed')
                    window.location.href = '" . BASEURL . "buyerProfile';
                    </script>
                    ";
                }
            }else{
                echo 
                "
                <script>alert('Auction deletion failed')
                window.location.href = '" . BASEURL . "buyerProfile';
                </script>
                ";
            }

        }else if($publishMode == 'Standard Mode'){
            if($this->JobHandlerModel->deleteJob($jobId)){
                echo 
                "
                <script>alert('Job deleted Successfully')
                window.location.href = '" . BASEURL . "buyerProfile';
                </script>
                ";
            }else{
                echo 
                "
                <script>alert('Job deletion failed')
                window.location.href = '" . BASEURL . "buyerProfile';
                </script>
                ";
            }
        }else{
            echo 
            "
            <script>alert('Invalid Publish Mode!')</script>
            ";
        }
    }

}
