<?php include "components/helpCenter.component.php"; ?>

<link rel="stylesheet" href="../public/assests/css/viewComplaints.styles.css" />
<link rel="stylesheet" href="../public/assests/css/chatcsa.styles.css" />
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<div class="dash-content">

</div>

<!-- Main container -->
<div class="wrapper">

    <!-- Right Container  -->
    <div class="userList">
        <p style="margin-left: 33%;">Buyer Id: <?php echo $buyer_id ?></p>
        <div class="contactCard">
            <!-- <img class="contactProfilePicture receiverActive" src="" loading="lazy"> -->
        </div>
    </div>

    <!-- Middle Container -->
    <div class="chat">

        <!-- chat header -->
        <div class="header">
            <div class="receiver">
                <div class="upperSection">

                    <span style="font-weight:bold" class="text">Chat for order id: <?php echo $order_id;
                                                                                    ?></span>
                </div>
                <div class="lowerSection">
                    <small>

                    </small>
                </div>
            </div>
        </div>


        <div class="innerContainer" id="chatContainer">
            <?php foreach ($viewChat as $chat) { ?>
                <small class="time-<?php echo ($buyer_id == $chat['sender_id']) ? 'right' : 'left'; ?>"><?php echo htmlspecialchars(date('F j, Y, g:i a', strtotime($chat['date']))); ?></small>
                <div class="messageContainer-<?php echo ($buyer_id == $chat['sender_id']) ? 'sender' : 'receiver'; ?>">
                    <div class="<?php echo ($buyer_id == $chat['sender_id']) ? 'senderContent' : 'receiverContent'; ?>">


                        <p div><?php echo htmlspecialchars($chat['message']); ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>


        <!-- chat footer  -->

    </div>

    <!-- Left Container -->
    <div class="userList">
        <p style="margin-left: 33%;">Seller Id: <?php echo $seller_id ?></p>
        <div class="contactCard">
            <!-- <img class="contactProfilePicture receiverActive" src="" loading="lazy"> -->
        </div>
    </div>
    <div class="animation">
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
        <dotlottie-player src="https://lottie.host/dd791e01-5c8c-45e0-8e98-6f32680ac36d/YwfKoS0woP.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
    </div>
</div>
</div>

<script src="../public/assests/js/chat.script.js"></script>