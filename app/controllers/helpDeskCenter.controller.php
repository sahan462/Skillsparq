<?php

class HelpDeskCenter extends Controller
{
    private $inquiryHandlerModel;
    private $profileHandlerModel;
    public function __construct()
    {
        $this->inquiryHandlerModel = $this->model('inquiryHandler');
        $this->profileHandlerModel = $this->model('profileHandler');
    }

    public function index()
    {
        if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {

            header("location: loginUser");
            exit;
        } else {

            $data['var'] = "HelpDeskCenter";
            $data['title'] = "SkillSparq";
            $recentUsers = $this->inquiryHandlerModel->getRecentUsers();
            $data['recentUsers'] = $recentUsers;

            $recentInquiries = $this->inquiryHandlerModel->getInquiries();
            $data['recentInquiries'] = $recentInquiries;

            $recentRequests = $this->inquiryHandlerModel->getHelpRequests();
            $data['recentRequests'] = $recentRequests;

            $recentComplaints = $this->inquiryHandlerModel->getComplaints();
            $data['recentComplaints'] = $recentComplaints;

            $count1 = 0;
            $count2 = 0;
            $countCurrentMonth = 0;
            $countPreviousMonth = 0;
            $countCurrentMonth1 = 0;
            $monthData = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            $countCurrentMonth2 = 0;
            $currentMonth = date('m');
            $previousMonth = ($currentMonth == 1) ? 12 : $currentMonth - 1;
            $currentYear = date('Y');
            $previousYear = $currentYear - 1;

            foreach ($recentInquiries as $row) {
                $date = new DateTime($row['created_at']);
                $inquiryMonth = $date->format('m');
                $inquiryYear = $date->format('Y');

                if (($inquiryYear == $previousYear && $inquiryMonth > $currentMonth) || $inquiryYear == $currentYear && $inquiryMonth <= $currentMonth) {
                    $monthData[$inquiryMonth - 1]++;
                }
                if ($inquiryMonth == $currentMonth && $inquiryYear == $currentYear) {
                    $countCurrentMonth++;
                }
            }
            $monthDataRequests = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($recentRequests as $row) {
                $date = new DateTime($row['created_at']);
                $inquiryMonth = $date->format('m');
                $inquiryYear = $date->format('Y');

                if (($inquiryYear == $previousYear && $inquiryMonth > $currentMonth) || $inquiryYear == $currentYear && $inquiryMonth <= $currentMonth) {
                    $monthDataRequests[$inquiryMonth - 1]++;
                }
                if ($inquiryMonth == $currentMonth && $inquiryYear == $currentYear) {
                    $countCurrentMonth1++;
                }
            }

            $monthDataComplaints = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
            foreach ($recentComplaints as $row) {
                $date = new DateTime($row['created_at']);
                $inquiryMonth = $date->format('m');
                $inquiryYear = $date->format('Y');
                if ($inquiryMonth == $currentMonth && $inquiryYear == $currentYear) {
                    $countCurrentMonth2++;
                }
                if (($inquiryYear == $previousYear && $inquiryMonth > $currentMonth) || $inquiryYear == $currentYear && $inquiryMonth <= $currentMonth) {
                    $monthDataComplaints[$inquiryMonth - 1]++;
                }
            }


            $solved = 0;
            $unsolved = 0;
            foreach ($recentRequests as $row) {
                if ($row['inquiry_status'] == "solved") {
                    $solved++;
                } else {
                    $unsolved++;
                }
            }
            $solved1 = 0;
            $unsolved1 = 0;
            foreach ($recentComplaints as $row) {
                if ($row['inquiry_status'] == "solved") {
                    $solved1++;
                } else {
                    $unsolved1++;
                }
            }
            $solved2 = 0;
            $unsolved2 = 0;
            foreach ($recentInquiries as $row) {
                if ($row['inquiry_status'] == "solved") {
                    $solved2++;
                } else {
                    $unsolved2++;
                }
            }
            $inquiriesCompleted = ($unsolved2 + $solved2 == 0) ? 0 : ($solved2 / ($unsolved2 + $solved2)) * 100;
            $data['inquiriesCompleted'] = $inquiriesCompleted;

            $complaintsCompleted = ($unsolved1 + $solved1 == 0) ? 0 : ($solved1 / ($unsolved1 + $solved1)) * 100;
            $data['complaintsCompleted'] = $complaintsCompleted;

            $requestsCompleted = ($unsolved + $solved == 0) ? 0 : ($solved / ($unsolved + $solved)) * 100;
            $data['requestsCompleted'] = $requestsCompleted;


            $currentMonthIndex = date('n') - 1; // Subtract 1 to convert 1-based index to 0-based index

            // Create an array of months
            $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            // Rearrange the months array
            $monthsSortedRequests = array_merge(
                array_slice($monthDataRequests, $currentMonthIndex + 1), // Get the months from current month to end
                array_slice($monthDataRequests, 0, $currentMonthIndex + 1) // Get the months from beginning to current month
            );

            $monthsSortedComplaints = array_merge(
                array_slice($monthDataComplaints, $currentMonthIndex + 1), // Get the months from current month to end
                array_slice($monthDataComplaints, 0, $currentMonthIndex + 1) // Get the months from beginning to current month
            );

            array_reverse($monthsSortedRequests);
            array_reverse($monthsSortedComplaints);

            $data['countCurrentMonth'] = $countCurrentMonth;
            $data['countCurrentMonth1'] = $countCurrentMonth1;

            $data['countCurrentMonth2'] = $countCurrentMonth2;
            $data['monthsSortedRequests'] = $monthsSortedRequests;
            $data['monthsSortedComplaints'] = $monthsSortedComplaints;
            $data['solved'] = $solved;
            $data['unsolved'] = $unsolved;
            $data['solved1'] = $solved1;
            $data['unsolved1'] = $unsolved1;




            $this->view('helpDeskCenter', $data);
        }
    }
}
