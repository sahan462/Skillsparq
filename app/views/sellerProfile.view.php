<?php include "components/sellerHeader.component.php"; ?>

<?php 
    $data["profilePicture"] = "dummyprofile.jpg";
?>

<div class="container">
    <div class="profile-container">
        <div class="profile-header">
            <div class="seller">
                <img src="../public/assests/images/<?php echo $data["profilePicture"]?>" alt="pro-pic">
            </div>
            <div class="seller-functions">

            </div>
        </div>
        <div class="seller-details">
            <div class="personal-information"></div>
            <div class="seller-professionalPulse"></div>
        </div>
    </div>
</div>


<?php include "components/footer.component.php"; ?>