<?php

class Order extends Controller
{
    private $OrderHandlerModel;
    private $ChatHandlerModel;

    public function __construct()
    {
        $this->OrderHandlerModel = $this->model('orderHandler');
        $this->ChatHandlerModel = $this->model('chatHandler');
        $this->ProfileHandlerModel = $this->model('profileHandler');
    }


    public function index()
    {

        $data['var'] = "Order Page";
        $data['title'] = "SkillSparq";

        $orderId = $_GET['orderId'];
        $orderType = $_GET['orderType'];
        $buyerId = $_GET['buyerId'];
        $sellerid = $_GET['sellerId'];
        $userRole = $_SESSION['role'];

        // get order, buyer and seller information
        $data = $this->OrderHandlerModel->getOrderDetails($orderId, $orderType, $buyerId, $sellerid, $userRole);
        $order = $data['order'];
        $chatId = $order['chat_id'];

        //retrieve the chat from the database
        $data['chat'] = $this->ChatHandlerModel->readAllMessages($chatId);
        // show($data);
        $this->view('order', $data);
        
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

            // Create order
            $orderId = $this->OrderHandlerModel->createPackageOrder($orderState, $orderType, $currentDateTime, $buyerId, $sellerId, $requestDescription, $attachmentName, $gigId, $packageId);

            //get chat
            if($orderId){
                $chatId = $this->ChatHandlerModel->createNewChat('order', $orderId);
            }else{
                $this->view("505");
            }

            //create directory for the new attachment
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
                if(isset($_SESSION['email'])){
    
                    //notify the seller using an email
                    $sellerEmail = $this->getSession('email');
                    

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
                        <p>Hello [Seller Name],</p>
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
                        <p>[Your Company Name]</p>
                    </div>
                    </body>
                    </html>
                    `;
    
                }
    
                //send notification to seller
                // $this->sendVerificationMail();
    
    
    
                echo "
                <script>
                    alert('Order created successfully');
                    window.location.href = '" . BASEURL . 'manageOrders' . "';
                </script>
                ";
    
    
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
    public function createMilestoneOrder(){

        $milestones = $_POST['milestone'];
        $subjects = $milestones['subject'];
        $revisions = $milestones['revisions'];
        $deliveryQuantities = $milestones['deliveryQuantity'];
        $deliveryTimePeriodTypes = $milestones['deliveryTimePeriodType'];
        $prices = $milestones['price'];
        $attadchements = $milestones['attachment'];
        $descriptions = $milestones['description'];

        print_r($milestones);
        echo "<br>";
        echo "<br>";
        echo "<br>";
        print_r($_FILES);

        for ($i = 0; $i < count($subjects); $i++) {

            echo "Milestone: $i <br>";

            $subject = $subjects[$i];
            $revision = $revisions[$i];
            $deliveryQuantity = $deliveryQuantities[$i];
            $deliveryTimePeriodType = $deliveryTimePeriodTypes[$i];
            $price = $prices[$i];
            $attchement = $attadchements[$i];
            $description = $descriptions[$i];

            print_r($subject);
            echo "<br>";
            print_r($revision);
            echo "<br>";
            print_r($deliveryQuantity);
            echo "<br>";
            print_r($deliveryTimePeriodType);
            echo "<br>";
            print_r($price);
            echo "<br>";
            print_r($description);
            echo "<br>";

        }
        
    }

    // method to create a job order for successfully accepted job proposal
    public function createJobOrder($orderState,$orderType,$orderCreatedAt,$buyerId,$sellerId)
    {
        $isCreated = $this->OrderHandlerModel->createJobOrderRecord($orderState,$orderType,$orderCreatedAt,$buyerId,$sellerId);
        if(is_numeric($isCreated)){
            return $isCreated;
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
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            $orderId = $_POST['orderId'];
            $state = "Cancelled";
            
            $isUpdatedOrderState = $this->OrderHandlerModel->updateOrderState($orderId, $state);
    
            if($isUpdatedOrderState){
                return $isUpdatedOrderState;
            }

        } else {
            $this->redirect("_505");
            // echo "Invalid request method";
        }

    }

    //Accept an order request
    public function acceptOrderRequest()
    {
        try{

            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                $orderId = $_POST['orderId'];
                $state = "Accepted/Pending Payments";
                
                $isUpdatedOrderState = $this->OrderHandlerModel->updateOrderState($orderId, $state);
        
                if($isUpdatedOrderState){
                    return $isUpdatedOrderState;
                }
    
            } else {
                $this->redirect("_505");
            }

        }catch(Exception $e){

            echo 'An error occurred during completion: ' . $e->getMessage();

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
                $currentDateTime = date('Y-m-d H:i:s');

                if(trim($feedback) != "" || $rating > 0){
                    $this->ProfileHandlerModel->sendFeedback($senderId, $receiverId, $feedback, $rating, $currentDateTime);
                }

                $state = "Completed";
                $isUpdated = $this->OrderHandlerModel->updateOrderState($orderId, $state);

                if($isUpdated){
                    echo "
                    <script>
                        window.alert('order completed successfully !');
                        window.location.href = '" . BASEURL . "manageOrders#Completed';
                    </script>
                    ";
                }else{
                    throw new Exception("Error updating order state");
                }

            }else{
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
            print_r($_POST);
            //look for authorize api, capture api and refund api
            $merchantId = $_POST['merchant_id'];
            $orderId = $_POST['order_id'];
            $payhereAmount = $_POST['payhere_amount'];
            $payhereCurrency = $_POST['payhere_currency'];
            $statusCode = $_POST['status_code'];
            $md5sig = $_POST['md5sig'];
    
            $merchant_secret = 'MzE1ODIzOTcyNDE3ODQ1NjA3MDkxNTI2MTU2OTMyMjE4MDMzMjI4MQ=='; // Replace with your Merchant Secret
    
            $local_md5sig = strtoupper(
                md5(
                    $merchantId . 
                    $orderId . 
                    $payhereAmount . 
                    $payhereCurrency . 
                    $statusCode . 
                    strtoupper(md5($merchant_secret)) 
                ) 
            );
                
            if (($local_md5sig === $md5sig) AND ($statusCode == 2) ){
                    //TODO: Update your database as payment success
            }
    
            $state = "Running";
            $isUpdatedOrderState = $this->OrderHandlerModel->updateOrderState($orderId, $state);
    
            if($isUpdatedOrderState){
                echo "
                <script>
                    alert('Payment done successfully');
                    window.location.href = '" . BASEURL . "order&orderId=" . $_POST['order_id'] . "&orderType=" . $_POST['order_type'] . "&buyerId=".$_POST['buyer_id'] . "&sellerId=". $_POST['seller_id'] ."';
                </script>
            ";
            }else{
                $this->redirect("_505");
            }

        }catch(Exception $e){

            echo 'An error occurred: ' . $e->getMessage();

        }
    }

}
?>