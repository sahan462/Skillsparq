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
        print_r($_POST);
        print_r($_FILES);

        if (isset($_POST['btnSubmit']))
        {
            // For gigs table
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];

            // package 1 details (Basic)
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
            $targetDir = "../public/assests/images/gigImages/coverImages/";

            $coverImage = basename($_FILES["coverImage"]["name"]);
            $randomNumber = random_int(10000, 99999); // Generate a random number between 10000 and 99999
            $extension = pathinfo($coverImage, PATHINFO_EXTENSION);
            $coverImage = pathinfo($coverImage, PATHINFO_FILENAME);
            $uniqueCoverImageName = uniqid($coverImage, true) . '_' . time() . '_' .$randomNumber.".".$extension;

            $targetFilePath = $targetDir . $uniqueCoverImageName; 
            $upload = move_uploaded_file($_FILES["coverImage"]["tmp_name"], $targetFilePath);

            $targetDirectory = "../public/assests/images/gigImages/pckgImages/";

            $arrayImagesString = [];
            $arrayImageUploads = [];

            for ($i = 1; $i < 5; $i++)
            {

                $newSliderImageName = '';
                $targetFilePath= '';
                $uniqueImageName = '';
                $upload = false;
                $fieldName = "sliderImage" . $i;

                $newSliderImageName = basename($_FILES[$fieldName]["name"]);

                $randomNumber = random_int(10000, 99999); // Generate a random number between 10000 and 99999
                $extension = pathinfo($newSliderImageName, PATHINFO_EXTENSION);
                $newSliderImageName = pathinfo($newSliderImageName, PATHINFO_FILENAME);
                $uniqueImageName = uniqid($newSliderImageName, true) . '_' . time() . '_' .$randomNumber.".".$extension;

                $arrayImagesString[] = $uniqueImageName;

                $targetFilePath = $targetDirectory . $uniqueImageName; 
                $upload = move_uploaded_file($_FILES[$fieldName]["tmp_name"], $targetFilePath);
                $arrayImageUploads[] = $upload;

            }

            $sliderImage1 = $arrayImagesString[0];
            $sliderImage2 = $arrayImagesString[1];
            $sliderImage3 = $arrayImagesString[2];
            $sliderImage4 = $arrayImagesString[3];

            $upload1 = $arrayImageUploads[0];
            $upload2 = $arrayImageUploads[1];
            $upload3 = $arrayImageUploads[2];
            $upload4 = $arrayImageUploads[3];

            if($upload && $upload1 && $upload2 && $upload3 && $upload4){
                $gig = $this->GigHandlerModel->addNewGig($title, $description, $category, $uniqueCoverImageName,$packagePrice_1, $noOfDeliveryDays_1, $timePeriod_1, $noOfRevisions_1, $packageDescription_1, $packagePrice_2, $noOfDeliveryDays_2, $timePeriod_2, $noOfRevisions_2, $packageDescription_2, $packagePrice_3, $noOfDeliveryDays_3, $timePeriod_3, $noOfRevisions_3, $packageDescription_3, $currentDateTime, $sliderImage1,$sliderImage2,$sliderImage3,$sliderImage4,$sellerId);
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
    public function updateGig()
    {
        
        if(isset($_POST["update"])){
            // For gigs table
            $gigId = $_POST['gigId'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];

            // package 1 details (Basic)
            $packagePrice_1 = $_POST["packagePrice_1"];
            $numDeliveryDays1 = $_POST['noOfDeliveryDays_1'];
            $timeFrame1 = $_POST['timePeriod_1'];
            $numOfRevs1 = $_POST['noOfRevisions_1'];
            $pckgDescription1 = $_POST['packageDescription_1'];
            $packageId1 = $_POST['packageId1'];

            // package 2 details (Standard)
            $packagePrice_2 = $_POST["packagePrice_2"];
            $numDeliveryDays2 = $_POST['noOfDeliveryDays_2'];
            $timeFrame2 = $_POST['timePeriod_2'];
            $numOfRevs2 = $_POST['noOfRevisions_2'];
            $pckgDescription2 = $_POST['packageDescription_2'];
            $packageId2 = $_POST['packageId2'];

            // package 3 details (Premium)
            $packagePrice_3 = $_POST["packagePrice_3"];
            $numDeliveryDays3 = $_POST['noOfDeliveryDays_3'];
            $timeFrame3 = $_POST['timePeriod_3'];
            $numOfRevs3 = $_POST['noOfRevisions_3'];
            $pckgDescription3 = $_POST['packageDescription_3'];
            $packageId3 = $_POST['packageId3'];

            $currentDateTime = date('Y-m-d H:i:s');

            // have to consider about $onGoingOrderCount,$createdAt,$state later on for this.
            
            $packageIds = [$packageId1,$packageId2,$packageId3];
            $packagePrices = [$packagePrice_1,$packagePrice_2,$packagePrice_3];
            $packageDelivery = [$numDeliveryDays1,$numDeliveryDays2,$numDeliveryDays3];
            $packageTimeFrame = [$timeFrame1,$timeFrame2,$timeFrame3];
            $packageRevisions = [$numOfRevs1,$numOfRevs2,$numOfRevs3,];
            $packageDescriptions = [$pckgDescription1,$pckgDescription2,$pckgDescription3];

            $packages = [];
            for($i=0;$i<3;$i++){
                $packages[$i] = $this->GigHandlerModel->updatePackages($packageIds[$i],$packagePrices[$i],$packageDelivery[$i],$packageTimeFrame[$i],$packageRevisions[$i],$packageDescriptions[$i]);
            }

            // files upload part for cover image.
            $currentCoverImage = $_POST['currentCoverImage'];

            $targetDirectory1 = "../public/assests/images/gigImages/coverImages/";

            $newCoverImageName = basename($_FILES["newCoverImage"]["name"]); 

            $randomNumber = random_int(10000, 99999); // Generate a random number between 10000 and 99999
            $extension = pathinfo($newCoverImageName, PATHINFO_EXTENSION);
            $newCoverImageFirstName = pathinfo($newCoverImageName, PATHINFO_FILENAME);
            $uniqueCoverImageName = uniqid($newCoverImageFirstName, true) . '_' . time() . '_' .$randomNumber.".".$extension;
            $targetFilePath = $targetDirectory1. $uniqueCoverImageName; 
            $currentFilePath = $targetDirectory1 . $currentCoverImage;

            // check if the uploading file exists.
            if($newCoverImageName != "")
            {
                $isMoved = move_uploaded_file($_FILES["newCoverImage"]["tmp_name"], $targetFilePath);
                $isDeleted = unlink($currentFilePath);
                if($isMoved && $isDeleted){
                    echo "
                    <script>
                        alert('Successfully Updated The New Cover Image');
                    </script>
                ";
                }else{
                    echo "
                    <script>
                        alert('Error Moving New Cover Image');
                        window.location.href = '" . BASEURL . "sellerProfile';
                    </script>
                    ";
                }
            }else{
                $uniqueCoverImageName = $currentCoverImage;
            }

            // file uploads for 4 slider images.
            $targetDirectory2 = "../public/assests/images/gigImages/pckgImages/";

            // Get these as array elements as well as the file global variables.

            $sliderImage = [
                $_POST['currentSliderImg1'],
                $_POST['currentSliderImg2'],
                $_POST['currentSliderImg3'],
                $_POST['currentSliderImg4']
            ];

            $newSliderImageName = [
                basename($_FILES['newSliderImage1']["name"]),
                basename($_FILES['newSliderImage2']["name"]),
                basename($_FILES['newSliderImage3']["name"]),
                basename($_FILES['newSliderImage4']["name"])
            ];

            $newSliderImageTempName = [
                basename($_FILES['newSliderImage1']["tmp_name"]),
                basename($_FILES['newSliderImage2']["tmp_name"]),
                basename($_FILES['newSliderImage3']["tmp_name"]),
                basename($_FILES['newSliderImage4']["tmp_name"])
            ];

            $uniqueImageName = [];
            $arrayImagesString = [];
            $arrayImageUploads = [];

            // Note that some alerts are for check whether the correct process happening.
            for ($i = 0; $i < 4; $i++)
            {
                // to reinitialize the process variables.
                $targetFilePath= '';
                $arrayImageUploads[$i] = false;

                // $currentFileName =  $sliderImage[$i];

                $randomNumber = random_int(10000, 99999);
                $newSliderImageFirstName[$i] = pathinfo($newSliderImageName[$i], PATHINFO_FILENAME);
                $extension = pathinfo($newSliderImageName[$i], PATHINFO_EXTENSION);
                $uniqueImageName[] = uniqid($newSliderImageFirstName[$i], true) . '_' . time() . '_' .$randomNumber.".".$extension;

                $arrayImagesString[] = $uniqueImageName[$i];

                $targetFilePath = $targetDirectory2 . $uniqueImageName[$i]; 
                $currentFilePath = $targetDirectory2 .$sliderImage[$i];

                if($newSliderImageName[$i] != ""){

                    $arrayImageUploads[] = move_uploaded_file($newSliderImageTempName[$i], $targetFilePath);
                    $isImageDeleted = unlink($currentFilePath);
                
                    if($arrayImageUploads[$i] && $isImageDeleted){
                            echo "
                            <script>
                                alert('Successfully Updated The Slider Image in folder');
                            </script>
                        ";
                    }else{
                        echo "
                        <script>
                            alert('Error Moving New Image to folder');
                            window.location.href = '" . BASEURL . "sellerProfile';
                        </script>
                        ";
                    }
                }else{
                    $uniqueImageName =  $sliderImage[$i];
                }
            }

            // if($arrayImageUploads[0] && $arrayImageUploads[1] && $arrayImageUploads[2] && $arrayImageUploads[3]){
            $resultImageStore = $this->GigHandlerModel->updateSliderImages($gigId,$arrayImagesString[0],$arrayImagesString[1],$arrayImagesString[2],$arrayImagesString[3]);

            if($resultImageStore){
                echo "
                <script>
                    alert('Successfully Update the Slider Images!!');
                </script>
            ";
            }else{
                echo "
                <script>
                    alert('Couldn't update the Slider Images!!');
                </script>
            ";
            }
            // }

            $gig = $this->GigHandlerModel->updateGig($gigId,$title, $description, $category, $uniqueCoverImageName);
            if($gig){
                echo "
                    <script>
                        alert('Successfully Update the Gig!!');
                        window.location.href = '" . BASEURL . "sellerProfile';
                    </script>
                ";
            }
        }else{
            echo "
                <script>
                    alert('Error updating the data!!');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
                ";
        }
    }

    public function deleteGig()
    {
        // function to delete a specific gig.
        $gigId = $_GET['gigId'];
        $check = [];
        for($i = 0;$i<3;$i++){
            $check[] = $this->GigHandlerModel->deletePackages($gigId);
        }

        // Specify the directory where the files are located
        $targetFileDirectory1 = "../public/assests/images/gigImages/pckgImages/";
        $targetFileDirectory2 = "../public/assests/images/gigImages/coverImages/";

        // have to check the unlinking of the files in the folder structure.
        $imagesArr = $this->GigHandlerModel->retrieveSliderImages($gigId);
        $img = [];
        $img[0] = $imagesArr['side_image_1'];
        $img[1] = $imagesArr['side_image_2'];
        $img[2] = $imagesArr['side_image_3'];
        $img[3] = $imagesArr['side_image_4'];

        $coverImage = $this->GigHandlerModel->retrieveCoverImage($gigId);
        $coverImg = $coverImage['cover_image'];

        if($check[0] && $check[1] && $check[2]){
            if($this->GigHandlerModel->deleteSliderImages($gigId)){
                // delete slider images from the folder.
                for($j = 0;$j<4;$j++) {

                    $filePath1 = '';
                    // Construct the full path to the file
                    $filePath1 = $targetFileDirectory1 . $img[$j];

                    // Check if the file exists before attempting to delete it
                    if ($filePath1!= "") {
                        $isDeletedFile = unlink($filePath1);
                        if($isDeletedFile){
                            echo "Image '{$img[$j]}' deleted successfully.<br>";
                        } else {
                            echo "Error deleting the file '{$img[$j]}'.<br>";
                        }
                    } else {
                        echo "File '{$img[$j]}' does not exist.<br>";
                    }
                }

                // delete cover image from the folder.
                $filePath2 = $targetFileDirectory2 . $coverImg;
                if ($filePath2 != "") {
                    $isDeletedFile = unlink($filePath2);
                    if($isDeletedFile){
                        echo "Image '{$coverImg}' deleted successfully.<br>";
                    } else {
                        echo "Error deleting the file '{$coverImg}'.<br>";
                    }
                } else {
                    echo "File '{$coverImg}' does not exist.<br>";
                }

                if($this->GigHandlerModel->deleteGig($gigId)){
                    echo 
                    "
                    <script>alert('Gig deleted Successfully')
                    window.location.href = '" . BASEURL . "sellerProfile';
                    </script>
                    ";
                }else{
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
}
