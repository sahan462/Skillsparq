<?php 
    $job = $data['job'];
//    print_r ($job);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Job Details</title>
    <link rel="stylesheet" type="text/css" href="/skillsparq/public/assests/css/displayJob.styles.css">
</head>
<body>
    
    <div class="container">
        <h1 class="job-title"><?php echo $job['title']?></h1>
        <div class="details">
            <div class="job-details">
                <p><strong>Category:</strong> <?php echo $job['category']?></p>
                <p><strong>Deadline:</strong> <?php echo $job['deadline']?></p>
                <p><strong>Published Mode:</strong> <?php echo $job['publish_mode']?></p>
                <p><strong>Amount:</strong> <?php echo $job['amount']?></p>
                <p><strong>Flexible Amount:</strong> <?php if($job['flexible_amount'] == 0){ echo "Not Available";} else{ echo "Available";}?></p>
                <p><strong>Created At:</strong> <?php echo $job['created_at']?></p>
            </div>
            <?php if($job['publish_mode'] == 'Auction Mode'){ ?>
                <div class="auction-details">
                    <div class="job-details">
                        <p><strong>Start:</strong> <?php echo $job['start_time']?></p>
                        <p><strong>End:</strong> <?php echo $job['end_time']?></p>
                        <p><strong>Base Bid:</strong> <?php echo $job['starting_bid']?></p>
                        <p><strong>Min Bid:</strong> <?php echo $job['min_bid_amount']?></p>
                        <p><strong>Current Highest Bid:</strong> <?php echo $job['current_highest_bid']?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="job-description">
            <h2>Job Description</h2>
            <p>
                <?php echo $job['description']?>
            </p>
        </div>
    </div>
</body>
</html>
