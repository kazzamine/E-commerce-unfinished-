<?php 
require_once './config.inc.php';
try{


$getCat=$conn->query("SELECT type FROM categories");
if($getCat->num_rows>0){
    while($row=$getCat->fetch_all()){
        echo "<a class='sidebar_item'>".$row["type"]."</a>";
    }
}
}catch(Exception $ex){
    echo $ex->getMessage();
}
?>