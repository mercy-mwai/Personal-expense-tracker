<?php require_once "ExpenseController.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {margin:10px;
             padding-top:10px}

         input, select, button {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            max-width: 300px;
            display: block;
        }
    </style>
</head>
<body>
    <h2>Add Expense</h2>
    <form action="" method="POST">
  Amount: <input type="text" name="amount" required />
    <br />
    <select name="category_id" required>
       <option value="1">Rent</option>
       <option value="2">Transport</option>
       <option value="3">Food</option>
    </select>
    <br />
   Description: <input type="text" name="description"  />
    <br />
    <input type="date" name="date" required />
    <br />
    <button type="submit" name="add-expense">Add Expense</button>
    </form>

    <h2>All Expenses</h2>
    <?php
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
    ?>
</body>
</html>
