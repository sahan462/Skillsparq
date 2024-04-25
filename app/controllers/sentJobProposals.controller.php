<?php

class SentJobProposals extends Controller
{
    private $JobHandlerModel;
    
    public function __construct()
    {
        $this->JobHandlerModel = $this->model('JobHandler');
    }

    public function index()
    {
        $data['var'] = "sent Job Proposals Page";
        $data['title'] = "SkillSparq";

        $sellerId = $_SESSION['userId'];
        $data['sellerId'] = $sellerId;
        $myPropWholeDetails = $this->JobHandlerModel->getBuyerDetailsProposalDetailsOfJob($sellerId);
        $data['sentPropDets'] = $myPropWholeDetails;
        $data['AcceptedCount'] = $this->JobHandlerModel->getPropCountByAcceptedStatus($sellerId);
        $data['PendingCount'] = $this->JobHandlerModel->getPropCountByPendingStatus($sellerId);
        $data['RejectedCount'] = $this->JobHandlerModel->getPropCountByRejectedStatus($sellerId);

        // show($data);
        $this->view('sentJobProposals', $data);
    }

    public function deleteSingleRejProp()
    {
        $proposalId = $_GET['propId'];
        // $status = $_GET['Status'];
        $isDeletedProp = $this->JobHandlerModel->deleteSingleRejectedProp($proposalId);
        if($isDeletedProp){
            echo "
            <script>
                alert('Deleted the Rejected Proposal !');
                window.location.href = '" . BASEURL . 'sentJobProposals' . "';
            </script>
            ";
        }
    }

    public function deleteAllRejProps()
    {
        $sellerId = $_GET['sellerId'];
        $status = "Rejected";
        $isDeletedProps = $this->JobHandlerModel->deleteAllRejectedProps($sellerId,$status);
        if($isDeletedProps){
            echo "
            <script>
                alert('Deleted All Rejected Proposals');
                window.location.href = '" . BASEURL . 'sentJobProposals' . "';
            </script>
            ";
        }
    }

}