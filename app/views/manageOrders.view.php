<?php include "components/sellerHeader.component.php";?>

<!-- Main Container -->
<div class="manageOrdersContainer">

    <!-- Topic -->
    <div class="manageOrdersHeader">
        Manage Orders
    </div>

    <!-- Content -->
    <div class="manageOrdersContent">
        <!-- Tab links -->
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')">Requests</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Accepted</button>
            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Rejected</button>
        </div>

        <!-- Tab content -->
        <div id="London" class="tabcontent">
            <h3>Requests</h3>
            <p>London is the capital city of England.</p>
        </div>

        <div id="Paris" class="tabcontent">
            <h3>Accepted</h3>
            <p>Paris is the capital of France.</p>
        </div>

        <div id="Tokyo" class="tabcontent">
            <h3>Rejected</h3>
            <p>Tokyo is the capital of Japan.</p>
        </div>

    </div>
</div>

<script src="/skillsparq/public/assests/js/manageOrders.script.js"></script>

<?php include "components/footer.component.php";?>