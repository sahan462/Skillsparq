<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile Page Design Example</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link rel="stylesheet" href="../public/assests/css/HCprofile.styles.css" />
    <link rel="stylesheet" href="../public/assests/css/viewComplaints.styles.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <style>
        #form-container {
            margin-left: 35%;
            border-style: solid;
            width: 50%;
            padding-left: 17%;

        }
    </style>
</head>

<body>

    <?php include "components/helpCenter.component.php"; ?>

    <section>
        <div class="rt-container">
            <div class="col-rt-12">
                <div class="Scriptcontent">

                    <!-- Student Profile -->
                    <div class="student-profile py-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent text-center">
                                            <img class="profile_img" src="./assests/images/profilePictures/<?php echo $_SESSION['profilePicture'];
                                                                                                            ?>" alt=" student dp">
                                            <h3><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0"><strong class="pr-1">User ID:</strong><?php echo $_SESSION['userId'] ?>
                                            </p>
                                            <p class="mb-0"><strong class="pr-1">User Name:</strong><?php echo $_SESSION['userName'] ?>
                                            </p>
                                            <p class="mb-0"><strong class="pr-1">User Email:</strong><br><?php echo $_SESSION['email'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent border-0">
                                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th width="30%">Roll</th>
                                                    <td width="2%">:</td>
                                                    <td><?php echo $_SESSION['role'] ?></td>
                                                </tr>
                                                <tr>
                                                    <?php foreach ($profile as $row) ?>
                                                    <th width="30%">Country </th>
                                                    <td width="2%">:</td>
                                                    <td><?php echo $row['country'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th width="30%">Joined DATE</th>
                                                    <td width="2%">:</td>
                                                    <td><?php echo $row['joined_date'] ?></td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <div style="height: 26px"></div>
                                    <div class="card shadow-sm">
                                        <div class="card-header bg-transparent border-0">
                                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
                                        </div>
                                        <div class="card-body pt-0">
                                            <?php echo $row['about'] ?>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <button style="margin-left: 25%; display:block" onclick="update()" id="update">Update </button>
                    <button id="close" onclick="close()" style="width: 25px; margin-bottom:15px; margin-left: 80%; display:none"><i class="fa-solid fa-xmark"></i></button>
                    <div id="form-container" style="display: none;">
                        <form id="sendForm" name="sendForm" method="post" enctype="multipart/form-data">
                            <div class="custom-file-upload">
                                <input type="file" name="fileToUpload" class="fileToUpload">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                                <span class="type-1" id="fileName">Attachements</span>
                            </div>
                            <label for="firstName" class="label">First Name</label><br>
                            <input type="text" name="firstName" id="firstName" autocomplete="off" required><br>
                            <label for="lastName" class="label">Last Name</label><br>
                            <input type="text" name="lastName" id="lastName" autocomplete="off"><br>
                            <label for="Country" class="label">Country</label><br>
                            <input type="text" name="Country" id="Country" autocomplete="off" required><br>
                            <label for="about">About</label><br>
                            <input type="text" id="about" name="about"><br>

                            <button style="margin-left: 70%;" id="save" onclick="submitForm(event)">Save</button>
                        </form>
                    </div>

                    <!-- partial -->

                </div>
            </div>
        </div>
    </section>


    <form id="sendForm" name="sendForm" method="post" style="display: none;">
        <input type="file" name="newProfilePicture" id="newProfilePicture" style="display:none" accept="image/*" onchange="renderImage()" />
        <input type="hidden" id="firstName" name="firstName" value="">
        <input type="hidden" id="lastName" name="lastName" value="">
        <input type="hidden" id="about" name="about" value="">
        <input type="hidden" id="country" name="country" value="">



    </form>
    <script>
        function update() {

            document.getElementById("form-container").style.display = "block";
            document.getElementById("update").style.display = "none";
            document.getElementById("close").style.display = "block";
            document.getElementById("save").style.display = "block";




        }

        function close() {
            document.getElementById("form-container").style.display = "none";
            document.getElementById("update").style.display = "block";
            document.getElementById("close").style.display = "none";
            document.getElementById("save").style.display = "none";

        }

        function submitForm(event) {
            event.preventDefault(); // Prevent the default form submission

            var form = document.getElementById('sendForm');
            var about = document.getElementById('about').value;
            var firstName = document.getElementById('firstName').value;
            var lastName = document.getElementById('lastName').value;
            var Country = document.getElementById('Country').value;

            var confirmAction = confirm("Are you sure ");

            if (confirmAction) {
                // Submit the form
                form.submit();
            } else {
                alert("Operation canceled.");
            }
        }

        function renderImage() {
            var input = document.getElementById('newProfilePicture');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>