<?php

if(isset($_POST["add-expense"])){

$amount = filter_input(INPUT_POST, "amount",FILTER-VALIDATE-FLOAT );

$categoryId=filter_input(INPUT_POST, "category-id", FILTER-VALIDATE-INT);
$date= filter_input(INPUT_POST, "date", FILTER-SANITIZE-STRING);
$description =filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL-SPECIAL_CHARS);

if($amount & $categoryId & $date){
    echo "Valid Input";
}else{
    echo "Invalid Input . Please check your data";
}

}


?>