<!DOCTYPE html>
<html>
<head>
<style>
.collapsible {
  background-color: #ddd;
  color: #333;
  cursor: pointer;
  padding: 12px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active_1, .collapsible:hover {
  background-color: #555;
  color: #ddd;
}

.collapsible:after {
  content: '\002B';
  color: #333;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active_1:after {
  content: "\2212";
  color: #ddd;
}

.content {
  padding: 0px 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
  border-radius: 8px;
}
.type-3{
    font-weight: 600;
    font-size: 16px;
    color: #404145;
    font-family: Macan, Helvetica Neue, Helvetica, Arial, sans-serif;
}
.collapsible p{
    color: #333;
}
</style>
</head>
<body>

<button class="collapsible">Milestone Id: #<?php echo $row['milestone_id']?></button>
<div class="content" style="margin-bottom: 8px;">
    <div class="type-3">
        Subject : 
    </div>
    <p style="color:#333;margin-bottom:24px"><?php echo $row['subject']?></p>

    <div class="type-3">
        Description :
    </div>
    <p style="color:#333;margin-bottom:16px"><?php echo $row['milestone_description']?></p>

    <div class="row" style="display:flex;width: 100%;align-items:center;justify-content:space-between;margin-bottom:8px;">

        <div class="column">
            <div class="type-3">
                Delivery :
            </div>
            <p style="color:#333;"><?php echo ($row['amount_of_delivery_time'] . " " . $row['time_category'])?></p>
        </div>

        <div class="column">
            <div class="type-3">
                State :
            </div>
            <p style="color:#333;"><?php echo $row['milestone_state']?></p>
        </div>

        <div class="column">
            <div class="type-3">
                Price :
            </div>
            <p style="color:#333;"><?php echo $row['milestone_price']?>USD</p>
        </div>

        <a href="sharePoint&orderId=<?php echo $order['order_id'] ?>&orderType=<?php echo $order['order_type']?>&receiverId=<?php echo $receiverId?>&milestoneId=<?php echo $row['milestone_id']?>"><button class="buttonType-1" style="width:fit-content;float:right;">View SharePoint</button></a>

    </div>
</div>


</body>
</html>























