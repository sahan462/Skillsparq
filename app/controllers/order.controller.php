<?php

class Order extends Controller
{
    private $OrderHandlerModel;
    private $ChatHandlerModel;
    private $ProfileHandlerModel;

    public function __construct()
    {
        $this->OrderHandlerModel = $this->model('orderHandler');
        $this->ChatHandlerModel = $this->model('chatHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
    }

    public function calculateDeadline($createdDate, $number, $unit) {
        // Get the current date
        $createdDate = new DateTime($createdDate);
    
        // Initialize the deadline
        $deadline = clone $createdDate;
    
        // Add the appropriate time interval based on the unit
        switch ($unit) {
            case 'Days':
                $deadline->modify("+$number days");
                break;
            case 'Weeks':
                $deadline->modify("+$number weeks");
                break;
            case 'Months':
                $deadline->modify("+$number months");
                break;
            case 'Years':
                $deadline->modify("+$number years");
                break;
            default:
                // Handle invalid unit (optional)
                break;
        }
    
        return $deadline->format('Y-m-d');
    }


    public function index()
    {
        if((!isset($_SESSION["phoneNumber"]) && !isset($_SESSION["password"])) || (!isset($_SESSION["email"]) && !isset($_SESSION["password"]))){

            header("location: home");

        }else{

            $data['var'] = "Order Page";
            $data['title'] = "SkillSparq";

            $orderId = $_GET['orderId'];
            $orderType = $_GET['orderType'];
            $buyerId = $_GET['buyerId'];
            $sellerid = $_GET['sellerId'];
            $userRole = $_SESSION['role'];

            // get order, buyer and seller information
            $data = $this->OrderHandlerModel->getOrderDetails($orderId, $orderType, $buyerId, $sellerid, $userRole);
            
            if($orderType == 'milestone'){

                $incompleteMilestoneCount = $this->OrderHandlerModel->getIncompleteMilestoneCount($orderId);
                if($incompleteMilestoneCount['incomplete_milestone_count'] == 0){
                    $currentMilestone = [
                        'amount_of_delivery_time' => 0,
                        'time_category' => 'Days'
                    ];
                    $data['$currentMilestone'] = $currentMilestone;
                }else{
                    $currentMilestone = $this->OrderHandlerModel->getCurrentMilestone($orderId);
                    $data['currentMilestone'] = $currentMilestone->fetch_assoc();
                }

            }

            $order = $data['order'];
            $chatId = $order['chat_id'];

            //retrieve the chat from the database
            $data['chat'] = $this->ChatHandlerModel->readAllMessages($chatId);

            $this->view('order', $data);
    
        }
        
    }

    //create a package order
    public function createPackageOrder() 
    {
        try{

            $orderState = "Requested";
            $requestDescription = $_POST['requestDescription'];
            $gigId = $_POST['gigId'];
            $sellerId = $_POST['sellerId'];
            $orderType = $_POST['orderType'];
            $buyerId = $_POST['buyerId'];  
            $packageId = $_POST['packageId'];
            $currentDateTime = date('Y-m-d H:i:s');
            $attachment = $_FILES['attachments'];
            $attachmentName = basename($attachment["name"]);

            //generate deadline 
            $numberAndUnit = $this->OrderHandlerModel->getPackageDetails($packageId);
            if($numberAndUnit){
                $deadline = $this->calculateDeadline($currentDateTime, $numberAndUnit['no_of_delivery_days'], $numberAndUnit['time_period']);
            }else{
                $deadline = "";
            }
            print_r($deadline);
            // Create order
            $orderId = $this->OrderHandlerModel->createPackageOrder($orderState, $orderType, $currentDateTime, $buyerId, $sellerId, $requestDescription, $attachmentName, $gigId, $packageId, $deadline);

            //get chat
            if($orderId){
                $chatId = $this->ChatHandlerModel->createNewChat('order', $orderId);
            }else{
                $this->view("505");
            }

            //create directory for the new order
            $orderFileName = "Order" . "_" . $orderId;
            $targetDir = "../public/assests/zipFiles/orderFiles/$orderFileName/";
            mkdir($targetDir, 0777, true);

            $upload = 0;
            if($attachmentName != ""){
                $targetFilePath = $targetDir . $attachmentName;
                $upload = move_uploaded_file($attachment["tmp_name"], $targetFilePath);
            }else{
                $attachmentName = "";
            }

            //handle success of failure
            if($upload || $chatId){
                if(isset($_SESSION['sellerEmail'])){
    
                    //notify the seller using an email
                    $sellerEmail = $this->getSession('sellerEmail');
                    
                    $newOrderRequestEmail = `
                    
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>New Order Request</title>
                    <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 20px auto;
                        padding: 20px;
                        background-color: #fff;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        color: #333;
                    }
                    p {
                        color: #666;
                        line-height: 1.6;
                    }
                    .button {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #007bff;
                        color: #fff;
                        text-decoration: none;
                        border-radius: 5px;
                    }
                    </style>
                    </head>
                    <body>
                    <div class="container">
                        <h1>New Order Request</h1>
                        <p>Hello </p>
                        <p>You have received a new order request from a buyer. Please review the details and take necessary action.</p>
                        <p><strong>Order Details:</strong></p>
                        <ul>
                        <li><strong>Order ID:</strong> [Order ID]</li>
                        <li><strong>Buyer Name:</strong> [Buyer Name]</li>
                        <li><strong>Product/Service:</strong> [Product/Service Name]</li>
                        <li><strong>Order Amount:</strong> [Order Amount]</li>
                        </ul>
                        <p>You can view and manage your orders by logging into your account.</p>
                        <p>If you have any questions or need assistance, feel free to contact our support team.</p>
                        <a href="[Your Website URL]" class="button">Login to Your Account</a>
                        <p>Thank you,</p>
                        <p>SKILLSPARQ</p>
                    </div>
                    </body>
                    </html>
                    `;
    
                }
    
                //send notification to seller
                // $this->sendVerificationMail($sellerEmail, );
                

                // update order history
                $isHistoryUpdated = $this->OrderHandlerModel->updateOrderHistory($orderId, $currentDateTime, 'Order Request is Sent');
                if($isHistoryUpdated){
                    $data['redirectURL'] = BASEURL.'manageOrders';
                    $data['message'] = "Order Created Successfully";
                    $this->view('successful', $data);
                }else{
                    throw new Exception("Update order history failed");
                }
    
            } else {
                echo "
                <script>
                    alert('Error Creating package order');
                </script>
                ";
            }

        }catch(Exception $e){

            echo 'An error occurred during creation of package order: ' . $e->getMessage();

        }

    }
    

    //create milestone order
    public function createMilestoneOrder()
    {

        try{

            // Check if the "milestone" array is set in the POST data
            if (isset($_POST['milestone'])) {

                $orderState = 'Requested';
                $orderType = 'milestone';
                $sellerId = $_POST['sellerId'];
                $buyerId = $_POST['buyerId'];
                $gigId = $_POST['gigId'];
                $currentDateTime = date('Y-m-d H:i:s');
                // print_r($_POST);
                $orderId = $this->OrderHandlerModel->createMilestoneOrder($orderState, $orderType, $currentDateTime, $buyerId, $sellerId, $gigId);

                if($orderId){

                    //get chat
                    if($orderId){
                        $chatId = $this->ChatHandlerModel->createNewChat('order', $orderId);
                    }else{
                        $this->view("505");
                    }

                    $orderFileName = "Order" . "_" . $orderId;
                    $targetDir = "../public/assests/zipFiles/orderFiles/$orderFileName/";
                    mkdir($targetDir, 0777, true);
                    
                    // update order history
                    $isHistoryUpdated = $this->OrderHandlerModel->updateOrderHistory($orderId, $currentDateTime, 'Order Request is Sent');
                    if(!$isHistoryUpdated){
                        throw new Exception("Update order history failed");
                    }

                }else{
                    throw new Exception("Error creating milestone order");
                }

                $targetDir = "../public/assests/zipFiles/orderFiles/$orderFileName/milestoneAttachments/";
                mkdir($targetDir, 0777, true);

                // Loop through each milestone
                foreach ($_POST['milestone']['subject'] as $index => $milestone) {

                    // Get milestone details
                    $subject = $_POST['milestone']['subject'][$index];
                    $revisions = $_POST['milestone']['revisions'][$index];
                    $deliveryQuantity = $_POST['milestone']['deliveryQuantity'][$index];
                    $deliveryTimePeriodType = $_POST['milestone']['deliveryTimePeriodType'][$index];
                    $price = $_POST['milestone']['price'][$index];
                    $description = $_POST['milestone']['description'][$index];


                    // Check if there's an attachment for this milestone
                    if ($_FILES['milestone']['error']['attachment'][$index] == UPLOAD_ERR_OK) {
                        $tmpName = $_FILES['milestone']['tmp_name']['attachment'][$index];
                        $fileName = $_FILES['milestone']['name']['attachment'][$index];
                        $uploadPath = $targetDir . $fileName;
                        move_uploaded_file($tmpName, $uploadPath);

                        $attachmentName = $fileName;

                    } else {
                        $attachmentName = "";
                    }

                    $milestone = $this->OrderHandlerModel->addNewMilestone($subject, $revisions, $deliveryQuantity, $deliveryTimePeriodType, $price, $description, $attachmentName, $orderId);
                    if(!$milestone){
                        throw new Exception("add new milestone failed");
                    }

                }

                    $data['redirectURL'] = BASEURL.'manageOrders';
                    $data['message'] = "Order Created Successfully";
                    $this->view('successful', $data);

                return true;

            } else {
                // Handle the case where no milestone data is found in the POST data

                throw new Exception('no milestone data found');

            }

        }catch(Exception $e){

            echo 'An error occurred during creation of milestone order: ' . $e->getMessage();

        }
        
    }

    // method to create a job order for successfully accepted job proposal
    public function createJobOrder($orderState, $orderType, $currentDateTime, $buyerId, $sellerId)
    {

        $currentDateTime = Date('Y-m-d H:i:s');
        // create order
        $orderId = $this->OrderHandlerModel->createJobOrderRecord($orderState,$orderType,$currentDateTime,$buyerId,$sellerId);
        
        //get chat
        if($orderId){
            $chatId = $this->ChatHandlerModel->createNewChat('order', $orderId);
        }else{
            $this->view("505");
        }

        if($chatId){

            // update order history
            $isHistoryUpdated = $this->OrderHandlerModel->updateOrderHistory($orderId, $currentDateTime, 'Order Request is Sent');
            if($isHistoryUpdated){
                $data['redirectURL'] = BASEURL.'manageOrders';
                $data['message'] = "Order Created Successfully";
                $this->view('successful', $data);
            }else{
                throw new Exception("Update order history failed");
            }

            return $orderId;

        }else{
            echo "
                <script>
                    window.alert('Error Occured when inserting the order data !');
                    window.location.href = '" . BASEURL . "jobproposals';
                </script>
                ";
        }
    }


    //Cancelling an Order
    public function cancelOrder()
    {
        try {

            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                $orderId = $_POST['orderId'];
                $currentOrderState = $_POST['currentState'];
                $currentDateTime = Date('Y-m-d H:i:s');
                $state = "Cancelled";
                
                $isUpdatedOrderState = $this->OrderHandlerModel->updateOrderState($orderId, $state);
        
                if($isUpdatedOrderState){
    
                    // update order history
                    $isHistoryUpdated = $this->OrderHandlerModel->updateOrderHistory($orderId, $currentDateTime, "Order State Changed from " . $currentOrderState . " to Cancelled");
                    if($isHistoryUpdated){
                        return $isUpdatedOrderState;
                    }else{
                        throw new Exception("Update order history failed");
                    }
    
                }else{
                    throw new Exception('Error updating order state');
                }
    
            } else {
                $this->redirect("_505");
                // echo "Invalid request method";
            }

        }catch(Exception $e){

            echo "Error canceling order" , $e->getMessage();

        }

    }

