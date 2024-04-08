<?php

//change the class name
class ManageOrders extends Controller
{

    public function __construct(){
        $this->OrderHandlerModel = $this->model('orderHandler');
    }

    public function index(){

        $data['var'] = "Manage Orders Page";
        $data['title'] = "SkillSparq";

        $data['myOrders'] = $this->getOrders($_SESSION['userId'], $_SESSION['role']);
        
        $this->view('manageOrders', $data); 
    }

    //create a package order
    public function createPackageOrder() {
        // Get form data
        $orderStatus = "request";
        $orderType = $_POST['orderType'];
        $buyerId = $_POST['buyerId'];    
        $sellerId = $_POST['sellerId'];
        $requestDescription = $_POST['requestDescription'];
        $attachment = $_FILES['attachments'];
        $gigId = $_POST['gigId'];
        $packageId = $_POST['packageId'];
    
        // Set current datetime and user name
        date_default_timezone_set('UTC');
        $currentDateTime = date('Y-m-d H:i:s');
        $userName = $_SESSION['userName'];

        $attachmentName = basename($attachment["name"]);
    
        // Create order and handle attachment
        $orderId = $this->OrderHandlerModel->createPackageOrder($orderStatus, $orderType, $currentDateTime, $buyerId, $sellerId, $requestDescription, $attachmentName, $gigId, $packageId);

        $orderFileName = "Order" . "_" . $orderId;
        $targetDir = "../public/assests/zipFiles/orderFiles/$orderFileName/";

        //open a new order file
        mkdir($targetDir, 0777, true);

        $upload = 0;

        // Upload attachment if provided
        if($attachmentName != ""){
            $targetFilePath = $targetDir . $attachmentName;
            $upload = move_uploaded_file($attachment["tmp_name"], $targetFilePath);
        }else{
            $attachmentName = "";
        }
    
        // Handle success or failure
        if($upload || $orderId){

            if(isset($_SESSION['email'])){

                //notify the seller using an email
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
            



            echo "
            <script>
                alert('Order created successfully');
                window.location.href = '" . BASEURL . 'manageOrders' . "';
            </script>
            ";


        } else {
            echo "
            <script>
                alert('Error Crearing package order');
            </script>
            ";
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

    //read orders
    public function getOrders($userId, $userRole){

        $myOrders = $this->OrderHandlerModel->getOrders($userId, $userRole);

        if($myOrders){

            return $myOrders;

        }else{

            echo "<script>alert('getOrders function is not Accessible!')</script>";

        }


    }

    

}

?>