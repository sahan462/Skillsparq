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
            $userId = $_SESSION["userId"];
            
            //get profile information
            $userProfile = $this->ProfileHandlerModel->getUserProfile($userId);
            $userProfile = mysqli_fetch_assoc($userProfile);
            $data["userProfile"] = $userProfile;

            //get Jobs
            $standardModeJobs = $this->JobHandlerModel->getAllJobs($userId);

            $jobs = array(); 

            if ($standardModeJobs) {
                while ($job = mysqli_fetch_assoc($standardModeJobs)) {
                    if ($job['publish_mode'] == 'Auction Mode') {

                        $auction = $this->JobHandlerModel->getAuction($job['job_id'], $userId);

                        if ($auction) {
                            $mergedJob = array_merge($job, mysqli_fetch_assoc($auction));
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
            echo "<pre>";
            print_r($data);
            echo "</pre>";
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
        $language = "";
        $skills = "";

        $targetDir = "../public/assests/images/profilePictures/";
        $profilePictureName = basename($_FILES["newProfilePicture"]["name"]); 
        $uniqueprofilePictureName = uniqid($profilePictureName, true) . '_' . time() . '_' . $userName; //generate a unique filename 
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

        $updateProfile = $this->ProfileHandlerModel->updateProfileTable($uniqueprofilePictureName, $firstName, $lastName, $country, $about, $language, $skills, $userId, $userName);
        
        if($updateProfile)
        {
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;

            echo "
            <script>
                alert('Profile Updated Successfully');
                window.location.href = '" . BASEURL . "buyerProfile';
            </script>
        ";

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