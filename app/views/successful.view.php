<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfull</title>
    <style>
        .succcessContainer{
            height:  100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .success{
            color:green;
            font-weight:600;
            font-size: 18px;
            font: 400 18px / 24px Macan, Helvetica Neue, Helvetica, Arial, sans-serif;
        }
        .im{
            margin-left:35px;
        }
        .succcessContainer .buttonType-1 {
            width: fit-content;
            padding: 8px;
            font-weight: 500;
            /* font-size: 18px; */
            text-align: center;
            color: #fff;
            border-radius: 8px;
            border: none;
            transition: ease-in-out 0.3s;
            background-color: #31d65a;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="succcessContainer">
    <img class="im" width="200px" src="<?php echo BASEURL.'assests/images/success.png';?>" alt="img">
    <p class='success'><?php echo $data['message']?></p>
    <a style="text-decoration: none;" href="<?php echo $data['redirectURL'] ?>"><div class="buttonType-1">Continue</div></a>
    </div>
</body>
</html>