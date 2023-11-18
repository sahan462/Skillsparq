<?php
    if($_SESSION['role'] == 'buyer'){
        include "components/buyerSimpleHeader.component.php";
    }else{
        include "components/sellerHeader.component.php";
    }
?>

<?php 
    $data["receiverProfilePicture"] = "https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";
    $data["senderProfilePicture"] = "https://images.unsplash.com/photo-1489980869433-d1f7c7ac0fcf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";
    $data["lastSeen"] = "online";
    $data["receiverName"] = "Chamalka Chandrasena";

    $data["receiverCountry"] = "Switzerland";
    $data["memberSince"] = "July 2022";
    $data["rating"] = 0;
    $data["ratingCount"] = 0;

?>


<!-- Main container -->
<div class="wrapper">

    <!-- Right Container  -->
    <div class="userList">
        <p>All Messages</p>
        <div class="contactCard">
            <img class="contactProfilePicture active" src="<?php echo $data["receiverProfilePicture"]?>" loading="lazy">
        </div>
    </div>

    <!-- Middle Container -->
    <div class="chat">

        <!-- chat header -->
        <div class="header">
            <div class="receiver">
                <div class="upperSection">
                    <?php if($data["lastSeen"] == "online") { ?>
                        <div class="dot receiverActive"></div>
                    <?php }else{ ?>
                        <div class="dot receiverOffline"></div>
                    <?php } ?>
                    <h1>
                        <a href=""><?php echo $data['receiverName']?></a>
                    </h1>
                </div>
                <div class="lowerSection">
                    <small>
                        <?php if($data["lastSeen"] == "online") { ?>
                            <?php echo $data['lastSeen']; ?>
                        <?php }else{ ?>
                            Last Seen:<?php echo $data['lastSeen']; ?>
                        <?php } ?>
                    </small>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div class="container">

            <div class="receiver-container">
                <div class="messageContainer">
                    <div class="senderContent">
                        <img src="<?php echo $data["receiverProfilePicture"] ?>" alt="Avatar">
                        <p class="P" >
                            Hello. How are you today?
                            <span class="time-right">11:00</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="sender-container">
                <div class="messageContainer darker">
                    <div class="receiverContent">
                        <img src="<?php echo $data["senderProfilePicture"] ?>" alt="Avatar" class="right">
                        <p class="receiver" >
                            Hey! I'm fine. Thanks for asking!
                            <span class="time-left">11:01</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="receiver-container">
                <div class="messageContainer">
                    <div class="senderContent">
                        <img src="<?php echo $data["receiverProfilePicture"] ?>" alt="Avatar">
                        <p class="P" >
                            Sweet! So, what do you wanna do today?
                            <span class="time-right">11:00</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="sender-container">
                <div class="messageContainer darker">
                    <div class="receiverContent">
                        <img src="<?php echo $data["senderProfilePicture"] ?>" alt="Avatar" class="right">
                        <p class="receiver" >
                            Nah, I dunno. Play soccer.. or learn more coding perhaps?
                            <span class="time-left">11:01</span>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- chat footer  -->
        <div class="footer">
            <div class="attachement"></div>
            <div class="inputMessage"></div>
            <div class="sendButton"></div>
        </div>
    </div>

    <!-- Left Container -->
    <div class="receiverInfo">
        <div class="info">
            <div class="header">
                <p>About <a href=""><?php echo $data["receiverName"] ?></a></p>
            </div>
            <div class="content">
                <div class="row">
                    <p class="leftSide">From</p><p class="rightSide"><?php echo $data["receiverCountry"] ?></p>
                </div>
                <div class="row">
                    <p class="leftSide">Member Since</p><p class="rightSide"><?php echo $data["memberSince"] ?></p>
                </div>
                <div class="row">
                    <p class="leftSide">Rating</p><p class="rightSide"><?php echo $data["rating"] ?>(<?php echo $data["ratingCount"] ?>)</p>
                </div>
            </div>

        </div>
        <div class="animation">
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
            <dotlottie-player src="https://lottie.host/dd791e01-5c8c-45e0-8e98-6f32680ac36d/YwfKoS0woP.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
        </div>
    </div>
</div>

<?php include "components/footer.component.php"; ?>
