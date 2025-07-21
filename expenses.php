<?php
require_once "Expense.php";
require_once "ExpensesController.php";

$expense = new Expense();
$allExpenses = $expense->getAll();

foreach ($allExpenses as $item) {
    echo $item['amount'] . " - " . $item['category_id'] . $item["date"] . $item["description"]."<br>";
}


?>