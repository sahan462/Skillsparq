<div class="feedbackCard">

    <div class="feedbackRow" style="display:flex;justify-content:space-between;align-items:center;">
        <div class="profile">
            <img src="./assests/images/profilePictures/<?php echo $row['profile_pic']?>" alt="Profile Picture">
            <div class="username"><?php echo $row['first_name'] ." ". $row['last_name'] ?></div>
        </div>

        <div class="ratings">
            <div class="rating">
                <!-- Star rating component -->
                <div class="stars" data-rating="<?php echo $row['rating'] ?>"></div>
                <!-- Rating text -->
                <div class="rating-text">Rating: <?php echo $row['rating'] ?></div>
            </div>
        </div>
    </div>

    <!-- Feedback text -->
    <div class="feedback-text">
        <?php echo $row['feedback_text']?>    
    </div>

    <!-- Feedback created date -->
    <div class="created-date"><?php echo $row['feedback_date']?>  </div>
</div>
