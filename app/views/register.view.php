<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php linkCSS('registerLinker'); ?>
    <?php linkFav('ee-logo.png'); ?>
</head>

<body>
    <div class="container">
        <div class="header"><span style="color:#007BFF">Are you</span> a seller?</div>
        <p>Are you an Sri Lankan university undergraduate who is looking for an opportunity to sell your skills?</p>
        <div class="fieldset">
            <a href="<?php echo BASEURL.'/registerSeller' ?>" class="registerbtn">Get Registered Now.!</a>
        </div>
    </div>

    <div class="container">
        <div class="header"><span style="color:#007BFF">Are you</span> a buyer?</div>
        <p>Are you an individual who is looking for the best online platform to buy a service?</p>
        <div class="fieldset">
            <a href="<?php echo BASEURL.'/registerBuyer' ?>" class="registerbtn">Get Registered Now.!</a>
        </div>
    </div>




</body>

</html>