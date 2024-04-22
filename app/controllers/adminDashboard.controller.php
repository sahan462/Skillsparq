<?php

class AdminDashboard extends Controller
{
    private $inquiryHandlerModel;
    private $JobHandlerModel;
    private $GigHandlerModel;
    private $userHandlerModel;
    private $profileHandlerModel;
    private $OrderHandlerModel;
    private $paymentHandlerModel;

    public function __construct()
    {
        $this->JobHandlerModel = $this->model('jobHandler');
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
        $this->GigHandlerModel = $this->model('GigHandler');
        $this->userHandlerModel = $this->model('userHandler');
        $this->profileHandlerModel = $this->model('profileHandler');
        $this->OrderHandlerModel = $this->model('OrderHandler');
        $this->paymentHandlerModel = $this->model('paymentHandler');
    }

    public function index()
    {

        $data['var'] = "admin Dashboard";
        $data['title'] = "SkillSparq";

        $recentGigs = $this->GigHandlerModel->getRecentGigs();
        $data['recentGigs'] = $recentGigs;
        $users = $this->profileHandlerModel->getAllProfiles();


        $count1 = 0;
        $count2 = 0;
        $countCurrentMonth = 0;
        $countPreviousMonth = 0;
        $countCurrentMonth1 = 0;
        $monthDataUsers = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $countCurrentMonth2 = 0;
        $currentMonth = date('m');
        $previousMonth = ($currentMonth == 1) ? 12 : $currentMonth - 1;
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;

        foreach ($users as $row) {
            $date = new DateTime($row['joined_date']);
            $inquiryMonth = $date->format('m');
            $inquiryYear = $date->format('Y');

            if (($inquiryYear == $previousYear && $inquiryMonth > $currentMonth) || $inquiryYear == $currentYear && $inquiryMonth <= $currentMonth) {
                $monthDataUsers[$inquiryMonth - 1]++;
            }
            if ($inquiryMonth == $currentMonth && $inquiryYear == $currentYear) {
                $countCurrentMonth++;
            }
        }

        $currentMonthIndex = date('n') - 1;

        $monthlyUsers = array_merge(
            array_slice($monthDataUsers, $currentMonthIndex + 1), // Get the months from current month to end
            array_slice($monthDataUsers, 0, $currentMonthIndex + 1) // Get the months from beginning to current month
        );
        array_reverse($monthlyUsers);

        $data['monthlyUsers'] = $monthlyUsers;







        $totalOrders = $this->OrderHandlerModel->totalOrders();
        $data['totalOrders'] = $totalOrders;







        $order = $this->OrderHandlerModel->orderStateCurrentMonth();
        $data['order'] = $order;
        $orderprev = $this->OrderHandlerModel->orderStatePreviousMonth();
        $data['orderprev'] = $orderprev;
        $userType = $this->userHandlerModel->getAllUsers();
        $data['userType'] = $userType;
        $paymentStats = $this->paymentHandlerModel->getPaymentStats();
        $data['paymentStats'] = $paymentStats;
        $totalPayments = $this->paymentHandlerModel->totalPayments();
        $data['totalPayments'] = $totalPayments;
        $totalSales = $this->paymentHandlerModel->totalSales();
        $data['totalSales'] = $totalSales;

        $this->view('adminDashboard', $data);
    }
}
