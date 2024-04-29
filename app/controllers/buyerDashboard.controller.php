<?php

class BuyerDashboard extends Controller
{
    private $GigHandlerModel;
    public function __construct()
    {
        $this->GigHandlerModel = $this->model('GigHandler');
    }

    public function index()
    {

        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){

            header("location: loginUser");

        }else{

            $data['var'] = "Home Page";
            $data['title'] = "SkillSparq";

            $recentAllGigsWithDets = $this->GigHandlerModel->getRecentGigWithRelevantSellerDets();
    
            if ($recentAllGigsWithDets) {
                $data['recentGigs'] = $recentAllGigsWithDets;
            } else {
                echo "<script>alert('getAllJobs function is not Accessible!')</script>";
            }
                        
            $newBieGigs = $this->GigHandlerModel->getNewBieGigs();
            if ($recentAllGigsWithDets) {
                $data['newBieGigs'] = $newBieGigs;
            } else {
                echo "<script>alert('getNewBieGigs function is not Accessible!')</script>";
            }
                        
            $this->view('buyerdashboard', $data);

        }

    }

}

?>