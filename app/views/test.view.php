<!DOCTYPE html>
<?php 
    show($data);
    $jobs = $data['jobs'];
?>
<!-- Coding By CodingNepal - codingnepalweb.com -->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Responsive Card Slider</title>
        <link rel="stylesheet" href="./assests/css/test.styles.css">
        <link rel="stylesheet" href="./assests/css/jobCard.styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php echo $jobs?>
        <div class="card-slider">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
            </svg>
            <ul class="carousel">
                <li class="card">
                    <div class="img">
                        <img src="https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="card-1">
                    </div>
                    <div class="user-details">
                        <div class="profile-pic">
                            <img src="./assests/images/avishka.jpg" alt="propic-1">
                        </div>
                        <div class="username">
                            <span>Avishka Idunil</span>
                        </div>
                    </div>
                    <div class="gig-details">
                        <div class="rating">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="numeric-rating">4.3</div>
                        </div>
                        <div class="gig-topic">
                            <h3>
                                I will design and develop a professional business website html/css/js
                            </h3>
                        </div>
                        <div class="price">
                            <span>From 5$<span>
                        </div>
                    </div>
                </li>
                <li class="card">
                    <div class="img"><img src="https://images.unsplash.com/photo-1601397922721-4326ae07bbc5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80" alt="card-2"></div>
                    <div class="user-details">
                        <div class="profile-pic">
                            <img src="" alt="propic-1">
                        </div>
                        <div class="username">
                            <span>Chamal Fernando</span>
                        </div>
                    </div>
                    <div class="gig-details">
                        <div class="rating">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="numeric-rating">4.3</div>
                        </div>
                        <div class="gig-topic">
                            <p>
                            I will be online math tutor in algebra geometry and pre calculus
                            </p>
                        </div>
                    </div>
                </li>
                <li class="card">
                    <div class="img">
                        <img src="https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="card-1">
                    </div>
                    <div class="user-details">
                        <div class="profile-pic">
                            <img src="" alt="propic-1">
                        </div>
                        <div class="username">
                            <span>Avishka Idunil</span>
                        </div>
                    </div>
                    <div class="gig-details">
                        <div class="rating">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="numeric-rating">4.3</div>
                        </div>
                        <div class="gig-topic">
                            <p>
                                I will design and develop a professional business website html/css/js
                            </p>
                        </div>
                    </div>
                </li>
                <li class="card">
                    <div class="img"><img src="https://images.unsplash.com/photo-1601397922721-4326ae07bbc5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80" alt="card-2"></div>
                    <div class="user-details">
                        <div class="profile-pic">
                            <img src="" alt="propic-1">
                        </div>
                        <div class="username">
                            <span>Chamal Fernando</span>
                        </div>
                    </div>
                    <div class="gig-details">
                    <div class="rating">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="numeric-rating">4.3</div>
                        </div>
                        <div class="gig-topic">
                            <p>
                            I will be online math tutor in algebra geometry and pre calculus
                            </p>
                        </div>
                    </div>
                </li>
                <li class="card">
                    <div class="img">
                        <img src="https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="card-1">
                    </div>
                    <div class="user-details">
                        <div class="profile-pic">
                            <img src="" alt="propic-1">
                        </div>
                        <div class="username">
                            <span>Avishka Idunil</span>
                        </div>
                    </div>
                    <div class="gig-details">
                    <div class="rating">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="numeric-rating">4.3</div>
                        </div>
                        <div class="gig-topic">
                            <p>
                                I will design and develop a professional business website html/css/js
                            </p>
                        </div>
                    </div>
                </li>
                <li class="card">
                    <div class="img"><img src="https://images.unsplash.com/photo-1601397922721-4326ae07bbc5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80" alt="card-2"></div>
                    <div class="user-details">
                        <div class="profile-pic">
                            <img src="" alt="propic-1">
                        </div>
                        <div class="username">
                            <span>Chamal Fernando</span>
                        </div>
                    </div>
                    <div class="gig-details">
                    <div class="rating">
                        <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="numeric-rating">4.3</div>
                        </div>
                        <div class="gig-topic">
                            <p>
                            I will be online math tutor in algebra geometry and pre calculus
                            </p>
                        </div>
                    </div>
                </li>
                <li class="card">
                    <div class="img">
                        <img src="https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="card-1">
                    </div>
                    <div class="user-details">
                        <div class="profile-pic">
                            <img src="" alt="propic-1">
                        </div>
                        <div class="username">
                            <span>Avishka Idunil</span>
                        </div>
                    </div>
                    <div class="gig-details">
                        <div class="rating">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="numeric-rating">4.3</div>
                        </div>
                        <div class="gig-topic">
                            <p>
                                I will design and develop a professional business website html/css/js
                            </p>
                        </div>
                    </div>
                </li>
                <li class="card">
                    <div class="img"><img src="https://images.unsplash.com/photo-1601397922721-4326ae07bbc5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80" alt="card-2"></div>
                    <div class="user-details">
                        <div class="profile-pic">
                            <img src="" alt="propic-1">
                        </div>
                        <div class="username">
                            <span>Chamal Fernando</span>
                        </div>
                    </div>
                    <div class="gig-details">
                        <div class="rating">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="numeric-rating">4.3</div>
                        </div>
                        <div class="gig-topic">
                            <p>
                            I will be online math tutor in algebra geometry and pre calculus
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg>
        </div>
        <script src="./assests/js/test.script.js"></script>

        <!DOCTYPE html>
        <html>
        <head>
            <style>
                .container {
                    font: 400 16px/24px Macan,Helvetica Neue,Helvetica,Arial,sans-serif;
                    background-color: #ffffff;
                    padding: 32px 16px 32px 16px;
                    border-radius: 10px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    max-width: 600px;
                    margin: 0 auto;
                }
                .header {
                    text-align: center;
                    font-size: 24px;
                    font-weight: bold;
                    margin-bottom: 32px;
                }
                .content {
                    font-size: 16px;
                    color: #333;
                }
                .methods{
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    margin-top: 32px;
                    margin-bottom: 32px;
                }
                p{
                    margin: 0;
                    margin-bottom: 16px;
                }
                .btn {
                    display: inline-block;
                    width: 200px;
                    text-align: center;
                    margin-bottom: 16px;
                    padding: 10px 20px;
                    background-color: #4CAF50;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    font-size: 16px;
                    text-decoration: none;
                    cursor: pointer;
                }
                .otp {
                    background-color: #4CAF50;
                    text-align: center;
                    width: 200px;
                    color: #fff;
                    font-size: 20px;
                    font-weight: bold;
                    border-radius: 5px;
                    display: inline-block;
                    padding: 10px;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header' style='text-align: center; font-size: 24px; font-weight: bold;'>Welcome to SKILLSPARQ</div>
                <div class='content' style='font-size: 16px; color: #333;'>
                    <p>Hello $fisrtName $lastName,</p>
                    <p>Please confirm that you want to use this email address as your SKILLSPARQ $role account email address. You can do it in one of two ways:</p>
                    <div class="methods">
                        <p>Click the button below to verify your email address:</p>
                        <a href='$link' class='btn' style='padding: 10px 20px; background-color: #31d65a; color: #fff; border: none; border-radius: 5px; font-size: 16px; text-decoration: none; cursor: pointer;'>Verify My Email Address</a>
                        <p>Enter the following OTP to complete the verification:</p>
                        <p class='otp' style='background-color: #31d65a; color: #fff; font-size: 20px; font-weight: bold; border-radius: 5px; display: inline-block; padding: 10px;'>$otp</p>
                    </div>
                    <p>Thank you for joining SKILLSPARQ.</p>
                </div>
            </div>
        </body>
        </html>


    </body>
</html>