<?php

class BuyerHelp extends Controller
{
    public function __construct(){
        $this->InquiryHandlerModel = $this->model('inquiryHandler');
    }

    public function index(){

        $data['var'] = "Buyer Help Page";
        $data['title'] = "SkillSparq";

        if(isset($_SESSION['userId']) && ($_SESSION['role'] == 'Buyer')){
            $inquiries = $this->InquiryHandlerModel->getInquiries($_SESSION['userId']);
            $data['inquiries'] = $inquiries;
            print_r($inquiries);
        }

        $this->view('buyerHelp', $data);
    }

}

?>