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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
    <title>Admin Dashboard Panel</title>
</head>

<body>
    <div>
        <div id="makepdf">

            <div class="boxes">
                <div class="box box1">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="text">Total Users</span>
                    <span class="number"><?php echo $userType['users']; ?></span>
                </div>
                <div class="box box2">
                    <i class="uil uil-comments"></i>
                    <span class="text">Total Orders</span>
                    <span class="number"><?php echo $order['orders'] ?></span>
                </div>
                <div class="box box3">
                    <i class="uil uil-share"></i>
                    <span class="text">Total Share</span>
                    <span class="number">10,120</span>
                </div>
            </div>
            <div class="boxes">
                <div class="subChart">
                    <canvas id="monthlyUsers"></canvas>
                </div>
                <div class="subChart">
                    <canvas id="orderState"></canvas>
                </div>
                <div class=" subChart">
                    <canvas id="orderStatePrev"></canvas>
                </div>
                <div class=" subChart">
                    <canvas id="userType"></canvas>
                </div>


            </div>




        </div>
        <button onclick="generatePDF">Download</button>




    </div>

</body>

</html>

<script>
    function generatePDF() {
        var pdfObject = jsPDFInvoiceTemplate.default(props);
        console.log("object created:", pdfObject);
    }


    var props = {
        outputType: jsPDFInvoiceTemplate.OutputType.Save,
        returnJsPDFDocObject: true,
        fileName: "Invoice 2021",
        orientationLandscape: false,
        compress: true,
        logo: {
            src: "https://raw.githubusercontent.com/edisonneza/jspdf-invoice-template/demo/images/logo.png",
            type: 'PNG', //optional, when src= data:uri (nodejs case)
            width: 53.33, //aspect ratio = width/height
            height: 26.66,
            margin: {
                top: 0, //negative or positive num, from the current position
                left: 0 //negative or positive num, from the current position
            }
        },
        stamp: {
            inAllPages: true, //by default = false, just in the last page
            src: "https://raw.githubusercontent.com/edisonneza/jspdf-invoice-template/demo/images/qr_code.jpg",
            type: 'JPG', //optional, when src= data:uri (nodejs case)
            width: 20, //aspect ratio = width/height
            height: 20,
            margin: {
                top: 0, //negative or positive num, from the current position
                left: 0 //negative or positive num, from the current position
            }
        },
        business: {
            name: "Business Name",
            address: "Albania, Tirane ish-Dogana, Durres 2001",
            phone: "(+355) 069 11 11 111",
            email: "email@example.com",
            email_1: "info@example.al",
            website: "www.example.al",
        },
        contact: {
            label: "Invoice issued for:",
            name: "Client Name",
            address: "Albania, Tirane, Astir",
            phone: "(+355) 069 22 22 222",
            email: "client@website.al",
            otherInfo: "www.website.al",
        },
        invoice: {
            label: "Invoice #: ",
            num: 19,
            invDate: "Payment Date: 01/01/2021 18:12",
            invGenDate: "Invoice Date: 02/02/2021 10:17",
            headerBorder: false,
            tableBodyBorder: false,
            header: [{
                    title: "#",
                    style: {
                        width: 10
                    }
                },
                {
                    title: "Title",
                    style: {
                        width: 30
                    }
                },
                {
                    title: "Description",
                    style: {
                        width: 80
                    }
                },
                {
                    title: "Price"
                },
                {
                    title: "Quantity"
                },
                {
                    title: "Unit"
                },
                {
                    title: "Total"
                }
            ],
            table: Array.from(Array(10), (item, index) => ([
                index + 1,
                "There are many variations ",
                "Lorem Ipsum is simply dummy text dummy text ",
                200.5,
                4.5,
                "m2",
                400.5
            ])),
            additionalRows: [{
                    col1: 'Total:',
                    col2: '145,250.50',
                    col3: 'ALL',
                    style: {
                        fontSize: 14 //optional, default 12
                    }
                },
                {
                    col1: 'VAT:',
                    col2: '20',
                    col3: '%',
                    style: {
                        fontSize: 10 //optional, default 12
                    }
                },
                {
                    col1: 'SubTotal:',
                    col2: '116,199.90',
                    col3: 'ALL',
                    style: {
                        fontSize: 10 //optional, default 12
                    }
                }
            ],
            invDescLabel: "Invoice Note",
            invDesc: "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.",
        },
        footer: {
            text: "The invoice is created on a computer and is valid without the signature and stamp.",
        },
        pageEnable: true,
        pageLabel: "Page ",
    };



    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    var currentDate = new Date();
    var currentMonthIndex = currentDate.getMonth();
    var rearrangedMonths = months.slice(currentMonthIndex + 1).concat(months.slice(0, currentMonthIndex + 1));

    var monthlyUsers = [];
    var monthComplaints = [];

    <?php
    foreach ($monthlyUsers as $month) {
        echo "monthlyUsers.push('$month');"; // Use push to add each month to the JavaScript array
    } ?>

    var barColors = ["red", "green", "blue", "orange", "brown"];

    new Chart("monthlyUsers", {
        type: "line",
        data: {
            labels: rearrangedMonths,
            datasets: [{
                fill: false,
                borderColor: 'green',
                data: monthlyUsers
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "New Users Joined"
            }
        }
    });
    <?php

    $orderNumbers = [
        $order['accepted_count'],
        $order['running_count'],
        $order['requested_count'],
        $order['cancelled_count'],
        $order['late_count'],
        $order['completed_count']
    ];

    $orderJSON = json_encode($orderNumbers);
    ?>
    var orderArray = <?php echo $orderJSON ?>


    new Chart("orderState", {
        type: "pie",
        data: {
            labels: ['accepted', 'running', 'requested', 'cancelled', 'late', 'completed'],
            datasets: [{
                backgroundColor: barColors,
                data: orderArray
            }]
        },
        options: {
            title: {
                display: true,
                text: "orderState This Month (<?php echo date('m') . " 20" . date('y') ?>)"
            }
        }
    });
    <?php
    $orderNumbers = [
        $orderprev['accepted_count'],
        $orderprev['running_count'],
        $orderprev['requested_count'],
        $orderprev['cancelled_count'],
        $orderprev['late_count'],
        $orderprev['completed_count']
    ];

    $orderJSON = json_encode($orderNumbers); ?>
    var orderArrayprev = <?php echo $orderJSON ?>


    new Chart("orderStatePrev", {
        type: "pie",
        data: {
            labels: ['accepted', 'running', 'requested', 'cancelled', 'late', 'completed'],
            datasets: [{
                backgroundColor: barColors,
                data: orderArrayprev
            }]
        },
        options: {
            title: {
                display: true,
                text: "orderState Previous Month (0<?php echo (date('m') == 1) ? 12 : date('m') - 1; ?>  <?php echo (date('m') == 1) ? date('Y') - 1 : date('Y'); ?>)"

            }
        }
    });

    <?php
    $datachart4 = [
        $userType['seller'], $userType['buyer'], $userType['csa'], $userType['admin']
    ];

    $orderJson = json_encode($datachart4);

    ?>

    var userType = <?php echo $orderJson ?>;
    new Chart("userType", {
        type: "bar",
        data: {
            labels: ['seller', 'buyer', 'csa', 'admin'],
            datasets: [{
                backgroundColor: barColors,
                data: userType
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "User Types"
            }
        }
    });
</script>