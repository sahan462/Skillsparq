<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 12px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0px 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
.type-1{
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

<button class="collapsible"><?php echo ucwords(strtolower($row['inquiry_type']))?> Id: #<?php echo $row['inquiry_id']?></button>
<div class="content" style="margin-bottom: 16px;">
    <div class="type-1">
        Inquiry : 
    </div>
    <p style="color:#333;margin-bottom:16px"><?php echo $row['description']?></p>

    <div class="type-1">
        Response :
    </div>
    <p style="color:#333;margin-bottom:16px"><?php echo $row['response']?></p>

    <div class="type-1">
        Created Date :
    </div>
    <p style="color:#333;margin-bottom:16px"><?php echo $row['created_at']?></p>

    <?php if ($row['inquiry_status'] == 'solved'){ ?>
        <a href=""><button style="margin-bottom:16px;">Remove</button></a>
    <?php }?>

</div>


</body>
</html>
