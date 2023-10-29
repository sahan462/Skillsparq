<!DOCTYPE html>
<html lang="en">
<?php
$errors =   array();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assests/css/login.styles.css">
</head>

<body>
    <form method="post" action="">
        <div class="container">
            <div class="header"><span>Login</span></div>
            <div class="fieldset">
                <label for="lastname" class="label">UserName / E-Mail</label>
                <input type="email" placeholder="Enter your Email" name="userName" id="userName" autocomplete="off" required>
            </div>
            <div class="fieldset">
                <label for="password" class="label">Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off" required>
            </div>
            <a href="" style="text-decoration:none"><div  class="normal-blue-font">Forgotten Your <a href="#">Username/Password?</a></div></a>
             <div style="padding-bottom:20px"> <input type="submit" class="registerbtn" value="Login" name="register"></div>
        </div>
    </form>
</body>

</html>