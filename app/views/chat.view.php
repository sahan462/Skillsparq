<?php
if ($_SESSION['role'] == 'Buyer') {
    include "components/buyerSimpleHeader.component.php";
} else if ($_SESSION['role'] == 'Seller') {
    include "components/sellerHeader.component.php";
}
?>

<?php
$data["receiverProfilePicture"] = "https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";
$data["senderProfilePicture"] = "https://images.unsplash.com/photo-1489980869433-d1f7c7ac0fcf?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";
$data["lastSeen"] = "online";
$data["receiverName"] = "Chamal Fernando";

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
            <img class="contactProfilePicture receiverActive" src="<?php echo $data["receiverProfilePicture"] ?>" loading="lazy">
        </div>
    </div>

    <!-- Middle Container -->
    <div class="chat">

        <!-- chat header -->
        <div class="header">
            <div class="receiver">
                <div class="upperSection">
                    <?php if ($data["lastSeen"] == "online") { ?>
                        <div class="dot receiverActive"></div>
                    <?php } else { ?>
                        <div class="dot receiverOffline"></div>
                    <?php } ?>
                    <h1>
                        <a href=""><?php echo $data['receiverName'] ?></a>
                    </h1>
                </div>
                <div class="lowerSection">
                    <small>
                        <?php if ($data["lastSeen"] == "online") { ?>
                            <?php echo $data['lastSeen']; ?>
                        <?php } else { ?>
                            Last Seen:<?php echo $data['lastSeen']; ?>
                        <?php } ?>
                    </small>
                </div>
            </div>
        </div>

        <!-- Messages -->
        <div class="innerContainer" id="chatContainer">


        </div>

        <!-- chat footer  -->
        <div class="chatFooter">

            <form method="post" id="chatForm">

                <input type="hidden" value="<?php echo $_SESSION['userId'] ?>" id="userId">
                <div class="attachement">
                    <input type="file" name="messageAttachement" id="messageAttachement">
                    <label for="messageAttachement">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                        </svg>
                    </label>
                </div>

                <div class="inputMessage">
                    <input type="text" name="message" id="newMessage">
                </div>

                <div class="sendButton">
                    <input type="submit" value="send" id="sendButton">
                    <!-- <label for="sendButton">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>
                    </label> -->
                </div>

            </form>

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
                    <p class="leftSide">From</p>
                    <p class="rightSide"><?php echo $data["receiverCountry"] ?></p>
                </div>
                <div class="row">
                    <p class="leftSide">Member Since</p>
                    <p class="rightSide"><?php echo $data["memberSince"] ?></p>
                </div>
                <div class="row">
                    <p class="leftSide">Rating</p>
                    <p class="rightSide"><?php echo $data["rating"] ?>(<?php echo $data["ratingCount"] ?>)</p>
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
<?php include "components/footer.component.php"; ?>