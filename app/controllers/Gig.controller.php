<?php

class Gig extends Controller
{
    private $GigHandlerModel;

    public function __construct()
    {
        // $this->JobHandlerModel = $this->model('jobHandler');
        // $this->GigHandlerModel = $this->model('GigHandler');
    }

    public function index()
    {
        $data['errors'] = $this->initiate();
        $data['var'] = "AddGig";
        $data['title'] = "SkillSparq";
        $this->view('Gig', $data);
    }


    public function initiate()
    {
        // Initialize error array
        $errors = array();
        $errors["password"] = "";
        $errors["email"] = "";
        $errors["agreement"] = "";

        return $errors;
    }

    public function CreateGig()
    {
        $data['errors'] = $errors = $this->initiate();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
            $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_SPECIAL_CHARS);

            $BasicPkgName = filter_input(INPUT_POST, "BasicPkgName", FILTER_SANITIZE_SPECIAL_CHARS);
            $BasicOffDets = filter_input(INPUT_POST, "BasicOffDets", FILTER_SANITIZE_SPECIAL_CHARS);
            $BasicDelDays = filter_input(INPUT_POST, "BasicDelDays", FILTER_SANITIZE_SPECIAL_CHARS);
            $BasicRevNum = filter_input(INPUT_POST, "BasicRevNum", FILTER_SANITIZE_SPECIAL_CHARS);
            $BasicPrice = filter_input(INPUT_POST, "BasicPrice", FILTER_SANITIZE_NUMBER_INT);

            $StandardPkgName = filter_input(INPUT_POST, "StandardPkgName", FILTER_SANITIZE_SPECIAL_CHARS);
            $StandardOffDets = filter_input(INPUT_POST, "StandardOffDets", FILTER_SANITIZE_SPECIAL_CHARS);
            $StandardDelDays = filter_input(INPUT_POST, "StandardDelDays", FILTER_SANITIZE_SPECIAL_CHARS);
            $StandardRevNum = filter_input(INPUT_POST, "StandardRevNum", FILTER_SANITIZE_SPECIAL_CHARS);
            $StandardPrice = filter_input(INPUT_POST, "StandardPrice", FILTER_SANITIZE_NUMBER_INT);

            $PremiumPkgName = filter_input(INPUT_POST, "PremiumPkgName", FILTER_SANITIZE_SPECIAL_CHARS);
            $PremiumOffDets = filter_input(INPUT_POST, "PremiumOffDets", FILTER_SANITIZE_SPECIAL_CHARS);
            $PremiumDelDays = filter_input(INPUT_POST, "PremiumDelDays", FILTER_SANITIZE_SPECIAL_CHARS);
            $PremiumRevNum = filter_input(INPUT_POST, "PremiumRevNum", FILTER_SANITIZE_SPECIAL_CHARS);
            $PremiumPrice = filter_input(INPUT_POST, "PremiumPrice", FILTER_SANITIZE_NUMBER_INT);

            $errors = false;
            if (empty($title) || empty($category) || empty($BasicPkgName) || empty($BasicOffDets) || empty($BasicDelDays) || empty($BasicRevNum) || empty($BasicPrice) || empty($StandardPkgName) || empty($StandardOffDets) || empty($StandardDelDays) || empty($StandardRevNum) || empty($StandardPrice) || empty($PremiumPkgName) || empty($PremiumOffDets) || empty($PremiumDelDays) || empty($PremiumRevNum) || empty($PremiumPrice)) {
                echo "<p class='calc-error'>Fill in all Fields!</p>";
                $errors = true;
            }

            if (!is_numeric($BasicPrice) || !is_numeric($StandardPrice) || !is_numeric($PremiumPrice)) {
                echo "<p class='calc-error'>Fill with numerical values!</p>";
                $errors = true;
            }

            // include "./app/models/GigHandler.model.php";
        }

        $numberOfErrors = 0;
        foreach ($errors as $key => $value) {
            if (!empty($value)) {
                $numberOfErrors++;
            }
        }
    }




    public function getGig()
    {
    }

    // public function publishGig()
    // {

    //     if (isset($_GET['submit'])) {

    //         $jobId = 123;
    //         $title = $_GET['title'];
    //         $description = $_GET['description'];
    //         $file = $_GET['fileToUpload'];
    //         $category = $_GET['category'];
    //         $amount = $_GET['amount'];
    //         $deadline = $_GET['deadline'];
    //         if (isset($_GET['flexible-amount'])) {
    //             $flexible_amount = 1;
    //         } else {
    //             $flexible_amount = 0;
    //         };
    //         $currentDateTime = date('Y-m-d H:i:s');
    //         $clientId = "sahan";

    //         // $this->JobHandlerModel->addNewJob($jobId, $title, $description, $file,  $category, $amount, $deadline, $flexible_amount, $currentDateTime, $clientId);
    //     }
    // }

    public function updateGig()
    {
    }

    public function deleteGig()
    {
    }
}
