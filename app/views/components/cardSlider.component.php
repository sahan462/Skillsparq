<div class="card-slider">
    <ul class="carousel">
        <?php 
            $i = 0;
            while ($i < 10) { ?>
                <li class="card">

                    <!-- Cover Image -->
                    <div class="img">
                        <img src="https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="card-1">
                    </div>

                    <!-- User Details -->
                    <div class="row">
                        
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
                            <p>
                                I will design and develop a professional business website html/css/js
                            </p>
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
                            <img src="./assests/images/chamal.jpg" alt="propic-1">
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
                        <div class="price">
                            <span>From 10$<span>
                        </div>
                    </div>
                </li>
            <?php $i = $i + 1;} ?>
    </ul>
</div>
