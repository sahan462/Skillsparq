<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #imageUploader {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .upload-container {
            margin-bottom: 20px;
        }

        .upload-container label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .upload-container input[type="file"] {
            display: none;
        }

        .image-preview {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .image-preview img {
            max-width: 70px;
            max-height: 70px;
            border-radius: 4px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div id="imageUploader">
    <div class="upload-container">
        <label for="coverImage">Upload Cover Image:</label>
        <input type="file" id="coverImage" accept="image/*" onchange="previewImage(this, 'cover')">
    </div>

    <div class="upload-container">
        <label for="sliderImage1">Upload Slider Image 1:</label>
        <input type="file" id="sliderImage1" accept="image/*" onchange="previewImage(this, 'slider1')">
    </div>

    <div class="upload-container">
        <label for="sliderImage2">Upload Slider Image 2:</label>
        <input type="file" id="sliderImage2" accept="image/*" onchange="previewImage(this, 'slider2')">
    </div>

    <div class="upload-container">
        <label for="sliderImage3">Upload Slider Image 3:</label>
        <input type="file" id="sliderImage3" accept="image/*" onchange="previewImage(this, 'slider3')">
    </div>

    <div class="upload-container">
        <label for="sliderImage4">Upload Slider Image 4:</label>
        <input type="file" id="sliderImage4" accept="image/*" onchange="previewImage(this, 'slider4')">
    </div>

    <div class="image-preview">
        <img id="previewCover" alt="Cover Image Preview">
        <img id="previewSlider1" alt="Slider Image 1 Preview">
        <img id="previewSlider2" alt="Slider Image 2 Preview">
        <img id="previewSlider3" alt="Slider Image 3 Preview">
        <img id="previewSlider4" alt="Slider Image 4 Preview">
    </div>
</div>

<script>
    function previewImage(input, imageType) {
        const preview = document.getElementById(`preview${capitalizeFirstLetter(imageType)}`);

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
</script>

</body>
</html>

<?php 
    $data['profilePicture'] = "avishka.jpg";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKILLSPARQ</title>
    <link rel="stylesheet" href="./assests/css/buyerHeader.styles.css">
    <link rel="stylesheet" href="./assests/css/cardSlider.styles.css">
    <link rel="stylesheet" href="./assests/css/jobCard.styles.css">
    <link rel="stylesheet" href="./assests/css/buyerDashboard.styles.css">
    <link rel="stylesheet" href="./assests/css/displayGig.styles.css">
    <link rel="stylesheet" href="./assests/css/profile.styles.css">
    <link rel="stylesheet" href="./assests/css/footer.styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>

    <div class = "upperHeader">
        <div class="logo">
            <a href="#"><span>SKILLSPARQ</span></a>
        </div>
        <div class = "searchBar">
            <form action="">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="navbar" >
            <nav>
                <ul class="nav-links">
                    <div class="svgLinks">
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                                </svg>
                                <div class="notificationSign"></div>
                            </a>
                        </li>
                        <li>
                            <a href="chat">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                                <div class="notificationSign"></div>
                            </a>
                        </li>
                    </div>
                    <div class="wordLinks">
                        <li><a href="buyerDashboard" class="wordLink">Home</a></li>
                        <li><a href="manageOrders" class="wordLink">Orders</a></li>
                        <li><a href="loginUser/logout" class="wordLink">Sign Out</a></li>
                    </div>

                    <li class="imgLinks">
                        <a href="buyerProfile" class="imgLink">
                            <img src="../public/assests/images/<?php echo $data["profilePicture"]?>" alt="pro-pic">
                            <div class="loginSign"></div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class = "headerCategories">
        <nav>
            <ul class="nav-links">
                <li><a href="#" class="wordLink">Graphics & Design</a></li>
                <li><a href="#" class="wordLink">Programming & Tech</a></li>
                <li><a href="#" class="wordLink">Digital Marketing</a></li>
                <li><a href="#" class="wordLink">Video & Animation</a></li>
                <li><a href="#" class="wordLink">Writing & Translation</a></li>
                <li><a href="#" class="wordLink">Music & Audio</a></li>
                <li><a href="#" class="wordLink">Business</a></li>
                <li><a href="#" class="wordLink">Data</a></li>
                <li><a href="#" class="wordLink">Photography</a></li>
                <li><a href="#" class="wordLink">AI Services</a></li>
            </ul>
        </nav>
    </div>



</header>
