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
            <div class="header"><span>Login</span> </div>
            <div class="fieldset">
                <label for="lastname" class="label">User Name</label>
                <input type="text" placeholder="Enter User Name" name="userName" id="userName" autocomplete="off">
            </div>
            <div class="fieldset">
                <label for="password" class="label">Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off">
            </div>
            <a href="" style="text-decoration:none"><div  class="normal-blue-font">Forgotten Your Username/Password?</div></a>
             <div style="padding-bottom:20px"> <input type="submit" class="registerbtn" value="Login" name="register"></div>
        </div>
    </form>
</body>

</html>