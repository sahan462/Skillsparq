<?php

class updateGig extends Controller
{
    private $GigHandlerModel;
    // private $GigController;
    
    public function __construct()
    {
       $this->GigHandlerModel = $this->model('GigHandler');
        // $this->GigController = $this->controller('gig');
    }

   

    public function index()
    {

        if(!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])) {
            
            header("location: loginUser");
            exit;

        }else{
            $data['var'] = "UpdateGig";
            $data['title'] = "SkillSparq";

            $gigId = $_GET['gigId'];
            $userId = $_GET['userId'];

            $data['userId'] = $userId;
            $data['gigId'] = $gigId;

            if($userId == $_SESSION['userId']){
                // $data['GigDetails'] = mysqli_fetch_assoc($this->GigHandlerModel->getGig($gigId));

                $gig = $this->GigHandlerModel->displayGig($gigId);
                // $packages = $this->GigHandlerModel->getPackages($gigId);
                if ($gig != null) {
                    $data['gigDetails'] = mysqli_fetch_assoc($gig);
                    // $data['packageDetails'] = mysqli_fetch_assoc($packages);
                    print_r($data);
                    $this->view('UpdateGig', $data); 

                } else {
                    echo "<script>alert('Gig update is not Accessible!')</script>";
                }
                // $data['PackageDetails'] = mysqli_fetch_assoc($this->GigHandlerModel->getPackages($gigId));
                
            }else{
                echo 
                "
                <script>alert('Can not perform update!')</script>
                ";
            }

            //get gig details
            
           
             
        }
    }

}