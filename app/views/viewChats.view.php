<?php include "components/helpCenter.component.php"; ?>

<link rel="stylesheet" href="../public/assests/css/viewComplaints.styles.css" />
<link rel="stylesheet" href="../public/assests/css/chatcsa.styles.css" />

<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">chat for order id: <?php echo $order_id;
                                                    ?></span>
        </div>

    </div>
</div>

<!-- Main container -->
<div class="wrapper">

    <!-- Right Container  -->
    <div class="userList">
        <p>All Messages</p>
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

                </div>
                <div class="lowerSection">
                    <small>

                    </small>
                </div>
            </div>
        </div>


        <!-- Messages -->
        <div class="innerContainer" id="chatContainer">
            <?php foreach ($viewChat as $chat) { ?>
                <div class="<?php echo ($buyer_id == $chat['sender_id']) ? 'sender' : 'receiver'; ?>">
                    <small><?php echo htmlspecialchars(date('F j, Y, g:i a', strtotime($chat['date']))); ?></small>
                    <p><?php echo htmlspecialchars($chat['message']); ?></p>
                </div>
            <?php } ?>

        </div>


        <!-- chat footer  -->

    </div>

    <!-- Left Container -->
    <div class="receiverInfo">
        <div class="info">
            <div class="header">
                <p>About <a href=""></a></p>
            </div>
            <div class="content">
                <div class="row">
                    <p class="leftSide">From</p>
                    <p class="rightSide"></p>
                </div>
                <div class="row">
                    <p class="leftSide">Member Since</p>
                    <p class="rightSide"></p>
                </div>
                <div class="row">
                    <p class="leftSide">Rating</p>
                    <p class="rightSide"></p>
                </div>
            </div>

        </div>
        <div class="animation">
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
            <dotlottie-player src="https://lottie.host/dd791e01-5c8c-45e0-8e98-6f32680ac36d/YwfKoS0woP.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
        </div>
    </div>
</div>

<script src="../public/assests/js/chat.script.js"></script>