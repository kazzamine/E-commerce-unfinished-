<?php
require_once "./config.inc.php";

$email=$conn->real_escape_string( $_POST["email"]);
$mdp=hash('sha256', $conn->real_escape_string($_POST["mdp"]));
try{
$checkInfos="SELECT level,id,Last_name,First_name FROM login INNER JOIN user on user.email=login.email WHERE user.activation=1 AND login.email='".$email."' AND login.password='".$mdp."'";
$res=$conn->query($checkInfos);
if($res->num_rows>0){
    while($row = $res->fetch_assoc()) {
        $_SESSION['id']=$row['id'];
        $_SESSION['Last_name']=$row['Last_name'];
        $_SESSION['First_name']=$row['First_name'];
        if(isset($_GET['location'])){
            header("Location:". $_GET['location']);
        }
        echo $row['level'];
}
}else{
    echo "<span class='alert alert-danger'>user doesn't existe please verify your informtion</span>";
}
}catch(Exception $ex){
    echo $ex->getMessage()." Try again Later";
}