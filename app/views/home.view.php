<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./assests/css/home.styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap');
    </style>
    </head>
    <body>
        <div class="home-container">

            <!--header-->
            <div class = "upperHeader">
                <div class="logo">
                    <a href="#">SKILLSPARQ</a>
                </div>
                <div class="navbar">
                    <nav>
                        <ul class="nav-links">
                            <li class="wordLink" id="wordLink-1"><a href="register">Become a Seller</a></li>
                            <li class="wordLink" id="wordLink-2"><a href="login">LogIn</a></li>
                            <li>
                                <a href="register"><button>Join</button></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!--image slider-->
            <div class="slider-out-container">
                <div class="header">
                    <span>Find the best freelance service, right away</span>
                    <div class = "searchBar">
                        <form action="">
                            <input type="text" placeholder="Search for any service" name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="slider-container">
                    <div class="slider">
                        <div class="slides">
                            <!--radio buttons-->
                            <input type="radio" name="radio-btn" id="radio1">
                            <input type="radio" name="radio-btn" id="radio2">
                            <input type="radio" name="radio-btn" id="radio3">
                            <input type="radio" name="radio-btn" id="radio4">
                            <!--slide images-->
                            <div class="slide first">
                                <img src="./assests/images/silder image 1.jpeg" alt="image1">
                            </div>
                            <div class="slide">
                                <img src="./assests/images/silder image 2.jpg" alt="image2">
                            </div>
                            <div class="slide">
                                <img src="./assests/images/silder image 3.jpeg" alt="image3">
                            </div>
                            <div class="slide">
                                <img src="./assests/images/silder image 4.webp" alt="image4">
                            </div>
                            <!--automatic navigation-->
                            <div class="navigation-auto">
                                <div class="auto-btn1"></div>
                                <div class="auto-btn2"></div>
                                <div class="auto-btn3"></div>
                                <div class="auto-btn4"></div>
                            </div>

                            <!--manual navigation-->
                            <div class="navigation-manual">
                                <label for="radio1" class="manual-btn"></label>
                                <label for="radio2" class="manual-btn"></label>
                                <label for="radio3" class="manual-btn"></label>
                                <label for="radio4" class="manual-btn"></label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="category-container">
                <h1>You need it, We've got it</h1>
                <div class="categories">
                    <div class="li">
                        <a href="/categories/graphics-design?source=hplo_cat_sec&amp;pos=1">
                            <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/graphics-design.91dfe44.svg" alt="Graphics &amp; Design" loading="lazy"><div>Graphics &amp; Design</div>
                        </a>
                    </div>
                    <div class="li">
                        <a href="/categories/online-marketing?source=hplo_cat_sec&amp;pos=2">
                            <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/online-marketing.a3e9794.svg" alt="Digital Marketing" loading="lazy">Digital Marketing
                        </a>
                    </div>
                    <div class="li">
                        <a href="/categories/writing-translation?source=hplo_cat_sec&amp;pos=3">
                            <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/writing-translation.a787f2f.svg" alt="Writing &amp; Translation" loading="lazy">Writing &amp; Translation
                        </a>
                    </div>
                    <div class="li">
                        <a href="/categories/video-animation?source=hplo_cat_sec&amp;pos=4">
                            <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/video-animation.1356999.svg" alt="Video &amp; Animation" loading="lazy">Video &amp; Animation
                        </a>
                    </div>
                    <div class="li">
                        <a href="/categories/music-audio?source=hplo_cat_sec&amp;pos=5">
                            <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/music-audio.ede4c90.svg" alt="Music &amp; Audio" loading="lazy">Music &amp; Audio
                        </a>
                    </div>
                    <div class="li">
                        <a href="/categories/programming-tech?source=hplo_cat_sec&amp;pos=6">
                            <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/programming.6ee5a90.svg" alt="Programming &amp; Tech" loading="lazy">Programming &amp; Tech
                        </a>
                    </div>
                    <div class="li">
                        <a href="/categories/business?source=hplo_cat_sec&amp;pos=7">
                            <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/business.fabc3a7.svg" alt="Business" loading="lazy">Business
                        </a>
                    </div>
                    <div class="li">
                        <a href="/categories/lifestyle?source=hplo_cat_sec&amp;pos=8">
                            <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/lifestyle.112b348.svg" alt="Lifestyle" loading="lazy">Lifestyle
                        </a>
                    </div>
                    <div class="li">
                        <a href="/categories/data?source=hplo_cat_sec&amp;pos=9">
                            <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/data.855fe95.svg" alt="Data" loading="lazy">Data
                        </a>
                    </div>
                    <div class="li">
                        <a href="/categories/photography?source=hplo_cat_sec&amp;pos=10">
                            <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/photography.0cf5a3f.svg" alt="Photography" loading="lazy">Photography
                        </a>
                    </div>
                </div>
            </div>

            <div class="WhoAreWe-container">
                <div class="image">
                    <img src="./assests/images/whoarewe.jpeg" alt="WhoAreWe" loading="lazy">
                </div>
                <div class="desc">
                    <div class="WhoAreWe-header">
                        Who Are We?
                        <a href="https://g.co/kgs/CJ2uob"><img src="./assests/images/sl flag.png"></a>
                    </div>
                    <div class="desc-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore 
                            magna aliqua. Ultricies lacus sed turpis tincidunt id 
                            aliquet risus. Pellentesque adipiscing commodo elit at
                            imperdiet dui accumsan. Proin fermentum leo vel orci 
                            porta non pulvinar neque. 
                        </p>
                    </div>
                </div>
            </div>

            <div class="topgig-container">
                <div class="topgig-header">
                    <h1>Trending Gigs</h1>
                </div>
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
            </div>


            <div class="whyus-container">

            </div>

        </div>
    <script src="./assests/js/home.script.js"></script>
    </body>
</html>