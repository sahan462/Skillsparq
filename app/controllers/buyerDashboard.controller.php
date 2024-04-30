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

            if($_SESSION['role'] === "Buyer"){
                // search functionality for Buyer Dashboard Header input field (It's in the buyerHeader component.)
                if(!empty($_GET['searchBuyerDash']) && $_GET['searchBuyerDash'] != ''){
                    $textToSearch = $_GET['searchBuyerDash'];
                    // $getResult = $this->GigHandlerModel->getGigsSearch($textToSearch);
                    $getResult = $this->GigHandlerModel->getRecentGigWithRelevantSellerDetsForSearch($textToSearch);
                    if(!empty($getResult)){
                        $data['SEARCH'] = $getResult;
                        // print_r(mysqli_fetch_assoc($data['SEARCH']));
                        // show(mysqli_fetch_assoc($data['SEARCH']));
                        $this->view('buyerdashboard',$data);
                    }else{
                        echo "
                        <script>
                            window.alert('Search not Found !!')
                            window.location.href = '" . BASEURL . "buyerDashboard';
                        </script>
                    ";
                    }
                }
            }

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