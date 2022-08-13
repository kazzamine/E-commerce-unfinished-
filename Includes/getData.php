<?php 
require './config.inc.php';
$prodlist=array();
$data=$conn->query(' select distinct idprd, count(idprd) as total from buy group by idprd');
if($data->num_rows>0){
    while($row=$data->fetch_assoc()){
        $prodlist[$row['idprd']]=$row["total"];
    }
}
echo json_encode($prodlist);