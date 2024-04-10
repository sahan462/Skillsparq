<?php

class viewComplaints extends Controller
{

    private $inquiryHandlerModel;
    public function __construct()
    {

        $this->inquiryHandlerModel = $this->model('inquiryHandler');
    }

    public function index()
    {

        $inquiry_id = isset($_GET['inquiry_id']) ? $_GET['inquiry_id'] : null;

        $data['var'] = "viewComplaints";
        $data['title'] = "SkillSparq";
        $data['inquiryId'] = $inquiry_id;
        $viewComplaint = $this->inquiryHandlerModel->viewComplaints($inquiry_id);
        $data['viewComplaint'] = $viewComplaint;
        $this->view('viewComplaints', $data);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userIdToBlacklist = $_POST['user_id_to_blacklist'];
            $blacklistUntilDays = $_POST['blacklistUntil'];
            $this->inquiryHandlerModel->blackListBuyer($userIdToBlacklist);
        }
    }
}
