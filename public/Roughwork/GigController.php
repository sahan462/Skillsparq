<?php


class GigController extends Controller
{
    protected $modelHander;

    public function __construct()
    {
        $this->modelHander = $this->model('GigHandler');
    }

    public function index()
    {
        // get all gigs: list view
    }

    public function show($id)
    {
        // retrieve one gig
    }

    public function store()
    {
        // store a gig
    }

    public function update($id)
    {
        // update the gig
    }
}