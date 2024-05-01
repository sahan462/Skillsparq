<?php 
    if($_SESSION['role'] === "Seller"){
        include "components/sellerHeader.component.php"; 
    }else if($_SESSION['role'] === "Buyer"){
        include "components/buyerHeader.component.php"; 
    }
?>

<?php 
$topic = $data['Title'];
$categoryGigs = $data['categoryGigs'];
?>

<h2 style="margin:32px;"> 
<?php echo $topic?>
</h2>

<!--  -->

<!-- Main Container -->
<div class="mainContent" style="margin:32px;">

    <!--Container 1  -->
    <div class="recentGigs" id="content">
        <div class="recentGigsContent">
            <?php foreach($categoryGigs as $row){
                include "components/GigCard.component.php";
            }?>
        </div>
    </div>
</div>

<?php include "/xampp/htdocs/skillsparq/app/views/components/footer.component.php";?>