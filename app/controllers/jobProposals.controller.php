<?php

class JobProposals extends Controller
{
    private $JobHandlerModel;
    private $OrderHandlerModel;
    private $OrderController;
    
    public function __construct()
    {
        $this->JobHandlerModel = $this->model('JobHandler');
        $this->OrderHandlerModel = $this->model('OrderHandler');
        $this->OrderController = $this->controller('Order');
    }

    public function index()
    {
        $data['var'] = "JobProposal Page";
        $data['title'] = "SkillSparq";
        
        if($_SESSION['role'] === "Seller"){

            // logic to add a job proposal to table
            $jobMode = $_POST['mode'];
            $sellerId = $_POST['sellerId'];
            $buyerId = $_POST['buyerId'];
            $jobId = $_POST['jobId'];
            $description = $_POST['descriptionJobProposal'];

            // directory where attachment resides.
            $targetDir = "../public/assests/images/jobProposalAttachments/";

            $attachmentFile = basename($_FILES["attachment"]["name"]);
            $randomNumber = random_int(10000, 99999); // Generate a random number between 10000 and 99999
            $extension = pathinfo($attachmentFile, PATHINFO_EXTENSION);
            $attachmentFile = pathinfo($attachmentFile, PATHINFO_FILENAME);
            $uniqueAttachmentFileName = uniqid($attachmentFile, true) . '_' . time() . '_' .$randomNumber.".".$extension;

            $targetFilePath = $targetDir . $uniqueAttachmentFileName; 
            // $isMoved = move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath); // uncomment this line in order to save the file in the server.
            
            if($jobMode === "Auction"){
                $bidAmnt = $_POST['biddingAmnt'];
                // $givenBidValue = $_POST['givenBid'];
                $proposalId = $this->JobHandlerModel->createProposal($description,$bidAmnt,$uniqueAttachmentFileName,$jobId,$buyerId, $sellerId);
            }else{
                $proposalId = $this->JobHandlerModel->createProposal($description,NULL,$uniqueAttachmentFileName,$jobId,$buyerId, $sellerId);
            }
            $data['proposalId'] = $proposalId;
            echo "
                <script>
                    window.location.href = '" . BASEURL . "sellerDashboard';
                </script>
            ";

        }else if($_SESSION['role'] === "Buyer"){
            $data['jobId'] = $_SESSION['jobId'];
            $data['buyerId'] = $_SESSION['userId'];
            // $data['proposalDets'] = $this->JobHandlerModel->getJobProposals($data["jobId"],$data['buyerId']);
            $data['jobDets'] = $this->JobHandlerModel->getJob($data['jobId']);
            $data['proposal&SellerDets'] = $this->JobHandlerModel->getSellerDetailsOfJobProposals($data['jobId']);
            $this->view('jobProposals',$data);
            // show($data);
        }
    }

    // viewing a single job proposal.
    public function viewSingleJobProposal($proposalId)
    {
        $proposalDets = $this->JobHandlerModel->getSingleJobProposal($proposalId);
        $proposalInfo = mysqli_fetch_assoc($proposalDets);
        return $proposalInfo;
    }

    // rejecting a single job proposal.
    public function rejectJobProposal()
    {
        $proposalId = $_GET['proposalId'];
        $orderStatus = $_GET['Status'];

        if(isset($proposalId) && $orderStatus === "pending"){
            $orderStatus = "Rejected";
            $result = $this->JobHandlerModel->changeProposalStatus($orderStatus,$proposalId);
            if($result){
                echo "
                 <script>
                    window.alert('Order Rejected');
                    window.location.href = '" . BASEURL . "jobproposals';
                 </script>
                ";
            }
        }
    }

    public function acceptJobProposal()
    {
        $jobProposalId = $_GET['proposalId'];
        $orderStatus = $_GET['Status'];
        $jobId = $_GET['jobId'];
        $sellerId = $_GET['sellerId'];
        $buyerId = $_GET['buyerId'];

        date_default_timezone_set('UTC');
        $orderCreatedAt = date('Y-m-d H:i:s');

        if(empty($jobProposalId) || empty($orderStatus) || empty($jobId) || empty($sellerId) || empty($buyerId)){
            echo "
            <script>
                window.alert('An Error Occured !');
            </script>
            ";
        }else{
            if($orderStatus === "pending"){
                $orderStatus = "Accepted";
                $result = $this->JobHandlerModel->changeProposalStatus($orderStatus,$jobProposalId);
                if($result){
                    echo "
                    <script>
                        window.alert('Job Order Request sent to Seller #{$sellerId} to Accept');
                    </script>
                    ";
                    $orderType = "job";
                    $orderState = "Requested";
                    $isOrderSend = $this->OrderController->createJobOrderRecord($orderState,$orderType,$orderCreatedAt,$buyerId,$sellerId);
                    
                    if($isOrderSend){
                        $orderId = $isOrderSend;
                        $isIdCreated = $this->JobHandlerModel->createJobOrdersTableRecord($orderId,$jobId,$jobProposalId);
                        // if($isIdCreated){
                            echo "
                                <script>
                                    window.alert('Congratulations !!! You've Successfully placed a Job Order ');
                                    window.location.href = '" . BASEURL . "manageOrders';
                                </script>
                            ";
                        // }
                    }else{
                        echo "
                        <script>
                            window.alert('Error Creating the Order');
                            window.location.href = '" . BASEURL . "jobproposals';
                        </script>
                        ";
                    }
                }
            }else{
                echo "
                    <script>
                        window.alert('Proposal Already Accepted');
                        window.location.href = '" . BASEURL . "jobproposals';
                    </script>
                ";
            }
        }
    }
}