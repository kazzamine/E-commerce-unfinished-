<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">    
    <link rel="stylesheet" href="./Style/index.css">
    <link rel="stylesheet" href="./Style/prodInfo.style.css">
    <title>buyIT</title>
    <link rel = "icon" href="./images/logo.png" type = "image/x-icon">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent navbar-fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="./images/logo.png" width="60px" height="40px" alt=""> <span id="brandName"> buy<i style="color:#eeeeee;">IT</i></span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 offset-md-6">
        <li class="nav-item">
          <a class="nav-link active menu" aria-current="page" id="home" href="index.php"> <i class="fas fa-house"> </i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu " href="#" id="navbarDropdown" aria-expanded="false">
          <i class="fas fa-bars"> </i> Become a seller
          </a>
         
        </li>
        <li class="nav-item">
          <a class="nav-link menu" id="Shoppingkart" href="#"><i class="fas fa-cart-shopping"> </i> Shopping kart</a>
        </li>

       <?php 
       require_once "./Includes/config.inc.php";
       if(!isset( $_SESSION['id'])){
       ?>
        <li class="nav-item" id="user" >
          <a class="nav-link menu" id="Login" href="./login.php"> <i class="fas fa-arrow-right-to-bracket"> </i> Login/Signup</a>
        </li>
    <?php 
       }else{
    ?> 
        <li class="nav-item" id="userinfo">
          <a class="nav-link menu" id="account" href="./login.php"><i class="fas fa-user"> </i> <?php 
           echo $_SESSION['First_name']." ".$_SESSION['Last_name'];
          ?></a>
        </li>
        <li class="nav-item" id="logout" >
          <a class="nav-link menu" id="logOut" href="#"><i class="fas fa-arrow-right-from-bracket"> </i></a>
        </li>
      <?php }?>
      </ul>
    </div>
  </div>
</nav>
<div id="mainSEC" class="row">
<div class="sidebar col-md-2">
    <?php 
        require_once './Includes/config.inc.php';
        try{
            $getCat=$conn->query("SELECT type FROM categories");
            if($getCat->num_rows>0){
                while($row=$getCat->fetch_assoc()){
                    if($row["type"]=="clothe"){
                        echo '<div class="dropdown">
                        <a href="./showProdBycat.php?cat='.$row["type"].'" class="sidebar_item">'.$row["type"].'</a>
                        <div class="dropdown-content">
                        ';
                        $getTypes=$conn->query("SELECT typeName FROM clothetype");
                         if($getTypes->num_rows>0){
                        while($rowt=$getTypes->fetch_assoc()){
                                echo "<a  href='./showProdBycat.php?cat=".$rowt["typeName"]."' name='sidebar_item' class='sidebar_item'>".$rowt['typeName']."</a>";
                         }}
                         echo '            
                        </div>
                      </div>';
                        continue;
                    }
                    echo "<a class='sidebar_item'  name='sidebar_item'  href='./showProdBycat.php?cat=".$row["type"]."'>".$row["type"]."</a>";
                }
            }
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    ?>
</div>


