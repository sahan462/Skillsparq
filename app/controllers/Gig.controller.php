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

        try{

            if (isset($_POST['btnSubmit']))
            {
                // For gigs table
                $title = $_POST['title'];
                $description = trim($_POST['description']);
                $category = $_POST['category'];

                // package 1 details
                $packagePrice_1 = $_POST['packagePrice_1'];
                $packageName_1 = $_POST['packageName_1'];
                $noOfRevisions_1 = $_POST['noOfRevisions_1'];
                $noOfDeliveryDays_1 = $_POST['noOfDeliveryDays_1'];
                $timePeriod_1 = $_POST['timePeriod_1'];
                $packageDescription_1 = trim($_POST['packageDescription_1']);

                // package 2 details
                $packagePrice_2 = $_POST['packagePrice_2'];
                $packageName_2 = $_POST['packageName_2'];
                $noOfRevisions_2 = $_POST['noOfRevisions_2'];
                $noOfDeliveryDays_2 = $_POST['noOfDeliveryDays_2'];
                $timePeriod_2 = $_POST['timePeriod_2'];
                $packageDescription_2 = trim($_POST['packageDescription_2']);

                // package 3 details
                $packagePrice_3 = $_POST['packagePrice_3'];
                $packageName_3 = $_POST['packageName_3'];
                $noOfRevisions_3 = $_POST['noOfRevisions_3'];
                $noOfDeliveryDays_3 = $_POST['noOfDeliveryDays_3'];
                $timePeriod_3 = $_POST['timePeriod_3'];
                $packageDescription_3 = trim($_POST['packageDescription_3']);

                $currentDateTime = date('Y-m-d H:i:s');
                $sellerId = $this->getSession('userId');

                // directory where gig cover image resides.
                $targetDirCover = "../public/assests/images/gigImages/coverImages/";

                // cover image file details. 
                $coverImage = basename($_FILES["coverImage"]["name"]);
                $coverImageTmp = $_FILES["coverImage"]["tmp_name"];

                $isSaveCover = false;

                if(!empty($coverImage) && !empty($coverImageTmp)){
                    $randomNumber = random_int(10000, 99999); // Generate a random number
                    $fileExtension = pathinfo($coverImage, PATHINFO_EXTENSION);
                    $coverImageName = pathinfo($coverImage, PATHINFO_FILENAME);
                    $uniqueCoverImageName = uniqid($coverImageName, true) . '_' . time() . '_' .$randomNumber.".".$fileExtension;
                    $targetCoverFilePath = $targetDirCover . $uniqueCoverImageName; 
                    $isSaveCover = move_uploaded_file($coverImageTmp, $targetCoverFilePath);
                }

                // directory where All Gig sliderImages resides.
                $targetDirSldImg = "../public/assests/images/gigImages/pckgImages/";


                // Gig sliderImage1 file details. 
                $sliderImage1 = basename($_FILES["sliderImage1"]["name"]);
                $sliderImage1Tmp = $_FILES["sliderImage1"]["tmp_name"];
                $uploadSlideImg1 = false;

                if(!empty($sliderImage1) && !empty($sliderImage1Tmp)){
                    $randomNumber1 = random_int(10000, 99999); // Generate a random number
                    $fileExtension1 = pathinfo($sliderImage1, PATHINFO_EXTENSION);
                    $sliderImage1Name = pathinfo($sliderImage1, PATHINFO_FILENAME);
                    $uniquesliderImage1Name = uniqid($sliderImage1Name, true) . '_' . time() . '_' .$randomNumber1.".".$fileExtension1;
                    $targetsliderImage1Path1 = $targetDirSldImg . $uniquesliderImage1Name; 
                    $uploadSlideImg1 = move_uploaded_file($sliderImage1Tmp, $targetsliderImage1Path1);
                }else{
                    $uniquesliderImage1Name = NULL;
                }
    

                // Gig sliderImage2 file details.
                $sliderImage2 = basename($_FILES["sliderImage2"]["name"]);
                $sliderImage2Tmp = $_FILES["sliderImage2"]["tmp_name"];
                $uploadSlideImg2 = false;

                if(!empty($sliderImage2) && !empty($sliderImage2Tmp)){
                    $randomNumber2 = random_int(10000, 99999); // Generate a random number
                    $fileExtension2 = pathinfo($sliderImage2, PATHINFO_EXTENSION);
                    $sliderImage2Name = pathinfo($sliderImage2, PATHINFO_FILENAME);
                    $uniquesliderImage2Name = uniqid($sliderImage2Name, true) . '_' . time() . '_' .$randomNumber2.".".$fileExtension2;
                    $targetsliderImage2Path2 = $targetDirSldImg . $uniquesliderImage2Name; 
                    $uploadSlideImg2 = move_uploaded_file($sliderImage2Tmp, $targetsliderImage2Path2);
                }else{
                    $uniquesliderImage2Name = NULL;
                }

                // Gig sliderImage3 file details.
                $sliderImage3 = basename($_FILES["sliderImage3"]["name"]);
                $sliderImage3Tmp = $_FILES["sliderImage3"]["tmp_name"];
                $uploadSlideImg3 = false;

                if(!empty($sliderImage3) && !empty($sliderImage3Tmp)){
                    $randomNumber3 = random_int(10000, 99999); // Generate a random number
                    $fileExtension3 = pathinfo($sliderImage3, PATHINFO_EXTENSION);
                    $sliderImage3Name = pathinfo($sliderImage3, PATHINFO_FILENAME);
                    $uniquesliderImage3Name = uniqid($sliderImage3Name, true) . '_' . time() . '_' .$randomNumber3.".".$fileExtension3;
                    $targetsliderImage3Path3 = $targetDirSldImg . $uniquesliderImage3Name; 
                    $uploadSlideImg3 = move_uploaded_file($sliderImage3Tmp, $targetsliderImage3Path3);
                }else{
                    $uniquesliderImage3Name = NULL;
                }

                // Gig sliderImage4 file details.
                $sliderImage4 = basename($_FILES["sliderImage4"]["name"]);
                $sliderImage4Tmp = $_FILES["sliderImage4"]["tmp_name"];
                $uploadSlideImg4 = false;

                if(!empty($sliderImage4) && !empty($sliderImage4Tmp)){
                    $randomNumber4 = random_int(10000, 99999); // Generate a random number
                    $fileExtension4 = pathinfo($sliderImage4, PATHINFO_EXTENSION);
                    $sliderImage4Name = pathinfo($sliderImage4, PATHINFO_FILENAME);
                    $uniquesliderImage4Name = uniqid($sliderImage4Name, true) . '_' . time() . '_' .$randomNumber4.".".$fileExtension4;
                    $targetsliderImage4Path4 = $targetDirSldImg . $uniquesliderImage4Name; 
                    $uploadSlideImg4 = move_uploaded_file($sliderImage4Tmp, $targetsliderImage4Path4);
                }else{
                    $uniquesliderImage4Name = NULL;
                }

                $gig = $this->GigHandlerModel->addNewGig($title, $description, $category, $uniqueCoverImageName,$packagePrice_1,$packageName_1,$noOfRevisions_1,$noOfDeliveryDays_1, $timePeriod_1,  $packageDescription_1, $packagePrice_2,$packageName_2,$noOfRevisions_2,$noOfDeliveryDays_2, $timePeriod_2,  $packageDescription_2, $packagePrice_3,$packageName_3, $noOfRevisions_3,  $noOfDeliveryDays_3, $timePeriod_3,$packageDescription_3, $currentDateTime, $uniquesliderImage1Name,$uniquesliderImage2Name,$uniquesliderImage3Name,$uniquesliderImage4Name,$sellerId);

                if($isSaveCover || $uploadSlideImg1 || $uploadSlideImg2 || $uploadSlideImg3 || $uploadSlideImg4){
                
                    if($gig[0]){
                        echo "
                            <script>
                                alert('Gig is Published Successfully');
                                window.location.href = '" . BASEURL . "sellerProfile#gigs';
                            </script>
                        ";
                    }else{

                        throw new Error("Error publishing Gig");
  
                    }
                }else{

                    throw new Error("Error uploading images");

                }

            }else{

                $this->view("505");

            }

        }catch(Exception $e){

            echo 'An error occurred during publishing gig: ' . $e->getMessage();
            // $this->redirect("_505");

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
