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
