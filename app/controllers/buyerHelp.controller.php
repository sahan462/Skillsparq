<?php

class BuyerHelp extends Controller
{
    private $profileHandlerModel;

    public function __construct()
    {
        $this->InquiryHandlerModel = $this->model('inquiryHandler');

        $this->profileHandlerModel = $this->model('profileHandler');
    }

    public function index()
    {

        $data['var'] = "Buyer Help Page";
        $data['title'] = "SkillSparq";

        if (isset($_SESSION['userId']) && ($_SESSION['role'] == 'Buyer')) {
            $inquiries = $this->InquiryHandlerModel->getInquiries1($_SESSION['userId']);
            $data['inquiries'] = $inquiries;
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['inquiry_id'])) {
                $inquiry_id = $_POST['inquiry_id'];
                $this->InquiryHandlerModel->dltComplaint($inquiry_id);
                $this->InquiryHandlerModel->dltRequest($inquiry_id);
                $this->InquiryHandlerModel->dltInquiry($inquiry_id);
                header("Location: buyerHelp"); // Ensure this is the correct URL
                exit;
            }
        }

        $this->view('buyerHelp', $data);
    }
}