    //Accept an order request
    public function acceptOrderRequest()
    {
        try{

            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                $orderId = $_POST['orderId'];
                $currentOrderState = $_POST['currentState'];
                $currentDateTime = Date('Y-m-d H:i:s');
                $orderType = $_POST['orderType'];
                if($orderType == 'milestone'){
                    $milestoneId = $_POST['milestoneId'];
                }
                $state = "Accepted/Pending Payments";
                
                $isUpdatedOrderState = $this->OrderHandlerModel->updateOrderState($orderId, $state);
        
                if($isUpdatedOrderState){

                    //update milestone state
                    $milestoneUpdate = $this->OrderHandlerModel->updateMileStoneState($milestoneId, $state);
                    if(!$milestoneUpdate){
                        throw new Exception('milestone state update failure');
                    }

                    // update order history
                    $isHistoryUpdated = $this->OrderHandlerModel->updateOrderHistory($orderId, $currentDateTime, "Order State Change from " . $currentOrderState . " to Accepted/Pending Payments");
                    if($isHistoryUpdated){
                        return $isHistoryUpdated;
                    }else{
                        throw new Exception("Update order history failed");
                    }
                    return $isUpdatedOrderState;
                }
    
            } else {
                $this->redirect("_505");
            }

        }catch(Exception $e){

            echo 'An error occurred during completion: ' . $e->getMessage();

        }
    }

    //Payment Handling
    public function verifyPayment()
    {
        try{
            // print_r($_POST);
            // //look for authorize api, capture api and refund api
            // $merchantId = $_POST['merchant_id'];
            $orderId = $_POST['order_id'];
            // $payhereAmount = $_POST['payhere_amount'];
            // $payhereCurrency = $_POST['payhere_currency'];
            // $statusCode = $_POST['status_code'];
            // $md5sig = $_POST['md5sig'];
            $currentDateTime = date('Y-m-d H:i:s');
            $orderType = $_POST['order_type'];
            if($orderType == 'milestone'){
                $milestoneId = $_POST['address'];
            }
    
            // $merchant_secret = 'MzE1ODIzOTcyNDE3ODQ1NjA3MDkxNTI2MTU2OTMyMjE4MDMzMjI4MQ=='; // Replace with your Merchant Secret
    
            // $local_md5sig = strtoupper(
            //     md5(
            //         $merchantId . 
            //         $orderId . 
            //         $payhereAmount . 
            //         $payhereCurrency . 
            //         $statusCode . 
            //         strtoupper(md5($merchant_secret)) 
            //     ) 
            // );
                
            // if (($local_md5sig === $md5sig) AND ($statusCode == 2) ){
            //         //TODO: Update your database as payment success
            // }
    
            $state = "Running";
            $isUpdatedOrderState = $this->OrderHandlerModel->updateOrderState($orderId, $state);
    
            if($isUpdatedOrderState){

                //update milestone state
                $milestoneUpdate = $this->OrderHandlerModel->updateMileStoneState($milestoneId, $state);
                if(!$milestoneUpdate){
                    throw new Exception('milestone state update failure');
                }

                // update order history
                $isHistoryUpdated = $this->OrderHandlerModel->updateOrderHistory($orderId, $currentDateTime, "Order State Changed from Accepted/Pending Payments to Running");
                if($isHistoryUpdated){
                    echo "
                    <script>
                        alert('Payment done successfully');
                        window.location.href = '" . BASEURL . "order&orderId=" . $_POST['order_id'] . "&orderType=" . $_POST['order_type'] . "&buyerId=".$_POST['buyer_id'] . "&sellerId=". $_POST['seller_id'] ."';
                    </script>
                    ";
                    return $isUpdatedOrderState;
                }else{
                    throw new Exception("Update order history failed");
                }

            }else{
                $this->redirect("_505");
            }

        }catch(Exception $e){

            echo 'An error occurred: ' . $e->getMessage();

        }
    }

    // complete order
    public function completeOrder()
    {
        try{

            if(isset($_POST['completeOrder'])){

                $senderId = $_POST['senderId'];
                $receiverId = $_POST['receiverId'];
                $orderId = $_POST['orderId'];
                $feedback = $_POST['feedback'];
                $rating = $_POST['rating'];
                $orderType = $_POST['orderType'];
                $currentState = $_POST['currentState'];
                $currentDateTime = date('Y-m-d H:i:s');

                if(trim($feedback) != "" || $rating > 0){
                    $this->ProfileHandlerModel->sendFeedback($senderId, $receiverId, $feedback, $rating, $currentDateTime);
                }

                if($orderType == 'milestone'){

                    $milestoneId = $_POST['milestoneId'];
                    $state = "Completed";

                    //update milestone state
                    $milestoneUpdate = $this->OrderHandlerModel->updateMileStoneState($milestoneId, $state);
                    if(!$milestoneUpdate){
                        throw new Exception('milestone state update failure');
                    }

                    $incompleteMilestoneCount = $this->OrderHandlerModel->getIncompleteMilestoneCount($orderId);

                    if($incompleteMilestoneCount['incomplete_milestone_count'] != 0){
                        $this->OrderHandlerModel->updateOrderState($orderId, "Requested");
                        $this->OrderHandlerModel->updateOrderHistory($orderId, $currentDateTime, "Order State Changed from " . $currentState. " to Requested");
                        $this->OrderHandlerModel->updateMilestoneStartingDate($orderId,$currentDateTime);
                        echo "
                        <script>
                            window.location.href = '" . BASEURL . "manageOrders';
                        </script>
                        ";
                    }else{
                        $state = "Completed";
                        $isUpdated = $this->OrderHandlerModel->updateOrderState($orderId, $state);
    
                        if($isUpdated){
                            // update order history
                            $isHistoryUpdated = $this->OrderHandlerModel->updateOrderHistory($orderId, $currentDateTime, "Order State Changed from " . $currentState. " to Completed");
                            if($isHistoryUpdated){
                                $data['redirectURL'] = BASEURL.'manageOrders';
                                $data['message'] = "Order Completed Successfully";
                                $this->view('successful', $data);
                            }else{
                                throw new Exception("Update order history failed");
                            }
                        }else{
                            throw new Exception("Error updating order state");
                        }
                    }

                }else{

                    $state = "Completed";
                    $isUpdated = $this->OrderHandlerModel->updateOrderState($orderId, $state);

                    if($isUpdated){
                        // update order history
                        $isHistoryUpdated = $this->OrderHandlerModel->updateOrderHistory($orderId, $currentDateTime, "Order State Changed from " . $currentState. " to Completed");
                        if($isHistoryUpdated){
                            $data['redirectURL'] = BASEURL.'manageOrders';
                            $data['message'] = "Order Completed Successfully";
                            $this->view('successful', $data);
                        }else{
                            throw new Exception("Update order history failed");
                        }
                    }else{
                        throw new Exception("Error updating order state");
                    }

                }

            }else{
                $this->redirect("_505");
            }

        }catch(Exception $e){

            echo 'An error occurred during completion: ' . $e->getMessage();

        }
    }

    // send feedbacks
    public function sendFeedbacks()
    {
        try{

            if(isset($_POST['sendFeedback'])){

                $senderId = $_POST['senderId'];
                $receiverId = $_POST['receiverId'];
                $feedback = $_POST['feedback'];
                $rating = $_POST['userRating'];
                $currentDateTime = date('Y-m-d H:i:s');

                if(trim($feedback) != "" || $rating > 0){
                    $isSent = $this->ProfileHandlerModel->sendFeedback($senderId, $receiverId, $feedback, $rating, $currentDateTime);
                }

                if($isSent){
                    $data['redirectURL'] = BASEURL.'manageOrders';
                    $data['message'] = "Your Feedback is sent Successfully";
                    $this->view('successful', $data);
                }else{
                    throw new Exception("Error updating order state");
                }

            }else{
                $this->redirect("_505");
            }

        }catch(Exception $e){

            echo 'An error occurred during sending feedback: ' . $e->getMessage();

        }
    }

    // check order state when the timer get expired
    public function checkOrderState()
    {
        try{            
            
            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                $orderId = $_POST['orderId'];
                $orderType = $_POST['orderType'];
                
                if($orderType == 'milestone'){
                    $milestoneId = $_POST['milestoneId'];
                }

                $currentState = $this->OrderHandlerModel->getOrderState($orderId)['order_state'];
                if($currentState == 'Requested' || $currentState == 'Accepted/Pending Payments'){
                    $state = "Cancelled";
                    $this->OrderHandlerModel->updateOrderState($orderId, $state);
                }

            }else{
                $this->redirect("_505");
            }


        }catch(Exception $e){
            echo 'An error occurred during checking order state: '.$e->getMessage();
        }
    }


}
?>