<?php
require_once "Expense.php";
require_once "ExpensesController.php";

$expense = new Expense();
$allExpenses = $expense->getAll();

echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>Amount</th>
        <th>Category</th>
        <th>Date</th>
        <th>Description</th>
      </tr>";

foreach ($allExpenses as $item) {
    echo "<tr>";
    echo "<td>" . $item['amount'] . "</td>";
    echo "<td>" . $item['category_id'] . "</td>"; 
    echo "<td>" . $item['date'] . "</td>";
    echo "<td>" . $item['description'] . "</td>";
    echo "</tr>";
}

echo "</table>";



?>