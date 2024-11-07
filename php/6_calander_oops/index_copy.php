<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calander</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php include 'assets/module/functions.php'; ?>
<div class="container border">
        <div class="container-fluid top_are d-flex justify-content-between p-3">
            <span>
                <span class="btn-group">
                    <a href="index.php?month=<?php echo ($cal->month-1).'&year='.$cal->year;?>" class="btn btn-dark">
                        <i class="fa-solid fa-less-than"></i>
                    </a>
                    <a href="index.php?&month=<?php echo ($cal->month+1).'&year='.$cal->year;?>" class="btn btn-dark">
                        <i class="fa-solid fa-greater-than"></i>
                    </a>
                </span>
                <a href="index.php"><span class="btn btn-dark">today</span></a>
            </span>
            <h3><?php echo $cal->month_name . " " .  $cal->year; ?></h3>
            <span class="btn-group">
                <button class="btn btn-dark" type="button" onclick="month_page();">month</button>
                <button class="btn btn-dark" type="button" onclick="weeks_page();">week</button>
                <button class="btn btn-dark" type="button" onclick="weeks_page();">day</button>
                <button class="btn btn-dark" type="button" onclick="weeks_page();">list</button>
            </span>
        </div>
        <?php 
            // include 'assets/module/month.php';
            // include 'assets/module/week.php';
        ?>
        <div class="show_table"></div>
    </div>
    <script src="assets/js/index.js"></script>
</body>
</html>