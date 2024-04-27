<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assests/css/adminDashboard.styles.css" />
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <title>Admin Dashboard Panel</title>
</head>

<body>
    <?php include "components/adminDashboard.component.php"; ?>

    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <!-- <i class="uil uil-tachometer-fast-alt"></i> -->
                <h1 class="heading-one">Add new representative</h1>
            </div>

            <div>
                <label for="firstName" class="label">First Name</label><br>
                <input type="text" name="firstName" id="firstName" autocomplete="off" required><br>
                <label for="lastname" class="label">Last Name</label><br>
                <input type="text" name="lastName" id="lastName" autocomplete="off"><br>
                <label for="lastname" class="label">User Name</label><br>
                <input type="text" name="userName" id="userName" autocomplete="off" required><br>
                <label for="user_email">user_email</label><br>
                <input type="text" id="user_email" name="user_email"><br>
                <label for="user_password">Password:</label><br>
                <input type="text" id="user_password" name="user_password"><br>

            </div>
            <div>
                <button id="enter" onclick="enter()">enter</button>
            </div>
            <div>
                <table class="content-table">
                    <thead>
                        <th>user_id</th>
                        <th>user_email</th>
                        <th>role</th>
                        <th>View</th>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $row) {
                            if ($row['role'] === 'csa') {
                        ?>
                                <tr>
                                    <td><?php echo $row['user_id']; ?></td>
                                    <td><?php echo $row['user_email']; ?></td>
                                    <td><?php echo $row['role']; ?></td>
                                    <td><a href="#">View</a></td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>


            <form id="sendForm" method="post" style="display: none;">
                <input type="hidden" id="user_email" name="user_email" value="">
                <input type="hidden" id="user_password" name="user_password" value="">
                <input type="hidden" id="role" name="role" value="">
                <input type="hidden" id="agreement" name="agreement" value="">
                <input type="hidden" id="fname" name="fname" value="">
                <input type="hidden" id="lname" name="lname" value="">
                <input type="hidden" id="username" name="username" value="">


            </form>

</body>

</html>

<script>
    function enter() {
        var userEmail = document.getElementById('user_email').value;
        var userPassword = document.getElementById('user_password').value;
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;
        var userName = document.getElementById('userName').value;




        var confirmAction = confirm("Are you sure you want to blackList Buyer ID  for " + " days");

        if (confirmAction) {




            // Set the selected value in the hidden field
            document.getElementById('sendForm').elements['user_email'].value = userEmail;
            document.getElementById('sendForm').elements['user_password'].value = userPassword;
            document.getElementById('sendForm').elements['role'].value = 'csa';
            document.getElementById('sendForm').elements['agreement'].value = 1;
            document.getElementById('sendForm').elements['fname'].value = firstName;
            document.getElementById('sendForm').elements['lname'].value = lastName;
            document.getElementById('sendForm').elements['username'].value = userName;



            // Submit the form
            document.getElementById('sendForm').submit();
            alert("User ID blocked successfully until " + selectedDays + " days.");
        } else {
            alert("Operation canceled.");
        }
    }
</script>