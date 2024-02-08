<?php

class Footer extends Controller
{
    // first section 
    public function about()
    {
        $data['var'] = "About";
        $data['title'] = "SkillSparq";
        $this->view('footerViews/about', $data);
    }

    public function customers()
    {
        $data['var'] = "About";
        $data['title'] = "SkillSparq";
        $this->view('customers', $data);
    }

    public function services()
    {
        $data['var'] = "About";
        $data['title'] = "SkillSparq";
        $this->view('services', $data);
    }

    public function collections()
    {
        $data['var'] = "About";
        $data['title'] = "SkillSparq";
        $this->view('collections', $data);
    }
    
    // second section
    public function education()
    {
        $data['var'] = "About";
        $data['title'] = "SkillSparq";
        $this->view('education', $data);
    }

    // third section
    public function agreement()
    {
        $data['var'] = "About";
        $data['title'] = "SkillSparq";
        $this->view('agreement', $data);
    }

    public function policy()
    {
        $data['var'] = "About";
        $data['title'] = "SkillSparq";
        $this->view('policy', $data);
    }

    public function security()
    {
        $data['var'] = "About";
        $data['title'] = "SkillSparq";
        $this->view('security', $data);
    }

}

?>