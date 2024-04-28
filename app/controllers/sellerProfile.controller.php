<?php

class SellerProfile extends Controller
{
    private $GigHandlerModel;
    private $ProfileHandlerModel;
    private $UserHandlerModel;
    private $SellerHandlerModel;
    
    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
        $this->UserHandlerModel = $this->model('userHandler');
        $this->SellerHandlerModel = $this->model('sellerHandler');
    }

    public function index()
    {

        if(!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"]) && ($_SESSION['role'] !== "Seller")){

            header("location: loginSeller");

        }else{
            $data['var'] = "Seller Profile";
            $data['title'] = "SkillSparq";
            $data["activeStatus"] =  "display: block;";

            $sellerId = $_SESSION["userId"];

            if(isset($_GET['mode']) == 'public'){
                $data['mode'] = 'public';
            }else{
                $data['mode'] = 'private';
            }

            $data["profileDetails"] = $this->getProfileDetails($sellerId);

            $sellerProfileDets = $this->SellerHandlerModel->getSellerProfileDets($sellerId);
            $sellerProfileDets = mysqli_fetch_assoc($sellerProfileDets);
            $data['sellerProfileDets'] = $sellerProfileDets;

            $_SESSION['firstName'] = $data['profileDetails']['first_name'];
            $_SESSION['lastName'] = $data['profileDetails']['last_name'];
            $_SESSION['userName'] = $data['profileDetails']['user_name'];
            
            $data['sellerId'] = $sellerId;

            //get recently added Gigs
            $GigsOfSeller = $this->GigHandlerModel->getGig($sellerId);
            $gigCountOfSeller = $this->GigHandlerModel->getGigCount($sellerId);
            if(isset($gigCountOfSeller)){
                $data['gigCount'] = $gigCountOfSeller;
            }

            // not the recent gigs have to get the specific gigs which would be created by the seller.          
            
            if(!empty($GigsOfSeller)) {
                $data['gigs'] = $GigsOfSeller;
            }else {
                echo 
                "<script>
                    alert('You haven't create Any Gigs yet!')
                </script>";
            }

            // Get Gig Details along with the relevant Seller using Seller Id
            $AllDetAboutGig = $this->GigHandlerModel->getGigAndSeller($sellerId);
            if($AllDetAboutGig){
                $data['ALLABOUTGIG'] = $AllDetAboutGig;
            }else{
                echo "<script>
                    alert('getGig function is not Accessible!')
                </script>";
            }

            // get the user email to notify seller if the field is empty.
            $email = $this->UserHandlerModel->getEmail($sellerId);
            $data['mail'] = $email;

            //check if the email is NULL or not.
            if(is_null($email)){
                $emailNotSet = true;
                
            }else{
                $emailNotSet = false;
            }
            $data['emailStatus'] = $emailNotSet;

            // get feedbacks
            $feedbacks = $this->ProfileHandlerModel->getFeedbacks($sellerId);
            if($feedbacks){
                $data['feedbacks'] = $feedbacks;
            }else{
                $this->redirect('_505');
            }

            if(!empty($_SESSION) && $emailNotSet){
                echo "
                <script>
                    alert('Setting up your email would attract more customers!')
                </script>
                ";
            }
            // show($_FILES);
            // show($data);
            // print_r($_SESSION);
            $this->view('sellerProfile', $data);
        } 
    }

    //get profile Details of the Seller/From Profile Table
    public function getProfileDetails($userId)
    {
        $userProfile = $this->ProfileHandlerModel->getProfileData($userId);
        $userProfile = mysqli_fetch_assoc($userProfile);
        return $userProfile;
    }

    // get the User Details of the Seller
    public function getSellerUserDetails($userId)
    {
        $user = $this->UserHandlerModel->getUserData($userId);
        $user = mysqli_fetch_assoc($user);
        return $user;
    }

    // get the Seller Id from the Seller Table using Phonenumber
    public function getSellerIdFromSellerTable($phoneNum)
    {
        $retrievedSellerId = $this->SellerHandlerModel->sellerId($phoneNum);
        return $retrievedSellerId;
    }

    // insert/update user email of seller profile
    public function addEmail()
    {
        $email = $_POST['Email'];
        $userId = $_POST['UserId'];

        if(!empty($email) && !empty($userId)){
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $isUpdated = $this->UserHandlerModel->setEmail($userId,$email);
                if($isUpdated){
                    echo "
                        <script>
                            window.alert('Email successfully updated !!')
                            window.location.href = '" . BASEURL . "sellerProfile';
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        window.alert('Email is not a valid Email !!')
                        window.location.href = '" . BASEURL . "sellerProfile';
                    </script>
                ";
            }
            
        }else{
            echo "
                <script>
                    window.alert('Email not Detected !!')
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
            ";
        }
    }

    // insert/update languages of seller profile
    public function addProfileLanguages()
    {
        $userId = $_POST['userId'];
        $userName = $_POST['userName'];
        $languages = $_POST['Languages'];
        if(!empty($languages) && !empty($userId) && !empty($userName)){
            $result = $this->SellerHandlerModel->addLanguages($languages,$userName,$userId);
            if($result){
                echo "
                <script>
                    alert('Successfully Added the Languages !');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>";
            }else{
                echo "
                <script>
                    alert('Insertion Unsuccessful !');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>";
            }
        }else{
            echo "
            <script>
                alert('Invalid Data Passing while updating!');
                window.location.href = '" . BASEURL . "sellerProfile';
            </script>";
        }
    }

    // inserting skills of seller profile
    public function addProfileSkills()
    {
        $userId = $_POST['userId'];
        $userName = $_POST['userName'];
        $skills = $_POST['Skills'];
        if(!empty($skills) && !empty($userId) && !empty($userName)){
            $result = $this->SellerHandlerModel->addSkills($skills,$userName,$userId);
            if($result){
                echo "
                <script>
                    alert('Successfully Added the Skills !');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>";
            }else{
                echo "
                <script>
                    alert('Insertion Unsuccessful !');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>";
            }
        }else{
            echo "
            <script>
                alert('Invalid Data Passing while updating!');
                window.location.href = '" . BASEURL . "sellerProfile';
            </script>";
        }
    }

    // inserting education of seller profile
    public function addProfileEducation()
    {
        $userId = $_POST['userId'];
        $userName = $_POST['userName'];
        $education = $_POST['Educations'];
        if(!empty($education) && !empty($userId) && !empty($userName)){
            $result = $this->SellerHandlerModel->addEducation($education,$userName,$userId);
            if($result){
                echo "
                <script>
                    alert('Successfully Added the Education !');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>";
            }else{
                echo "
                <script>
                    alert('Insertion Unsuccessful !');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>";
            }
        }else{
            echo "
            <script>
                alert('Invalid Data Passing while updating!');
                window.location.href = '" . BASEURL . "sellerProfile';
            </script>";
        }
    }

    public function addPortfolioImg()
    {
        if(isset($_POST['submit']) && isset($_POST['userId'])){
            $userId = $_POST['userId'];
            $upload_dir = "../public/assests/images/sellerPortfolioImgs/";
            $maxsize = 2 * 1024 * 1024;

            $file_tmpname = $_FILES['files']['tmp_name'];
            $file_name = basename($_FILES['files']['name']);
            $file_size = $_FILES['files']['size'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

            $uniqueImgName = time().'_'.random_int(0,999999) . "_" . $file_name ;
            // append the created unique name with the relevant file extension.
            $uniqueImgNameWithExt = $uniqueImgName;
            // append the file with extension to the given path to reside the file in the folder structure.

            $targetedFilePath = $upload_dir.$uniqueImgNameWithExt;

            if($file_ext == 'jpg' || $file_ext == 'png' || $file_ext == 'jpeg' || $file_ext == 'gif'){
                if($file_size > $maxsize){
                    echo "
                    <script>
                        window.alert('Maximum File Size is {$file_size} !');
                        window.location.href = '" . BASEURL . "sellerProfile';
                    </script>
                    ";
                }else{
                    $isInserted = $this->SellerHandlerModel->insertSinglePortfolioImg($userId,$uniqueImgNameWithExt);
                    if($isInserted){
                        if(move_uploaded_file($file_tmpname, $targetedFilePath)){
                            echo "
                            <script>
                                window.alert('Successfully Added to portfolio !');
                                window.location.href = '" . BASEURL . "sellerProfile';
                            </script>
                            ";
                        }else{
                            echo "
                            <script>
                                window.alert('Error Occured while moving the file !');
                                window.location.href = '" . BASEURL . "sellerProfile';
                            </script>
                            ";
                        }
                    }else{
                        echo "
                        <script>
                            window.alert('Image Couldn't saved !');
                            window.location.href = '" . BASEURL . "sellerProfile';
                        </script>
                        ";
                    }
                }
            }else{
                echo "
                <script>
                    window.alert('Wrong File Format !');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
                ";
            }
        }
            
    }

    public function addPortfolioImgsToProfile()
    {
        // Check if form was submitted
        if(isset($_POST['submit']) && isset($_POST['userId']) && isset($_POST['userName'])) {

            $userId = $_POST['userId'];
            $userName = $_POST['userName'];

            $upload_dir = "../public/assests/images/sellerPortfolioImgs/";

            $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
            
            // Define maxsize for files i.e 2MB
            $maxsize = 2 * 1024 * 1024; 

            // Checks if user sent an empty form 
            if(!empty(array_filter($_FILES['files']['name']))) {

                // values whether the size is valid or not
                $violateFiles = array();
                // values whether the extension is valid or not
                $violateFileExt = array();
                // to store the names of the files
                $uploadFiles = array();

                // $targetDir = "../public/assests/images/profilePictures/";
                // $profilePictureName = basename($_FILES["newProfilePicture"]["name"]); 
                // $uniqueprofilePictureName = uniqid($profilePictureName, true) . '_' . time() . '_' . $userName; //generate a unique filename 
                // $targetFilePath = $targetDir . $uniqueprofilePictureName; 
                // $currentFilePath = $targetDir . $currentProfilePicture;

                $fileCount = count($_FILES['files']['name']);

                // Loop through each file in files[] array
                foreach ($_FILES['files']['tmp_name'] as $key => $value) {
                    
                    $file_tmpname = $_FILES['files']['tmp_name'][$key];
                    $file_name = basename($_FILES['files']['name'][$key]);
                    $file_size = $_FILES['files']['size'][$key];
                    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

                    // create a unique name for the file without extension
                    $uniqueImgName = time().'_'.random_int(0,9999999) . "_" . $file_name ;
                    // append the created unique name with the relevant file extension.
                    $uniqueImgNameWithExt = $uniqueImgName . $file_ext;
                    // append the file with extension to the given path to reside the file in the folder structure.
                    $targetedFilePath = $upload_dir.$uniqueImgName;

                    // get each an every created path to an array.
                    $pathArr[] = $targetedFilePath;
                    show($pathArr);
                    // get each an every created path to an array.
                    $uploadFiles[] = $uniqueImgName;
                    show($uploadFiles);
                    // get each an every created temporary file.
                    $moveTempFiles[] = $file_tmpname;
                    show($moveTempFiles);

                    // check whether the files are less than the given size.
                    if($file_size > $maxsize){
                        $violateFiles[$file_name] = "Maxsize exceed";
                        // echo $file_name. " ".$violateFiles[$file_name];
                        echo "
                        <script>
                            window.alert('{$file_name} FileSize Exceed !');
                            window.location('sellerProfile');
                        </script>
                        ";
                        break;
                    }
                    // else{
                        // check whether the size checked file names have the relevant extensions given above. 
                    if(in_array(strtolower($file_ext), $allowed_types)){
                        $violateFileExt[$file_name] = "Accept";
                    }else{
                        $violateFileExt[$file_name] = "Reject";
                    }
                    // }

                }

                // show($uploadFiles);

                // $sizeOk = 0;
                $statusOk = 0;

                // foreach ($violateFiles as $name => $sizeExceed) {
                //     if($name === "Maxsize exceed"){
                //         echo "
                //         <script>
                //             window.alert('{$file_name} FileSize Exceed !');
                //             window.location('sellerProfile');
                //         </script>
                //         ";
                //     }else{
                //         $sizeOk = 1;
                //         break;
                //     }
                // }

                foreach ($violateFileExt as $name => $status) {
                    if($status === "Rejected"){
                        echo "
                        <script>
                            window.alert('{$file_name} is not a valid file type !');
                            window.location('sellerProfile');
                        </script>
                        ";
                    }else{
                        $statusOk = 1;
                        // show($name);
                    }
                }

                // if($sizeOk && $statusOk){
                if($statusOk){
                    $uploadOk = [];
                    $uploadOkInt = [];
                    foreach ($uploadFiles as $records) {
                        // show($uploadFiles);
                        // show($records);
                        // show($uploadOk[$records]);
                        $isInserted = $this->SellerHandlerModel->insertPortfolioImgs($userId,$records);
                        if(!$isInserted){
                            echo "
                            <script>
                                window.alert('Error while inserting to the database. !');
                                window.location('sellerProfile');
                            </script>
                            ";
                        }else{
                            $uploadOk[$records] = $isInserted;
                            $uploadOkInt[] = 1;
                        }
                    }

                    $isMoved = array();
                    for($i = 0; $i < $fileCount; $i++) {
                        show($uploadOkInt);
                        if($uploadOkInt[$i]){
                            if(move_uploaded_file($moveTempFiles[$i], $pathArr[$i])){
                                echo "
                                <script>
                                    window.alert('Successfully Added to portfolio !');
                                    window.location('sellerProfile');
                                </script>
                                ";
                            }
                        }else{
                            echo "Can't move the files !";
                        }
                    }
                }else{
                    echo "Either the Size or Type doesn't match the requirement";
                }
            }else{
                $this->redirect('sellerProfile');
            }
        }else{
            echo "Error passing data";
        }

    }

    public function deletePortfolioImgs($userId,$imgId)
    {
        $_POST['userId'];
        $_POST['portfolioImgId'];

        if(isset($_POST['userId']) && isset($_POST['portfolioImgId'])){
            $isDeleted = $this->SellerHandlerModel->deletePortfolioImgs($userId,$imgId);
            if($isDeleted){
                echo "
                <script>
                    window.alert('Successfully Deleted the Image');
                    window.location('sellerprofile');
                </script>
                ";
            }
        }else{
            echo "
            <script>
                window.alert('Error Occured While Deleting');
                window.location('sellerprofile');
            </script>
            ";
        }
        
    }

    // has to adjust for client.
    public function  updateSellerProfile()
    {
        $currentProfilePicture = $_POST['currentProfilePicture'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $country = $_POST['country'];
        $about = $_POST['about'];
        $userId = $_POST['userId'];
        $userName = $_POST['userName'];

        print_r($currentProfilePicture);

        $targetDir = "../public/assests/images/profilePictures/";
        $profilePictureName = basename($_FILES["newProfilePicture"]["name"]); 

        $profilePicExt = pathinfo($profilePictureName,PATHINFO_EXTENSION);        $uniqueprofilePictureName = uniqid($profilePictureName, true) . '_' . time() . '_' . $userName.".".$profilePicExt; //generate a unique filename 
        $targetFilePath = $targetDir . $uniqueprofilePictureName; 
        $currentFilePath = $targetDir . $currentProfilePicture;

        // check if the current and uploading files are same
        if($profilePictureName != "")
        {

            $upload = move_uploaded_file($_FILES["newProfilePicture"]["tmp_name"], $targetFilePath);
            
            if($upload){
                
                if($currentProfilePicture != "dummyprofile.jpg"){
                    //remove the old profile picture
                    unlink($currentFilePath);
                }

                $_SESSION['profilePicture'] =  $uniqueprofilePictureName;

            }else{

                echo "
                <script>
                    alert('Error Uploading Profile Picture');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
                ";

            }

        }else{
            $uniqueprofilePictureName = $currentProfilePicture;
        }

        $updateProfile = $this->ProfileHandlerModel->updateProfileTable($uniqueprofilePictureName, $firstName, $lastName, $country, $about, $userId, $userName);
        
        if($updateProfile)
        {
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;

            echo "
            <script>
                alert('Profile Updated Successfully');
                window.location.href = '" . BASEURL . "sellerProfile';
            </script>
        ";

        }else{

            echo "
            <script>
                alert('Error Updating Profile');
                window.location.href = '" . BASEURL . "sellerProfile';
            </script>
            ";

        }
    }

    public function deleteSellerProfile()
    {
        $sellerId = $_POST['userId'];
        $userName = $_POST['userName'];
        // delete a seller profile if he/she doesn't have ongoing orders to done.
        $ongoing_order_count = $this->GigHandlerModel->getOngoingOrderCount($sellerId);

        if($ongoing_order_count != 0){
            echo "
            <script>
                alert('Can't Delete profile while ongoing orders exists !!!');
                window.location.href = '" . BASEURL . "sellerProfile';
            </script>
            ";
            die;

        }else{

            $deleteUserStatus = $this->UserHandlerModel->deleteUser($sellerId);
            if($deleteUserStatus){

                $deleteSellerStatus = $this->SellerHandlerModel->deleteSeller($sellerId);
                if($deleteSellerStatus){

                    echo "
                    <script>
                        alert('Profile Deleted Successfully !!');
                        window.location.href = '" . BASEURL . "home';
                    </script>
                    ";
                    
                }
            }

        }
    }

}

?>