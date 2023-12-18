<div class="card-slider">
    <ul class="carousel">
        <?php 
            $i = 0;
            while ($i < 10) { ?>
                <li class="card">

                    <!-- Cover Image -->
                    <div class="coverImg">
                        <img src="https://images.unsplash.com/photo-1633356122544-f134324a6cee?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="card-1">
                    </div>

                    <!-- User Details -->
                    <div class="user-details" >
                        <div class="cardRow" style="align-items: center;">
                            <div class="profile-pic">
                                <img src="./assests/images/avishka.jpg" alt="propic-1">
                            </div>
                            <div class="cardRow" style="flex-direction: column;">
                                <div class="username">
                                    <span>Avishka Idunil</span>
                                </div>
                                <div class="rating">
                                    <div class="star-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <div class="numeric-rating">(4.3)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gig-details">
                        <div class="gigDescription">
                            I will design and develop a professional business website html/css/js
                            I will design and develop a professional business website html/css/js
                            I will design and develop a professional business website html/css/js
                        </div>
                        <div class="price">
                            <b><span>From 5$<span></b>
                        </div>
                    </div>

                </li>

            <?php $i = $i + 1;} ?>
            
    </ul>
</div>
