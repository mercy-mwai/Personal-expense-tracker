<?php
require_once "Expense.php";

if(isset($_GET['id'])){
$id =(int) $_GET['id'];

$expense =new Expense();
$result =$expense->delete($id);

if($result === true){
    header("Location : index.blade.php?deleted=1");
    exist;
}else{
    echo "Error deleting expense: $result";
}
}else{
    echo "No ID provided";
}
?>