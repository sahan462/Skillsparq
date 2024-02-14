<?php

class updateGig extends Controller
{
    private $GigHandlerModel;
    
    public function __construct()
    {
       $this->GigHandlerModel = $this->model('GigHandler');
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

            if($userId === $_SESSION['userId']){

                $gig = $this->GigHandlerModel->displayGig($gigId);
                if ($gig !== null) {
                    $data['gigDetails'] = $gig;
                    show($data);
                    $this->view('UpdateGig', $data); 
                } else {
                    echo "<script>alert('Gig update is not Accessible!')</script>";
                }
                
            }else{
                echo 
                "
                <script>alert('Can not perform update!')</script>
                ";
            }            
        }
    }

}