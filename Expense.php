<?php

require_once "database.php";
class Expense{
    public function save($amount, $categoryId, $date){
        global $conn;

        $sql= "INSERT INTO expenses(amount, category_id, description, date, created_at) VALUES(?,?,?,? ,NOW())";
        $stmt= $conn->prepare($sql);

        if($stmt){
            $stmt->bind_param("diss", $amount, $categoryId, $date, $description);
            if($stmt->execute()){
                return true;
            }else{
                return "Error executing statement: " . $stmt->error;
            }
        }else{
            return "Error preparing statement: " . $conn->error;
        }
    }
}
?>