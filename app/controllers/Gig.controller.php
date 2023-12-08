<?php

class Gig extends Controller
{

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function getGig()
    {
    }

    public function publishGig()
    {

        if (isset($_GET['submit'])) {

            $title = $_GET['title'];
            $description = $_GET['description'];
            $category = $_GET['category'];

            $customName_1 = $_GET['customName_1'];
            $noOfDeliveryDays_1 = $_GET['noOfDeliveryDays_1'];
            $timePeriod_1 = $_GET['timePeriod_1'];
            $noOfRevisions_1 = $_GET['noOfRevisions_1'];
            $packageDescription_1 = $_GET['packageDescription_1'];

            $customName_2 = $_GET['customName_2'];
            $noOfDeliveryDays_2 = $_GET['noOfDeliveryDays_2'];
            $timePeriod_2 = $_GET['timePeriod_2'];
            $noOfRevisions_2 = $_GET['noOfRevisions_2'];
            $packageDescription_2 = $_GET['packageDescription_2'];

            $customName_3 = $_GET['customName_3'];
            $noOfDeliveryDays_3 = $_GET['noOfDeliveryDays_3'];
            $timePeriod_3 = $_GET['timePeriod_3'];
            $noOfRevisions_3 = $_GET['noOfRevisions_3'];
            $packageDescription_3 = $_GET['packageDescription_3'];

            $currentDateTime = date('Y-m-d H:i:s');
            $sellerId = $_SESSION['userId'];

            $targetDir = "../public/assests/images/gigImages/";

            $coverImage = basename($_FILES["file"]["coverImage"]); 
            $targetFilePath = $targetDir . $coverImage; 
            $upload = move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    
            if($upload){
                $gig = $this->GigHandlerModel->addNewGig($title, $description, $category, $coverImage,$customName_1, $noOfDeliveryDays_1, $timePeriod_1, $noOfRevisions_1, $packageDescription_1, $customName_2, $noOfDeliveryDays_2, $timePeriod_2, $noOfRevisions_2, $packageDescription_2, $customName_3, $noOfDeliveryDays_3, $timePeriod_3, $noOfRevisions_3, $packageDescription_3, $currentDateTime, $sellerId);
                if($gig){
                    echo "
                    <script>
                        alert('Job is Published Successfully');
                        window.location.href = '" . BASEURL . "buyerProfile';
                    </script>
                    ";
                }else{
                    echo "<script>alert('Error publishing Gig');</script>";
                }
            }else{
                echo "
                <script>
                    alert('Error uploading images');
                </script>
                ";
            }
        }
    }

    public function updateGig(){

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
                    echo "
                    <script>
                        alert('Standard Job is Updated Successfully');
                        window.location.href = '" . BASEURL . "buyerProfile';
                    </script>
                ";
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
                    echo "
                    <script>
                        alert('Auction Job is Updated Successfully');
                        window.location.href = '" . BASEURL . "buyerProfile';
                    </script>
                ";
                }

            }else{
                echo "
                <script>alert('Invalid Publish Mode')</script>
                ";
            }
        }
    }

    public function deleteGig(){

        $jobId = $_GET['jobId'];
        $userId = $_GET['userId'];
        $publishMode = $_GET['publishMode'];

        if($publishMode == 'Auction Mode'){
            
            if($this->JobHandlerModel->deleteAuction($jobId, $userId)){
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
