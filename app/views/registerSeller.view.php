<?php $errors=$data['errors'] ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php linkCSS('register'); ?>
    <?php linkFav('ee-logo.png');?> 
</head>

<body>
    <form method="post" action="<?php echo BASEURL.'/registerSeller/submit';?>">
        <div class="container">
            <div class="header"><span style="color:#007BFF">Create</span> A New Seller Account</div>
            <div class="fieldset">
                <label for="firstName" class="label">First Name</label>
                <input type="text" placeholder="Enter First Name" name="firstName" id="firstName" autocomplete="off">
                <span class="error"><?php echo $errors["firstname"];?></span>
            </div>
            <div class="fieldset">
                <label for="lastname" class="label">Last Name</label>
                <input type="text" placeholder="Enter Last Name" name="lastName" id="lastName" autocomplete="off">
                <span class="error"><?php echo $errors["lastname"];?></span>
            </div>
            <div class="fieldset">
                <label for="lastname" class="label">User Name</label>
                <input type="text" placeholder="Pick a User Name" name="userName" id="userName" autocomplete="off">
                <span class="error"><?php echo $errors["userName"];?></span>
            </div>
            <div class="fieldset">
                <label for="dob" class="label">Date Of Birth</label>
                <input type="date" placeholder="Enter DOB" name="dob" id="dob" autocomplete="off" max="<?php echo date("Y-m-d", strtotime("-18 year", time()));?>">
                <span class="error"><?php echo $errors["dob"];?></span>
            </div>
            <div class="fieldset">
                <label for="email" class="label">University Student Email Address</label>
                <input type="email" placeholder="Enter Email" name="email" id="email" autocomplete="off">
                <span class="error"><?php echo $errors["email"];?></span>
            </div>
            <div class="fieldset">
                <label for="password" class="label">Crate New Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password" autocomplete="off">
            </div>
            <div class="fieldset">
                <label for="passwordRepeat" class="label">Confirm Your Password</label>
                <input type="password" placeholder="Confirm Password" name="passwordRepeat" id="passwordRepeat" autocomplete="off">
                <span class="error"><?php echo $errors["password"];?></span>
            </div>
            <div class="fieldset">
              <p class="agreement-condition">
                  <input type="checkbox" name="agreement" id="agreement" value="1">I agree to company <a href="#">Terms &
                      Privacy</a>.
                  <span class="error"><?php echo $errors["agreement"];?></span>
              </p>
              <input type="submit" class="registerbtn" value="Register" name="register">
            </div>
        </div>
    </form>
</body>

</html>