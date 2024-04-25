<?php
class ratingCSA extends Controller
{
    private $profileHandlerModel;

    public function __construct()
    {
        $this->profileHandlerModel = $this->model('profileHandler');
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['feedback_id'])) {
                // Delete the feedback
                $feedback_id = $_POST['feedback_id'];
                $this->profileHandlerModel->deleteFeedback($feedback_id);
                // Redirect to the same page to refresh the data and avoid resubmitting the form
                header("Location: ratingCSA");
                exit;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['inquiry_id'])) {
                $inquiry_id = $_POST['inquiry_id'];
                $this->profileHandlerModel->deleteInquiryAndHelpRequest($inquiry_id);
                header("Location: viewHelpRequests"); // Ensure this is the correct URL
                exit;
            }
        }


        // Retrieve sort field and direction from query parameters
        $allowedSortFields = ['feedback_id', 'sender_user_id', 'receiver_user_id', 'feedback_text', 'rating', 'feedback_date'];
        $sortBy = isset($_GET['sort']) && in_array($_GET['sort'], $allowedSortFields) ? $_GET['sort'] : 'feedback_id';
        $sortDirection = isset($_GET['dir']) && strtolower($_GET['dir']) == 'desc' ? 'DESC' : 'ASC';

        // Fetch sorted feedbacks from the model
        $feedbacks = $this->profileHandlerModel->getAllFeedbacks($sortBy, $sortDirection);

        // Prepare data to be passed to the view
        $data = [
            'feedbacks' => $feedbacks,
            'sortBy' => $sortBy,
            'sortDirection' => $sortDirection == 'ASC' ? 'desc' : 'asc',
            'title' => 'SkillSparq - Feedbacks'
        ];

        // Load the view and pass the data array
        $this->view('ratingCSA', $data);
    }
}
