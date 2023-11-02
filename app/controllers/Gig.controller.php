<?php

class Gig extends Controller
{
    public function __construct()
    {
        // $this->JobHandlerModel = $this->model('jobHandler');
        $this->GigHandlerModel = $this->model('GigHandler');
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
            show($_POST);
            $title = $_POST['title'];
            $category = $_POST['category'];
            $currentDateTime = date('Y-m-d H:i:s');

            $BasicPkgName = $_POST['BasicPkgName'];
            $BasicOffDets = $_POST['BasicOffDets'];
            $BasicDelDays = $_POST['BasicDelDays'];
            $BasicRevNum = $_POST['BasicRevNum'];
            $BasicPrice = $_POST['BasicPrice'];

            $StandardPkgName = $_POST['StandardPkgName'];
            $StandardOffDets = $_POST['StandardOffDets'];
            $StandardDelDays = $_POST['StandardDelDays'];
            $StandardRevNum = $_POST['StandardRevNum'];
            $StandardPrice = $_POST['StandardPrice'];

            $PremiumPkgName = $_POST['PremiumPkgName'];
            $PremiumOffDets = $_POST['PremiumOffDets'];
            $PremiumDelDays = $_POST['PremiumDelDays'];
            $PremiumRevNum = $_POST['PremiumRevNum'];
            $PremiumPrice = $_POST['PremiumPrice'];
            $sellerId = $_SESSION['userId'];

            $errors = false;
            if (empty($title) || empty($category) || empty($BasicPkgName) || empty($BasicOffDets) || empty($BasicDelDays) || empty($BasicRevNum) || empty($BasicPrice) || empty($StandardPkgName) || empty($StandardOffDets) || empty($StandardDelDays) || empty($StandardRevNum) || empty($StandardPrice) || empty($PremiumPkgName) || empty($PremiumOffDets) || empty($PremiumDelDays) || empty($PremiumRevNum) || empty($PremiumPrice)) {
                echo "<p class='calc-error'>Fill in all Fields!</p>";
                $errors = true;
            }

            if (!is_numeric($BasicPrice) || !is_numeric($StandardPrice) || !is_numeric($PremiumPrice)) {
                echo "<p class='calc-error'>Fill with numerical values!</p>";
                $errors = true;
            }
            $Gig = $this->GigHandlerModel->addNewGig($title, $category, $BasicPkgName, $BasicOffDets, $BasicDelDays, $BasicRevNum, $BasicPrice, $StandardPkgName, $StandardOffDets, $StandardDelDays, $StandardRevNum, $StandardPrice, $PremiumPkgName, $PremiumOffDets, $PremiumDelDays, $PremiumRevNum, $PremiumPrice, $currentDateTime, $sellerId);

            if ($Gig) {

                echo "
                <script>
                    alert('Gig Created Successfully');
                    window.location.href = '" . BASEURL . "buyerProfile';
                </script>
            ";
            } else {
                echo "<script>alert('Error');</script>";
            }
        }

        // $numberOfErrors = 0;
        // foreach ($errors as $key => $value) {
        //     if (!empty($value)) {
        //         $numberOfErrors++;
        //     }
        // }
    }

    public function viewGig()
    {
    }
    public function updateGig()
    {
        //
    }

    public function deleteGig()
    {
    }
}
