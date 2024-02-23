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

            // directory where gig slider images resides.
            $targetDir = "../public/assests/images/gigImages/";

            $coverImage = basename($_FILES["coverImage"]["name"]);
            $targetFilePath = $targetDir . $coverImage; 
            $upload = move_uploaded_file($_FILES["coverImage"]["tmp_name"], $targetFilePath);

            $targetDirectory = "../public/assests/images/gigImages/pckgImages/";

            $sliderImage1 = basename($_FILES["sliderImage1"]["name"]);
            $targetFilePath1 = $targetDirectory . $sliderImage1; 
            $upload1 = move_uploaded_file($_FILES["sliderImage1"]["tmp_name"], $targetFilePath1);

            $sliderImage2 = basename($_FILES["sliderImage2"]["name"]);
            $targetFilePath2 = $targetDirectory . $sliderImage2; 
            $upload2 = move_uploaded_file($_FILES["sliderImage2"]["tmp_name"], $targetFilePath2);

            $sliderImage3 = basename($_FILES["sliderImage3"]["name"]);
            $targetFilePath3 = $targetDirectory . $sliderImage3; 
            $upload3 = move_uploaded_file($_FILES["sliderImage3"]["tmp_name"], $targetFilePath3);

            $sliderImage4 = basename($_FILES["sliderImage4"]["name"]);
            $targetFilePath4 = $targetDirectory . $sliderImage4; 
            $upload4 = move_uploaded_file($_FILES["sliderImage4"]["tmp_name"], $targetFilePath4);

            if($upload && $upload1 && $upload2 && $upload3 && $upload4){
                $gig = $this->GigHandlerModel->addNewGig($title, $description, $category, $coverImage,$packagePrice_1, $noOfDeliveryDays_1, $timePeriod_1, $noOfRevisions_1, $packageDescription_1, $packagePrice_2, $noOfDeliveryDays_2, $timePeriod_2, $noOfRevisions_2, $packageDescription_2, $packagePrice_3, $noOfDeliveryDays_3, $timePeriod_3, $noOfRevisions_3, $packageDescription_3, $currentDateTime, $sliderImage1,$sliderImage2,$sliderImage3,$sliderImage4,$sellerId);
                if($gig[0]){
                    echo "
                        <script>
                            alert('Gig is Published Successfully');
                            window.location.href = '" . BASEURL . "sellerProfile#gigs';
                        </script>
                    ";
                }else{
                    echo "<script>
                            alert('Error publishing Gig');
                            </script>
                     ";
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

            // package 1 details (Basic)
            $packagePrice_1 = $_GET["packagePrice_1"];
            $numDeliveryDays1 = $_GET['noOfDeliveryDays_1'];
            $timeFrame1 = $_GET['timePeriod_1'];
            $numOfRevs1 = $_GET['noOfRevisions_1'];
            $pckgDescription1 = $_GET['packageDescription_1'];
            $packageId1 = $_GET['packageId1'];

            // package 2 details (Standard)
            $packagePrice_2 = $_GET["packagePrice_2"];
            $numDeliveryDays2 = $_GET['noOfDeliveryDays_2'];
            $timeFrame2 = $_GET['timePeriod_2'];
            $numOfRevs2 = $_GET['noOfRevisions_2'];
            $pckgDescription2 = $_GET['packageDescription_2'];
            $packageId2 = $_GET['packageId2'];

            // package 3 details (Premium)
            $packagePrice_3 = $_GET["packagePrice_3"];
            $numDeliveryDays3 = $_GET['noOfDeliveryDays_3'];
            $timeFrame3 = $_GET['timePeriod_3'];
            $numOfRevs3 = $_GET['noOfRevisions_3'];
            $pckgDescription3 = $_GET['packageDescription_3'];
            $packageId3 = $_GET['packageId3'];

            $currentDateTime = date('Y-m-d H:i:s');
            $coverImage = $_GET['coverImage'];

            // getting slider images
            $sliderImage1 = $_GET['sliderImage1'];
            $sliderImage2 = $_GET['sliderImage2'];
            $sliderImage3 = $_GET['sliderImage3'];
            $sliderImage4 = $_GET['sliderImage4'];

            // have to consider about $onGoingOrderCount,$createdAt,$state later on for this.
            $gig = $this->GigHandlerModel->updateGig($gigId,$title, $description, $category, $coverImage);

            $packages = $this->GigHandlerModel->updatePackages($packagePrice_1,$numDeliveryDays1,$timeFrame1,$numOfRevs1,$pckgDescription1,$packageId1,$packagePrice_2,$numDeliveryDays2,$timeFrame2,$numOfRevs2,$pckgDescription2,$packageId2,$packagePrice_3,$numDeliveryDays3,$timeFrame3,$numOfRevs3,$pckgDescription3,$packageId3);

            // $sliderImages = $this->GigHandlerModel->updateSliderImages();

            if($gig & $packages){
                
            }
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
