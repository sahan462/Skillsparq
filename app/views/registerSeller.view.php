<?php $errors = ["email"=>"", "password"=>"", "agreement"=>""] ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./assests/css/registerUser.styles.css">
</head>
<body>
    <form method="post" action="<?php echo BASEURL.'registerBuyer/submit';?>">
    <div class="container">
            <div class="header"><span>Create</span> A Seller Account</div>
            <div class="name">
                <div class="fieldset">
                    <label for="firstName" class="label">First Name</label>
                    <input type="text" placeholder="Enter First Name" name="firstName" id="firstName" autocomplete="off">
                </div>
                <div class="fieldset">
                    <label for="lastname" class="label">Last Name</label>
                    <input type="text" placeholder="Enter Last Name" name="lastName" id="lastName" autocomplete="off">
                </div>
            </div>
            <div class="fieldset">
                <label for="lastname" class="label">User Name</label>
                <input type="text" placeholder="Pick a User Name" name="userName" id="userName" autocomplete="off">
            </div>
            <div class="fieldset">
                <label for="email" class="label">Email</label>
                <input type="email" placeholder="Enter Email" name="email" id="email" autocomplete="off">
                <span class="error"><?php echo $errors["email"];?></span>
            </div>
            <div class="fieldset">
                <label for="password" class="label">Create New Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off">
            </div>
            <div class="fieldset">
                <label for="passwordRepeat" class="label">Confirm Your Password</label>
                <input type="password" placeholder="Confirm Password" name="passwordRepeat" id="passwordRepeat" autocomplete="off">
                <span class="error"><?php echo $errors["password"];?></span>
            </div>
            <div class="fieldset">
              <span class="agreement-condition">
                  <input type="checkbox" name="agreement" id="agreement" value="1">I agree to company <a href="#">Terms &
                      Privacy</a>.
                </span>
              <span class="error"><?php echo $errors["agreement"];?></span>
              <input type="submit" class="registerbtn" value="Next" name="register">
            </div>
        </div>
    </form>
</body>

</html>