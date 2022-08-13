<?php require_once './header.php';
    require_once "./Pages/side_menu.php";
?>

    <div class="content col-md-9 container-fluid row" id="prodbyCat">
   <?php 
   require_once './Includes/config.inc.php';
   $categorie=$_GET["cat"];
       $getProducts=$conn->query("select i.image_prod,p.products_name,p.brand,p.price,p.id_prod from product p inner join productimg i on p.id_prod=i.id_product where p.id_cat =(select id from categories where type='".$categorie."') or p.typeid =(select idType from clothetype where typeName='".$categorie."') ;");
       if($getProducts->num_rows>0){
           echo '<div class="row container-fluid ">';
           while($row=$getProducts->fetch_assoc()){
               echo '
               <div class="col-md-2">
               <div class="card">
               <a class="checkSign" href="showProdInfo.php?prodi='.$row["id_prod"].'">
                   <img class="card-img-top prodImg" src="data:image/jpeg;base64,';echo base64_encode($row['image_prod']);
               echo '" />
               </a>
               <div class="card-body">
               <h5 class="card-title"><a class="checkSign" href="showProdInfo.php?prodi='.$row["id_prod"].'">';echo $row['products_name'];
               echo '</a></h5> 
               <span>brand:';
               echo $row["brand"];
               echo' </span> <br>
               <span class="card-text">';
               echo $row["price"]
               ;
               echo' $</span>
               </div>
               </div>
               </div>
               '
               ;
           }
           echo '</div>';
       }else{
           echo "walo";
       }
   
   ?>
    </div>

<?php require_once './footer.php' ;?>