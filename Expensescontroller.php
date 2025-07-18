<?php

if(isset($_POST["add-expense"])){

$amount = filter_input(INPUT-POST, "amount",FILTER-VALIDATE-FLOAT );

$categoryId=filter_input(INPUT-POST, "category-id", FILTER-VALIDATE-INT);
$date= filter_input(INPUT-POST, "date", FILTER-SANITIZE-STRING);
$description =filter_input(INPUT-POST, "description", FILTER_SANITIZE_FULL-SPECIAL_CHARS);


echo $amount;
}


?>