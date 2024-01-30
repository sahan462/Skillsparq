<?php

class SellerProfile extends Controller
{
    protected $GigHandlerModel;
    protected $ProfileHandlerModel;
    protected $UserHandlerModel;
    protected $SellerHandlerModel;
    
    protected $userId;
    protected $sellerId;
    protected $recentGigs;
    protected $GigsOfSeller;
    protected $data;
    protected $phoneNum;
    
    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
        $this->UserHandlerModel = $this->model('userHandler');
        $this->SellerHandlerModel = $this->model('sellerHandler');
    }

    public function index()
    {

        if(!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])){

            header("location: loginSeller");

        }else{
            $data['var'] = "Seller Profile";
            $data['title'] = "SkillSparq";
            $data["activeStatus"] =  "display: block;";

            $sellerId = $_SESSION["userId"];
            $phoneNum = $_SESSION['phoneNumber'];

            $data["sellerProfileDetails"] = $this->getSellerProfileDetails($sellerId);

            // get seller id for gigs.
            // $sellerId = $this->getSellerIdFromSellerTable($phoneNum);
            // $data['sellerId'] = $sellerId;
            $data['sellerId'] = $sellerId;
            //get recently added Gigs
            $GigsOfSeller = $this->GigHandlerModel->getGig($sellerId);
            // not the recent gigs have to get the specific gigs which would be created by the seller.

            $Gigs = array();


            if ($GigsOfSeller) {
                while ($Gig = mysqli_fetch_assoc($GigsOfSeller)) {
                    $Gigs[] = $Gig;
                }
            } else {
                echo "<script>alert('getGig function is not Accessible!')</script>";
            }
            
            $data['gigs'] = $Gigs;



            // $data['GigsOfSeller'] =mysqli_fetch_assoc($GigsOfSeller);

            // if ($GigsOfSeller) {

            //     $data['GigsOfSeller'] = $GigsOfSeller;
                
            // } else {
            //     echo "<script>alert('getAllGigs function is not Accessible!')</script>";
            // }
            
            // $data['GigsOfSeller'] = $GigsOfSeller;
            // $data['GigsOfSeller'] =mysqli_fetch_assoc($data['GigsOfSeller']);

            show($data);
        

            $this->view('sellerProfile', $data);
        } 
    }

    //get profile Details of the Seller
    public function getSellerProfileDetails($userId)
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

    public function  updateSellerProfile()
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

        print_r($currentProfilePicture);

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