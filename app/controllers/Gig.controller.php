<?php

class Gig extends Controller
{
    private $GigHandlerModel;

    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
    }

    public function publishGig()
    {

        if (isset($_POST['submit'])) {

            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];

            $packagePrice_1 = $_POST['packagePrice_1'];
            $noOfDeliveryDays_1 = $_POST['noOfDeliveryDays_1'];
            $timePeriod_1 = $_POST['timePeriod_1'];
            $noOfRevisions_1 = $_POST['noOfRevisions_1'];
            $packageDescription_1 = $_POST['packageDescription_1'];

            $packagePrice_2 = $_POST['packagePrice_2'];
            $noOfDeliveryDays_2 = $_POST['noOfDeliveryDays_2'];
            $timePeriod_2 = $_POST['timePeriod_2'];
            $noOfRevisions_2 = $_POST['noOfRevisions_2'];
            $packageDescription_2 = $_POST['packageDescription_2'];

            $packagePrice_3 = $_POST['packagePrice_3'];
            $noOfDeliveryDays_3 = $_POST['noOfDeliveryDays_3'];
            $timePeriod_3 = $_POST['timePeriod_3'];
            $noOfRevisions_3 = $_POST['noOfRevisions_3'];
            $packageDescription_3 = $_POST['packageDescription_3'];

            $currentDateTime = date('Y-m-d H:i:s');
            $sellerId = $_SESSION['userId'];

            $targetDir = "../public/assests/images/gigImages/";

            $coverImage = basename($_FILES["coverImage"]["name"]); 

            $targetFilePath = $targetDir . $coverImage; 
            $upload = move_uploaded_file($_FILES["coverImage"]["tmp_name"], $targetFilePath);
    
            if($upload){
                $gig = $this->GigHandlerModel->addNewGig($title, $description, $category, $coverImage,$packagePrice_1, $noOfDeliveryDays_1, $timePeriod_1, $noOfRevisions_1, $packageDescription_1, $packagePrice_2, $noOfDeliveryDays_2, $timePeriod_2, $noOfRevisions_2, $packageDescription_2, $packagePrice_3, $noOfDeliveryDays_3, $timePeriod_3, $noOfRevisions_3, $packageDescription_3, $currentDateTime, $sellerId);
                if($gig[0]){
                    echo "
                    <script>
                        alert('Gig is Published Successfully');
                        window.location.href = '" . BASEURL . "sellerProfile#gigs';
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

     // function for update Gigs.
     public function updateGig(){
        
        if(isset($_GET["update"])){
            // For gigs table
            $gigId = $_GET['gig_id'];
            $title = $_GET['title'];
            $description = $_GET['description'];
            $category = $_GET['category'];
            $coverImage = $_GET['coverImage'];


            $numDeliveryDays1 = $_GET['noOfDeliveryDays_1'];
            $timeFrame1 = $_GET['timePeriod_1'];
            $numOfRevs1 = $_GET['noOfRevisions_1'];
            $pckgDescription1 = $_GET['packageDescription_1'];

            $numDeliveryDays2 = $_GET['noOfDeliveryDays_2'];
            $timeFrame2 = $_GET['timePeriod_2'];
            $numOfRevs2 = $_GET['noOfRevisions_2'];
            $pckgDescription2 = $_GET['packageDescription_2'];

            $numDeliveryDays3 = $_GET['noOfDeliveryDays_3'];
            $timeFrame3 = $_GET['timePeriod_3'];
            $numOfRevs3 = $_GET['noOfRevisions_3'];
            $pckgDescription3 = $_GET['packageDescription_3'];

            $currentDateTime = date('Y-m-d H:i:s');
        }
        
    }

    public function deleteGig()
    {
        // function to delete a specific gig.
        $userId = $_GET['userId'];
        $gigId = $_GET['gigId'];

        while($this->GigHandlerModel->deletePackages($gigId)){
            if($this->GigHandlerModel->deleteGig($gigId)){
                    echo 
                "
                <script>alert('Gig deleted Successfully')
                window.location.href = '" . BASEURL . "sellerProfile';
                </script>
                ";
                break;
            }
            else
            {
                echo 
                "
                <script>alert('Gig deletion failed')
                window.location.href = '" . BASEURL . "sellerProfile';
                </script>
                ";
            }
        }
        
    }
}
