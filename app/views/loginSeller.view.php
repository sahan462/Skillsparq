<?php 
    $errors = $data["errors"] ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/skillsparq/public/assests/css/login.styles.css">
</head>

<body>
    <form method="post" action="loginSeller/validate">
        <div class="container">
            <div class="header"><span>Login</span></div>
            <div class="fieldset">
                <label for="lastname" class="label">Phone Number</label>
                <input type="text" value = "+94" placeholder="Enter your " name="phoneNumber" id="userName" autocomplete="off" required>
                <span class="error" ><?php echo $errors["phoneNumber"];?></span>
            </div>
            <div class="fieldset">
                <label for="password" class="label">Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off" required>
                <span id="passwordError" class="error" ><?php echo $errors["password"];?></span>
            </div>
            <a href="" style="text-decoration:none"><div  class="normal-blue-font">Are you a seller? <a href="loginUser">Click here!</a></div></a>
            <!-- <a href="" style="text-decoration:none"><div  class="normal-blue-font">Forgotten Your <a href="#">Username/Password?</a></div></a> -->
            <div style="margin-top:20px"> <input type="submit" class="registerbtn" value="Login" name="login"></div>
        </div>
    </form>

</body>

</html>