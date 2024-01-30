<?php

class HelpCenter extends Controller
{

    public function __construct(){

        $this->inquiryHandlerModel = $this->model('InquiryHandler');

    }

    public function index(){

        $data['var'] = "Help Center";
        $data['title'] = "SkillSparq";
        $this->view('helpCenter', $data);

    }

    public function createInquiry(){

        $requestSubject = $_POST['requestSubject'];
        $requestDescription = $_POST['requestDescription'];
        $userId = $_POST['userId'];
        $userName = $_POST['userName'];
        $role = $_POST['role'];
        $inquiryType = $_POST['inquiryType'];

        $targetDir = "../public/assests/zipFiles/inquiryFiles/";
        $inquiryAttachementName = basename($_FILES["inquiryAttachment"]["name"]); 
        $uniqueInquiryAttachementName = uniqid($inquiryAttachementName, true) . '_' . time() . '_' . $userName . '_' . $inquiryType . '.zip';
        $targetFilePath = $targetDir . $uniqueInquiryAttachementName ;

        $currentDateTime = date('Y-m-d H:i:s');


        $upload = move_uploaded_file($_FILES["inquiryAttachment"]["tmp_name"], $targetFilePath);
        if($upload){

            $inquiry = $this->inquiryHandlerModel->createInquiry($requestSubject, $requestDescription, $uniqueInquiryAttachementName, $currentDateTime,$userId, $inquiryType);
            if($inquiry){

                echo "
                <script>
                    alert('Help Request is Sent Successfully');
                    window.location.href = '" . BASEURL . 'helpCenter' . "';
                </script>";
            }

        }else{

            echo "
            <script>
                alert('Error Uploading Profile Picture');
                window.location.href = '" . BASEURL . 'helpCenter' . "';
            </script>";

        }
    }



}

?>