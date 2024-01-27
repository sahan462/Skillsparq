<?php
include 'sellerProfile.controller.php';
class EditSellerProfile extends SellerProfile
{
    private $SellerProfileController;

    protected $userId;
    protected $sellerId;
    private $emailAndPassWord;

    public function __construct() {
        // All the model instances are initiated in the sellerProfile controller itself. (GigHandlerModel,ProfileHandlerModel,UserHandlerModel,SellerHandlerModel)
        $this->SellerProfileController = $this->controller('sellerProfile');
    }

    public function index(){
            $data['var'] = "Edit Seller Profile Page";

            // get the userId through session array.
            $userId = $_SESSION["userId"];

            // get the phone number through session variable.
            // $phoneNum =  $_SESSION['phoneNumber'];
            // $data['sellerId'] = $this->SellerHandlerModel->sellerId($phoneNum);

            // get the Seller Profile Details through SellerProfileController.
            $data["sellerProfileDetails"] =$this->SellerProfileController->getSellerProfileDetails($userId);

            // get the Seller User Details through SellerProfileController.
            $data['sellerUserDetails'] = $this->SellerProfileController->getSellerUserDetails($userId);

            // get email and password from the userHandlerModel - user table
            // $data['emailAndPassWord'] = $this->getEmailPassWord($userId);
         
            // get the phone number through session variable.
            $phoneNum =  $_SESSION['phoneNumber'];
            // $data['sellerId'] = $this->SellerHandlerModel->sellerId($phoneNum);
            print_r($data);
            $this->view('editSellerProfile', $data);
    }

    // public function getEmailPassWord($userId){
    //     $this->emailAndPassWord = $this->UserHandlerModel->getEmailAndPassWord($userId);
    //     $emailAndPassWord = mysqli_fetch_assoc($this->emailAndPassWord);
    //     return $emailAndPassWord;
    // }


    
    // edit button of the picture will call this as the path for href.
    public function updateProfile_Pic(){
        if(isset($_GET['updatePic']))
        { // name attribute of the button
            $profpic  = $_GET['profilePic'];// name attribute of the input field
            $userId = $_GET['userId']; // pass this as a hidden input field name.

            $picture = $this->ProfileHandlerModel->setProfile_Pic($userId,$profpic);
            // $picture = mysqli_fetch_assoc($picture); 

            if($picture){
                echo "
                <script>
                    alert('Profile Picture is Updated Successfully');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
            ";
            }else{
                echo "
                <script>alert('Error when updating')</script>
                ";
            }
        } 
    }

    public function updateUserName_Lname_Fname(){
        if(isset($_GET['updateNames']))
        { 
            $firstName  = $_GET['fname'];
            $lastName  = $_GET['lname'];
            $userName  = $_GET['username'];
            $userId = $_GET['userId'];

            $about = $this->ProfileHandlerModel->setNames($userId,$firstName,$lastName,$userName);
            // $about = mysqli_fetch_assoc($about);

            if($about){
                echo "
                <script>
                    alert('First Name, Last Name,User Name has been Updated Successfully');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
            ";
            }else{
                echo "
                <script>alert('Error when updating')</script>
                ";
            }
        } 
    }

    // consider about updating the country field in the table.

    public function updateAbout(){
        if(isset($_GET['updateAbout']))
        { 
            $about  = $_GET['about'];
            $userId = $_GET['userId']; 

            $about = $this->ProfileHandlerModel->setAbout($userId,$about);
            // $about = mysqli_fetch_assoc($about);

            if($about){
                echo "
                <script>
                    alert('About is Updated Successfully');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
            ";
            }else{
                echo "
                <script>alert('Error when updating')</script>
                ";
            }
        } 
    }

    public function updateLanguages(){
        if(isset($_GET['updateLanguages']))
        { 
            $languages  = $_GET['languages'];
            $userId = $_GET['userId'];

            $languages = $this->ProfileHandlerModel->setLanguages($userId,$languages);
            // $languages = mysqli_fetch_assoc($languages);

            if($languages){
                echo "
                <script>
                    alert('Languages are Updated Successfully');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
            ";
            }else{
                echo "
                <script>alert('Error when updating')</script>
                ";
            }
        } 
    }


    public function updateEducations()
    {
        // remember to create a column named "education" in the profile table.
        if(isset($_GET['updateEducations']))
        { 
            $educations  = $_GET['educations'];
            $userId = $_GET['userId']; 

            $educations = $this->ProfileHandlerModel->setEducations($userId,  $educations);
            // $educations = mysqli_fetch_assoc($educations);

            if($educations){
                echo "
                <script>
                    alert('Educations are Updated Successfully');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
            ";
            }else{
                echo "
                <script>alert('Error when updating')</script>
                ";
            }
        } 
    }


    public function updatePassword(){
        if(isset($_GET['updatePassWord']))
        { 
            $password  = $_GET['password'];
            $userId = $_GET['userId'];

            $password = $this->UserHandlerModel->setPassword($userId,  $password);
            // $educations = mysqli_fetch_assoc($educations);

            if($password){
                echo "
                <script>
                    alert('Password is Updated Successfully');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
            ";
            }else{
                echo "
                <script>alert('Error when updating')</script>
                ";
            }
        } 
    }

    public function updateEmail(){
        if(isset($_GET['updateEmail']))
        { 
            $email  = $_GET['email'];
            $userId = $_GET['userId'];

            $email = $this->UserHandlerModel->setEmail($userId,$email);

            if($email){
                echo "
                <script>
                    alert('Email has been Updated Successfully');
                    window.location.href = '" . BASEURL . "sellerProfile';
                </script>
            ";
            }else{
                echo "
                <script>alert('Error when updating')</script>
                ";
            }
        } 
    }




    public function deleteSellerProfile($userId){
        
    }
}