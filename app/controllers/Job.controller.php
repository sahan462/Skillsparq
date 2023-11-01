<?php

class Job extends Controller
{

    public function index(){


    }

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
    }

    public function getJob(){
        
    }

    public function publishJob(){

        if (isset($_GET['submit'])) {

            show($_GET);

            $title = $_GET['title'];
            $description = $_GET['description'];
            $file = $_GET['fileToUpload'];
            $category = $_GET['category'];
            $amount = $_GET['amount'];
            $deadline = $_GET['deadline'];
            if(isset($_GET['flexible-amount'])){$flexible_amount = 1;}else{$flexible_amount = 0;};
            $currentDateTime = date('Y-m-d H:i:s'); 
            $clientId = $_SESSION['userId'];

            $this->JobHandlerModel->addNewJob($title, $description, $file,  $category, $amount, $deadline, $flexible_amount, $currentDateTime, $clientId);
        }
    }

    public function updateJob(){
    }

    public function deleteJob(){
        
    }




}