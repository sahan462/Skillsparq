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

            $this->view('search', $data);

        }
    }

    public function services()
    {
        if(isset($_GET['searchIn'])){
            $textToSearch = $_GET['searchIn'];

        }

        $data = '';

        $this->view('search',$data);
    }

    public function searchJobs()
    {
        if(isset($_GET[''])){

        }
    }
    
    public function searchGigs()
    {
        
    }

    public function buyerDashboardSearch()
    {
        if(!empty($_GET['buyerDashboardSearch'])){
            $textToSearch = $_GET['buyerDashboardSearch'];
            $getResult = $this->GigHandlerModel->getGigsSearch($textToSearch);
            if(isset($getResult)){
                $data['buyerGigSearch'] = $getResult;
                // show($data);
                $this->view('search',$data);
            }
        }
    }

    public function sellerDashboardSearch()
    {
        if(!empty($_GET['sellerDashboardSearch'])){
            $textToSearch = $_GET['sellerDashboardSearch'];
            $getResult = $this->JobHandlerModel->getJobsSearch($textToSearch);
            if(isset($getResult)){
                $data['sellerJobSearch'] = $getResult;
                // show($data);
                $this->view('search',$data);
            }
        }
    }
}



?>