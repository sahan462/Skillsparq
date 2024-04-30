<?php

class Search extends Controller
{

    private $GigHandlerModel;
    private $JobHandlerModel;
    private $SellerHandlerModel;
    private $ProfileHandlerModel;

    public function __construct(){
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->JobHandlerModel = $this->model('JobHandler');
        $this->SellerHandlerModel = $this->model('SellerHandler');
        $this->ProfileHandlerModel = $this->model('ProfileHandler');
    }

    public function index(){

        if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {

            header("location: loginUser");

        }else{

            $data['var'] = "Search";
            $data['title'] = "SkillSparq";           


            if($_SESSION['role'] === "Seller" || $_SESSION['role'] === "Buyer"|| $_SESSION['role'] === "CSA"|| $_SESSION['role'] === "csa"){
                if(isset($_GET['searchIn']) && $_GET['searchIn'] != ''){
                    $textToSearch = $_GET['searchIn'];
                }
            }
            

            // if($_SESSION['role'] === "Seller"){

            //     // search functionality for Seller Dashboard
            //     if(empty($_GET['searchSellerDash'])){
            //         echo "
            //             <script>
            //                 window.alert('Enter a valid Search keyword !!')
            //                 window.location.href = '" . BASEURL . "sellerDashboard';
            //             </script>
            //         ";
            //     }else if(!empty($_GET['searchSellerDash']) && $_GET['searchSellerDash'] != ''){
            //         $textToSearch = $_GET['searchSellerDash'];
            //         $getResult = $this->JobHandlerModel->getJobsSearch($textToSearch);
            //         if(!empty($getResult)){
            //             $data['SEARCH'] = mysqli_fetch_assoc($getResult);
            //             show($data);
            //             $this->view('search',$data);
            //         }else{
            //             echo "
            //             <script>
            //                 window.alert('Search not Found !!')
            //                 window.location.href = '" . BASEURL . "sellerDashboard';
            //             </script>
            //         ";
            //         }
            //     }

            // }else if($_SESSION['role'] === "Buyer"){
            //     // search functionality for Buyer Dashboard Header input field (It's in the buyerHeader component.)
            //     if(!empty($_GET['searchBuyerDash']) && $_GET['searchBuyerDash'] != ''){
            //         $textToSearch = $_GET['searchBuyerDash'];
            //         // $getResult = $this->GigHandlerModel->getGigsSearch($textToSearch);
            //         $getResult = $this->GigHandlerModel->getRecentGigWithRelevantSellerDetsForSearch($textToSearch);
            //         if(!empty($getResult)){
            //             $data['SEARCH'] = $getResult;
            //             // print_r(mysqli_fetch_assoc($data['SEARCH']));
            //             // show($data);
            //             $this->view('search',$data);
            //         }else{
            //             echo "
            //             <script>
            //                 window.alert('Search not Found !!')
            //                 window.location.href = '" . BASEURL . "buyerDashboard';
            //             </script>
            //         ";
            //         }
            //     }
            // }

            // $this->view('search', $data);

        }
    }

}