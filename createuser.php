<?php
require 'function.php';
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['balance']))
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $balance = trim($_POST['balance']);
    $result = signup($name, $email, $balance);
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up form </title>
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
            <h1>Sign up</h1><br>
            <form action="" method="POST" validob>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" class="form-control" name="name" spellcheck="false" placeholder="Enter your full name." required>
                    </div>

                    <div class="form-group col-9">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" spellcheck="false" class="form-control" placeholder="Enter your email address" required>
                    </div>

                    <div class="form-group col-6">
                        <label for="name">Balance</label>
                        <input type="number" id="balance" class="form-control" name="balance" spellcheck="false" placeholder="Initial Balance." required>
                    </div>

                    <br>
                    <div class="form-group col-9">
                        <input type="submit" name="submit" id="submit" value="Sign Up" class="btn btn-outline-success btn-md ml-auto">
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

</html>