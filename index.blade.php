<?php require_once "ExpensesController.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <style>
        form {
            margin: 10px;
            padding-top: 10px;
        }
        input, select, button {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            max-width: 300px;
            display: block;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px 0;
        }
        th, td {
            padding: 8px;
            border: 1px solid black;
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
        Description: <input type="text" name="description" />
        <br />
        <input type="date" name="date" required />
        <br />
        <button type="submit" name="add-expense">Add Expense</button>
    </form>

    <h2>All Expenses</h2>

    <?php
        $expense = new Expense();
        $allExpenses = $expense->getAll();
    ?>

    <table>
        <tr>
            <th>Amount</th>
            <th>Category</th>
            <th>Date</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($allExpenses as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['amount']) ?></td>
                <td><?= htmlspecialchars($item['category_id']) ?></td>
                <td><?= htmlspecialchars($item['date']) ?></td>
                <td><?= htmlspecialchars($item['description']) ?></td>
                <td>
                    <a href="edit.php?id=<?= $item['id'] ?>">✏️ Edit</a> |
                    <a href="delete.php?id=<?= $item['id'] ?>" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
