<?php

class Job extends Controller
{

    public function index()
    {
    }

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function getJob()
    {
    }

    public function publishJob()
    {

        if (isset($_GET['submit'])) {

            show($_GET);

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

                $job = $this->JobHandlerModel->addNewJob($title, $description, $file,  $category, $amount, $deadline, $publishMode, $flexible_amount, $currentDateTime, $buyerId);
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
            } else {
                echo "
                <script>alert('Invalid Publish Mode')</script>
                ";
            }

            if ($job) {

                echo "
                <script>
                    alert('Job is Published Successfully');
                    window.location.href = '" . BASEURL . "buyerProfile';
                </script>
            ";
            } else {
                echo "<script>alert('Error');</script>";
            }
        }
    }

    public function updateJob($parameter)
    {
    }

    public function deleteJob()
    {
    }
}
