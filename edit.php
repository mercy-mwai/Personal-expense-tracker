<?php
require_once "Expense.php";

$expense=new Expense();

if(!isset($_GET['id'])){
    echo " No expense Id provided";
    exist;
}

$id= $_GET['id'];

$expensedata=expense->getById($id);

if(!$expense){
echo "expense not found";
exist;
}
?>
<form action="Expensescontroller.php" method="POST">
    <input type="hidden" name="id" value="<?=htmlspecialchars($expensedata['id']) ?>" />
    <label>Amount:</label>
    <input type="number" step="0.01" name="amount" value="<?=htmlspecialchars($expensedata['amount']) ?> required" />
    <label>Category_id</label>
    <input type="number"  name="category_id" value="<?=htmlspecialchars($expensedata['category_id']) ?> required" />
    <label> Date: </label>
    <input type="date"  name="date" value="<?=htmlspecialchars($expensedata['date'])  ?> required" />
    <label>Description</label>
    <input type="text"  name="description" value="<?=htmlspecialchars($expensedata['description']) ?>" />

    <button type="submit" name= "update_expense"> Update expense</button>
</form>