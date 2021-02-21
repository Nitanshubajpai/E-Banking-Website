<?php
    require 'function.php';
    $rows = showalluser();
    $senderid = trim($_GET['senderid']);
    if(isset($_POST['receiverid']) && isset($_POST['amount']))
{
    
    $receiverid = trim($_POST['receiverid']);
    $amount = trim($_POST['amount']);
    $result = maketransaction($senderid, $receiverid, $amount);
    
}
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

        <hr class="hr-primary">
        <div class="myform">
            <h3>Welcome, <?php foreach($rows as $row){ if($row['id']==$senderid) { echo $row['name'];}} ?></h3><br>
            <form action="" method="POST" validob>
                <div class="row">
                    

                    <div class="form-group col-12">
                        <label for="receiverid">Send To</label>
                            <select class="form-control"  name="receiverid" id="reciever">
                                <?php foreach($rows as $row){?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                <?php } ?>
                            </select>
                    </div>

                    <div class="form-group col-6">
                        <label for="name">Amount</label>
                        <input type="number" id="balance" class="form-control" name="amount" spellcheck="false" placeholder="Amount to be transfered" required>
                    </div>

                    <br>
                    <div class="form-group col-9">
                        <input type="submit" name="submit" id="submit" value="Make Transaction" class="btn btn-outline-success btn-md ml-auto">
                    </div>
                </div>
            </form>
            <?php
                if(isset($result['errorMessage'])){
                echo '<p class="errorMsg">'.$result['errorMessage'].'</p>';
                }
                if(isset($result['successMessage'])){
                echo '<p class="successMsg">'.$result['successMessage'].'</p>';
                }
            ?>
        </div>
    </div>
</body>