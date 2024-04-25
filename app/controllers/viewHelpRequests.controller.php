<?php

class viewHelpRequests extends Controller
{
    private $profileHandlerModel;
    private $inquiryHandlerModel;
    public function __construct()
    {
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
        $this->profileHandlerModel = $this->model('profileHandler');
    }

    public function index()
    {

        $data['var'] = "viewHelpRequests";
        $data['title'] = "SkillSparq";
        $recentRequests = $this->inquiryHandlerModel->getHelpRequests();
        $data['recentRequests'] = $recentRequests;
        $totalInquiries = $this->inquiryHandlerModel->totalInquiries();
        $data['totalInquiries'] = $totalInquiries;
        $getUnsolvedRequests = $this->inquiryHandlerModel->getUnsolvedRequests();
        $data['getUnsolvedRequests'] = $getUnsolvedRequests;



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['inquiry_id'])) {
                // Delete the feedback
                $inquiry_id = $_POST['inquiry_id'];
                $this->inquiryHandlerModel->deleteFromRequests($inquiry_id);
                $this->inquiryHandlerModel->deleteFromInquiries($inquiry_id);
                // Redirect to the same page to refresh the data and avoid resubmitting the form
                header("Location: viewHelpRequests");
                exit;
            }
        }

        $this->view('viewHelpRequests', $data);
    }
}
