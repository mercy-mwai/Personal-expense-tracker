<?php
require_once "expense.php";
if(isset($_POST["add-expense"])){

$amount = filter_input(INPUT_POST, "amount",FILTER_VALIDATE_FLOAT );

$categoryId=filter_input(INPUT_POST, "category_id", FILTER_VALIDATE_INT);
$date= filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);
$description =filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


if($amount !== false && $categoryId !==false && !empty($date)){
    echo "Valid Input";

    $expense = new Expense();
    $result = $expense->save($amount, $categoryId, $date, $description);

     if ($result === true) {
            echo "Expense saved successfully.";
        } else {
            echo $result; 
        }

}else{
    echo "Invalid Input . Please check your data";
}

}

$expense = new Expense();
$allExpenses = $expense->getAll();

foreach ($allExpenses as $item) {
    echo $item['amount'] . " - " . $item['category_id'] . "<br>";
}


?>