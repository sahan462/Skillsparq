<?php

class viewOrders extends Controller
{
    private $OrderHandlerModel;

    // private $ProfileHandlerModel;
    public function __construct()
    {
        $this->OrderHandlerModel = $this->model('OrderHandler');
    }

    public function index()
    {
        $allowedSortFields = ['order_id', 'order_state', 'order_type', 'order_created_date', 'buyer_id', 'seller_id'];
        $sortBy = isset($_GET['sort']) && in_array($_GET['sort'], $allowedSortFields) ? $_GET['sort'] : 'order_id';
        $sortDirection = isset($_GET['dir']) && strtolower($_GET['dir']) == 'desc' ? 'DESC' : 'ASC';

        // Fetch sorted feedbacks from the model
        $feedbacks = $this->OrderHandlerModel->getOrdersSorted($sortBy, $sortDirection);

        // Prepare data to be passed to the view
        $data = [
            'feedbacks' => $feedbacks,
            'sortBy' => $sortBy,
            'sortDirection' => $sortDirection == 'ASC' ? 'desc' : 'asc',
            'title' => 'SkillSparq - Feedbacks'
        ];

        $data['var'] = "viewOrders";
        $data['title'] = "SkillSparq";
        $this->view('viewOrders', $data);
    }
}
