<?php

class updateGig extends Controller
{
    public function __construct()
    {
       $this->GigHandlerModel = $this->model('gigHandler');
        $this->GigController = $this->controller('gig');
    }

   

    public function index()
    {

        // echo print_r($_POST);
        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
            
            header("location: loginUser");
            exit;

        }else{
            $data['var'] = "UpdateGig";
            $data['title'] = "SkillSparq";

            $gigId = $_GET['gigId'];
            $userId = $_GET['userId'];
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
           
            $this->view('UpdateGig', $data);   
        }
    }

}