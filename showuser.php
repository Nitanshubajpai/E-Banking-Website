<?php
    require 'function.php';
    $rows = showalluser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Bank</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div class="infobox">
        <div class="home" style="text-align:center;">
                <button class="btn btn-outline-primary btn-md ml-auto" onclick="location.href='index.html'">Home</button>
            </div>
        <div class="row">
        <?php foreach($rows as $row){ ?>
        <div class="card col-5" style="width: 30%; margin: 4%;">
            <div style="font-weight: bold; font-size: 25px; margin:3%; text-align: center">
                <?php echo $row['name'];?>
            </div>
            <hr class="hr-primary">
            <div class="card-body" style="text-align: center">
                <h5 class="card-text">Balance: <?php echo $row['balance']?></h6>
                <p class="card-text">Email: <?php echo $row['email']?></p>
                <a href="transaction.php?senderid=<?php echo $row['id'];?>" class="btn btn-primary">Make Transaction</a>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>
</body>