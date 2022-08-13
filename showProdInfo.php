<?php require_once 'header.php';
    require_once "./Includes/config.inc.php";
    require "./Includes/checkifsign.php";
?>

    <div class="ProdInfo col-md-9 content container-fluid row">
    <div id="imgContainer">
    	 <div class="slideshow-container">
            <?php 
                  $prodid=$_GET["prodi"];
                  $getProdInfo=$conn->query("select image_prod from productimg where id_product='".$prodid."';");
                  if($getProdInfo->num_rows>0){
                      while($row=$getProdInfo->fetch_assoc()){

                          echo '
                          <div class="mySlides fade">
                          
                          <img src="data:image/jpeg;base64,'; echo base64_encode($row['image_prod']);
                          echo '" style="width:400px" height="500px"> 
                          </div>
                          ' ;
                      }
                  }
            ?>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

        
        </div>
    </div>
    <div id="infoContainer">
     <?php
        
        $getProdInfo=$conn->query("SELECT p.products_name,p.price,p.quantity,p.brand,p.added_date,p.description from product p where p.id_prod='".$prodid."';");
        if($getProdInfo->num_rows>0){
            while($row=$getProdInfo->fetch_assoc()){
                echo '<br><br><br>
                <span id="prodname" class="infoProd"> '.$row["products_name"].'</span> <br>
                ';
            }
        }
    ?>
     </div>
    </div>

<?php require_once 'footer.php' ;?>
<script src="./JS/prodInfo.js"></script>