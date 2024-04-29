<?php

class BuyerProfile extends Controller
{ 

    private $JobHandlerModel;
    private $ProfileHandlerModel;
    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
    }

    public function index()
    {

        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
            
            header("location: loginUser");
            exit;

        }else{

            $data['var'] = "Buyer Profile Page";
            $data['title'] = "SkillSparq";
            $data["activeStatus"] =  "display: block;";

            if(isset($_GET['userId'])){
                $userId = $_GET['userId'];
            }else{
                $userId = $_SESSION["userId"];
            }

            if(isset($_GET['mode']) == 'public'){
                $data['mode'] = 'public';
            }else{
                $data['mode'] = 'private';
            }
            
            //get profile information
            $userProfile = $this->ProfileHandlerModel->getUserProfile($userId);
            $userProfile = mysqli_fetch_assoc($userProfile);
            $data["userProfile"] = $userProfile;

            //get Jobs
            $standardModeJobs = $this->JobHandlerModel->getAllJobs($userId);

            $jobs = []; 

            if ($standardModeJobs) {
                while ($job = mysqli_fetch_assoc($standardModeJobs)) {
                    if ($job['publish_mode'] == 'Auction Mode') {

                        $auction = $this->JobHandlerModel->getAuction($job['job_id'], $userId);

                        if ($auction) {
                            $auction =  mysqli_fetch_assoc($auction);
                            $mergedJob = array_merge($job,$auction);
                            $jobs[] = $mergedJob; 
                        }
                    } else {
                        $jobs[] = $job; 
                    }
                }
            } else {
                echo "<script>alert('getAllJobs function is not Accessible!')</script>";
            }
            
            $data['jobs'] = $jobs;

            // get feedbacks

            $feedbacks = $this->ProfileHandlerModel->getFeedbacks($userId);
            if($feedbacks){
                $data['feedbacks'] = $feedbacks;
            }else{
                $this->redirect('_505');
            }

            // show($data);
            $this->view('buyerProfile', $data);
            
        }


    }

    //Update buyer profile
    function updateBuyerProfile()
    {

        $currentProfilePicture = $_POST['currentProfilePicture'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $country = $_POST['country'];
        $about = $_POST['about'];
        $userId = $_POST['userId'];
        $userName = $_POST['userName'];

        $targetDir = "../public/assests/images/profilePictures/";
        $profilePictureName = basename($_FILES["newProfilePicture"]["name"]); 
        $uniqueprofilePictureName =  time() . '_' . $userName . '_' . uniqid($profilePictureName, true) . $profilePictureName; //generate a unique filename 
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
                    window.location.href = '" . BASEURL . "buyerProfile';
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
            
            $data['redirectURL'] = BASEURL . 'buyerProfile';
            $data['message'] = "Profile Updated Successfully";
            $this->view('successful', $data);

        }else{

            echo "
            <script>
                alert('Error Updating Profile');
                window.location.href = '" . BASEURL . "buyerProfile';
            </script>
            ";

        }

    }

}

?>