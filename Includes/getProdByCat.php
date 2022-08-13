<?php 
require_once './config.inc.php';
$categorie=$_POST["cat"];
    $getProducts=$conn->query("select i.image_prod,p.products_name,p.brand,p.price,p.id_prod from product p inner join productimg i on p.id_prod=i.id_product where p.id_cat =(select id from categories where type='".$categorie."') or p.typeid =(select idType from clothetype where typeName='".$categorie."') ;");
    if($getProducts->num_rows>0){
        echo '<div class="row container-fluid ">';
        while($row=$getProducts->fetch_assoc()){
            echo '
            <div class="col-md-2">
            <div class="card">
            <a href="#">
                <img class="card-img-top prodImg" src="data:image/jpeg;base64,';echo base64_encode($row['image_prod']);
            echo '" />
            </a>
            <div class="card-body">
            <h5 class="card-title"><a href="#">';echo $row['products_name'];
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

