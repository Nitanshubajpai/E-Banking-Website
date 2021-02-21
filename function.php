<?php

function OpenCon(){

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "bank";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
 }
 
function CloseCon($conn)
 {
    $conn -> close();
 }
    $conn = OpenCon();  

function signup($name, $email, $balance){
$conn = OpenCon(); 

if(!empty($name) && !empty($email) && !empty($balance)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $check = "SELECT * FROM `customer` WHERE email = '$email'";
        $check_email = $conn -> query($check);

        if(mysqli_num_rows($check_email)){
            return ['errorMessage' => 'This Email Address is already registered. Please Try another.'];
        }
        else{
            $sql = "INSERT INTO `customer` (name, email, balance) VALUES('$name', '$email', '$balance')";
            if($conn->query($sql)){
            return ['successMessage' => 'Customer created Successfully'];               
            }
        }
    }
    else{
        return ['errorMessage' => 'Invalid email address!'];
    }    
}
else{
    return ['errorMessage' => 'Please fill in all the required fields.'];
} 
}

function maketransaction($senderid, $receiverid, $amount){
    $conn = OpenCon(); 
    if ((!empty($senderid)) && (!empty($receiverid)) && (!empty($amount))){
        $sql = "INSERT INTO `trans` (`senderid`, `rcverid`, `amountransfered`) VALUES('$senderid', '$receiverid', '$amount')";
        $sql1 = "SELECT `balance` FROM `customer` WHERE id = '$receiverid'";
        $rcv = $conn->query($sql1);
        $rcvmoney = $rcv->fetch_assoc();
        $sql4 = "SELECT * FROM `customer` WHERE id = '$senderid'";
        $snd =  $conn->query($sql4);
        $sndmoney = $snd->fetch_assoc();
        
        if($conn->query($sql)){
            $tempamt = $rcvmoney['balance'] + $amount;
            $reduced = $sndmoney['balance'] - $amount;
            $sql2 = "UPDATE `customer` SET `balance` = $tempamt WHERE `id` = '$receiverid' ";
            $sql3 = "UPDATE `customer` SET `balance` = $reduced WHERE `id` = '$senderid' ";
            $conn->query($sql2);
            $conn->query($sql3);
            return ['successMessage' => 'Transfered Successfully'];    
        }
        else{
            return ['errorMessage' => 'Error While tranfer, Please Try again later.'];
    }
    }
    
}

function showalluser(){
    $conn = OpenCon(); 
    $check = "SELECT * FROM `customer`" ;
    $users = mysqli_query($conn, $check);
    return mysqli_fetch_all($users, MYSQLI_ASSOC);
}


?>
