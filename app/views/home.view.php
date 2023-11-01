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
        <div class="upperHeader">
            <div class="logo">
                <a href="./home">SKILLSPARQ</a>
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
                <div class="searchBar">
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
                        <img src="https://fiverr-res.cloudinary.com/npm-assets/@fiverr/logged_out_homepage_perseus/graphics-design.91dfe44.svg" alt="Graphics &amp; Design" loading="lazy">
                        <div>Graphics &amp; Design</div>
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
                    "Embracing Sri Lankan Excellence, Shaping Global Success"
                    <a href="https://g.co/kgs/CJ2uob"><img src="./assests/images/sl flag.png"></a>
                </div>
                <div class="desc-content">
                    <p>
                        Welcome to our world of talent and opportunity.
                        We're a platform that celebrates the ingenuity
                        and dedication of Sri Lankans. Our mission is
                        to empower local experts to shine on the global
                        stage. Join us and be part of a vibrant community
                        where Sri Lankan talent transforms into global impact.
                        Together, we're rewriting the story of success.
                    </p>
                </div>
            </div>
        </div>

        <div class="topgig-container">
            <div class="topgig-header">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                <h1>Trending Gigs</h1>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </div>
            <div class="card-slider">
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
            </div>
        </div>


        <div class="whyus-container">
            <div class="whyus-description">
                <h2>The best part? Everything.</h2>
                <ul>
                    <li>
                        <h6>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Stick to your budget
                        </h6>
                        <p>Find the right service for every price point. No hourly rates, just project-based pricing.</p>
                    </li>
                    <li>
                        <h6>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Get quality work done quickly
                        </h6>
                        <p>Hand your project over to a talented freelancer in minutes, get long-lasting results.</p>
                    </li>
                    <li>
                        <h6>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Pay when you're happy
                        </h6>
                        <p>Upfront quotes mean no surprises. Payments only get released when you approve.</p>
                    </li>
                    <li>
                        <h6>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Count on 24/7 support
                        </h6>
                        <p>Our round-the-clock support team is available to help anytime, anywhere.</p>
                    </li>
                </ul>
            </div>
            <div class="whyus-image">
                <img src="https://images.unsplash.com/photo-1513258496099-48168024aec0?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="businessman">
            </div>
        </div>

    </div>
    <script src="./assests/js/home.script.js"></script>
</body>

</html>