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
                                            <img class="profile_img" src="https://source.unsplash.com/600x300/?student" alt="student dp">
                                            <h3><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName'] ?></h3>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0"><strong class="pr-1">User ID:</strong><?php echo $_SESSION['userId'] ?></p>
                                            <p class="mb-0"><strong class="pr-1">User Name:</strong><?php echo $_SESSION['userName'] ?></p>
                                            <p class="mb-0"><strong class="pr-1">User Email:</strong><br><?php echo $_SESSION['email'] ?></p>
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
                    <div> <button style="margin-left: 25%;">Update </button></div>
                    <!-- partial -->

                </div>
            </div>
        </div>
    </section>



    <!-- Analytics -->

</body>

</html>