<?php
$apiUrl='https://catfact.ninja/fact';
$dataFromApi=file_get_contents($apiUrl);
$fact=json_decode($dataFromApi);

echo" <span>fact of the day is : <br>".$fact->fact."</span>";