<?php

class displayGig extends Controller
{
    private $GigHandlerModel;
    private $sellerHandlerModel;

    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->sellerHandlerModel = $this->model('sellerHandler');

    }


    public function index()
    {
        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {

            header("location: loginUser");

        }else{
            $data['var'] = "Display Gig Page";
            $data['title'] = "SkillSparq";
            $data['feedbacks'] = array();
            $gigId = $_GET['gigId'];
            $gig = $this->GigHandlerModel->displayGig($gigId);

            if ($gig) {

                $data['gig'] = $gig;

            } else {

                echo "<script>alert('Gig function is not Accessible!')</script>";
            
            }

            $this->view('displayGig', $data);
        }
    }


}