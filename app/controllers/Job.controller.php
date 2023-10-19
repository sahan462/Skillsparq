<?php

class Job extends Controller
{

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('JobHandler');
    }

    public function index(){

        $data['var'] = "AddJob";
        $data['title'] = "SkillSparq";
        $this->view('Job', $data);

    }

    public function getJob(){
        
    }

    public function publishJob(){

        if (isset($_GET['submit'])) {

            $jobId = 123;
            $title = $_GET['title'];
            $description = $_GET['description'];
            $file = $_GET['fileToUpload'];
            $category = $_GET['category'];
            $amount = $_GET['amount'];
            $deadline = $_GET['deadline'];
            if(isset($_GET['flexible-amount'])){$flexible_amount = 1;}else{$flexible_amount = 0;};
            $currentDateTime = date('Y-m-d H:i:s'); 
            $clientId = "sahan";

            $this->JobHandlerModel->addNewJob($jobId, $title, $description, $file,  $category, $amount, $deadline, $flexible_amount, $currentDateTime, $clientId);
        }
    }

    public function updateJob(){
    }

    public function deleteJob(){
        
    }




}

?>