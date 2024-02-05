<?php

class updateGig extends Controller
{
    private $GigHandlerModel;
    private $GigController;
    
    public function __construct()
    {
       $this->GigHandlerModel = $this->model('gigHandler');
        $this->GigController = $this->controller('gig');
    }

   

    public function index()
    {

        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
            
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

            }

            //get gig details
            $gig = $this->GigHandlerModel->getGig($gigId);
            if ($gig) {

                $data['gigId'] = mysqli_fetch_assoc($gig);

            } else {
                echo "<script>alert('Gig function is not Accessible!')</script>";
            }
           
            print_r($data);
            $this->view('UpdateGig', $data);   
        }
    }

}