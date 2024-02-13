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
        $viewComplaint = $this->inquiryHandlerModel->viewComplaints();
        $data['viewComplaint'] = $viewComplaint;

        $this->view('viewComplaints', $data);
    }
}
