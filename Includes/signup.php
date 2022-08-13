<?php
require_once "./config.inc.php";

$email=$conn->real_escape_string( $_POST["email"]);
$mdp=hash('sha256', $conn->real_escape_string($_POST["mdp"]));
$cin=$conn->real_escape_string($_POST["cin"]);
$lname=$conn->real_escape_string($_POST["lName"]);
$fname=$conn->real_escape_string($_POST["fName"]);
$dateB=$conn->real_escape_string($_POST["dateB"]);

try{
    $checkExistence="SELECT * FROM user WHERE email='".$email."' OR card_num='".$cin."'";
    $res=$conn->query($checkExistence);
    if($res->num_rows==0){
        $conn->autocommit(false);
        $conn->begin_transaction();
        //create user
       $createUser=$conn->prepare("INSERT INTO user VALUES(?,?,?,?,?,?,1)");
       $id="U-".md5($_POST["cin"]).md5($_POST["fName"]);
       $createUser->bind_param("ssssss",$id,$cin,$fname,$lname,$dateB,$email);

      $createUser->execute();
        //create login for use
      $createLogin=$conn->prepare("INSERT INTO login VALUES(?,?,'user')");
      $createLogin->bind_param("ss",$email,$mdp);
      $createLogin->execute();

       $conn->commit();
       echo "<span class='alert alert-success'>Account created successfully Please check your rmail to activate your account</span>";
   
       
    //    $subject = 'Signup | Verification'; // Give the email a subject 
    //    $message = '
         
    //    Thanks for signing up!
    //    Your account has been created, you can activate your account by pressing the url below.
         
       
         
    //    Please click this link to activate your account:
    //    http://www.yourwebsite.com/verify.php?email='.md5($email).'&mdp='.$password.'
         
    //    '; 
                             
    //    $headers = 'From:buyIT@yourwebsite.com' . "\r\n"; 
    //    mail($email, $subject, $message, $headers); 
    
    
    }else{
        echo "<span class='alert alert-danger'>Account Already exist!!</span>";
    }
    }catch(Exception $ex){
        echo $ex->getMessage()."\n Try again Later";
    }