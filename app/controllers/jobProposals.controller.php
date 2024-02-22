<?php

class JobProposals extends Controller
{

    public function index()
    {
        // logic to view all job proposals.
        $data['var'] = "JobProposal Page";
        $data['title'] = "SkillSparq";
        
        $this->view('jobProposals', $data);
    }

    public function addJobProposal()
    {
        // logic to add a job proposal to table
    }

    public function viewSingleJobProposal()
    {
        // viewing a single job proposal.
    }

}