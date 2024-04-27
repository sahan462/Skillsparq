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

            if(!isset($_GET[''])){
                echo "
                    <script>
                        window.alert('Search not Found !!')
                    </script>
                ";
            }
            
            if(isset($_GET['searchIn']) && $_GET['searchIn'] != ''){
                $textToSearch = $_GET['searchIn'];

            }

            // search Jobs
            // if(isset($_GET[''])){

            // }

            // // search Gigs
            // if(isset($_GET[''])){

            // }

            if(!empty($_GET['searchBuyerDash']) && $_GET['searchBuyerDash'] != ''){
                $textToSearch = $_GET['searchBuyerDash'];
                $getResult = $this->GigHandlerModel->getGigsSearch($textToSearch);
                if(isset($getResult)){
                    $data['SEARCH'] = $getResult;
                    // show($data);
                    $this->view('search',$data);
                }
            }

            if(!empty($_GET['searchSellerDash']) && $_GET['searchSellerDash'] != ''){
                $textToSearch = $_GET['searchSellerDash'];
                $getResult = $this->JobHandlerModel->getJobsSearch($textToSearch);
                if(isset($getResult)){
                    $data['SEARCH'] = $getResult;
                    // show($data);
                    $this->view('search',$data);
                }
            }

            
            
            $this->view('search', $data);

        }
    }
}



?>