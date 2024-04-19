<?php

class displayGig extends Controller
{
    private $GigHandlerModel;
    private $ProfileHandlerModel;

    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
    }

    public function index()
    {

        if($_SESSION['role'] === "Seller"){
            // display view would be loaded with the Seller header to the view page.
            if(!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])){

                header("location: loginSeller");

            }else{
                $data['var'] = "Display Gig Page";
                $data['title'] = "SkillSparq";
                $data['feedbacks'] = array();
                $gigId = $_GET['gigId'];
                $userId = $_GET['userId'];

                $gig = $this->GigHandlerModel->displayGig($gigId);
                $sliderImgs = $this->GigHandlerModel->retrieveSliderImages($gigId);

                $profileData = $this->ProfileHandlerModel->getUserProfile($userId);
                $profileData = mysqli_fetch_assoc($profileData);

                if ($gig && $profileData &&$sliderImgs) {

                    $data['gig'] = $gig;
                    $data['profileData'] = $profileData;
                    $data['sliderImgs'] = $sliderImgs;

                } else {
    
                    echo "<script>
                        alert('Gig function is not Accessible!');
                        window.location.href = '" . BASEURL . "sellerProfile';
                        </script>";
                
                }
            }
            
            // show($data);
            $this->view('displayGig', $data);
        }

        if($_SESSION['role'] === "Buyer"){
            // display view would be loaded with the Buyer header to the view page.  
            if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){

                header("location: loginUser");

            }else{
                $data['var'] = "Display Gig Page";
                $data['title'] = "SkillSparq";
                $data['feedbacks'] = array();
                $gigId = $_GET['gigId'];
                $userId = $_GET['userId'];

                $gig = $this->GigHandlerModel->displayGig($gigId);
                $sliderImgs = $this->GigHandlerModel->retrieveSliderImages($gigId);

                $profileData = $this->ProfileHandlerModel->getUserProfile($userId);
                $profileData = mysqli_fetch_assoc($profileData);

                if ($gig) {

                    $data['gig'] = $gig;
                    $data['profileData'] = $profileData;
                    $data['sliderImgs'] = $sliderImgs;
    
                } else {
    
                    echo "<script>
                            alert('Gig is not Accessible!');
                          </script>";
                
                }
            }       
            // show($data);
            $this->view('displayGig', $data);
        }
    }
}