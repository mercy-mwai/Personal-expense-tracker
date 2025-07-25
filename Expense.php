<?php

require_once "database.php";
class Expense{
    public function save($amount, $categoryId, $date, $description) {
    global $conn;

    $sql = "INSERT INTO expenses (amount, category_id, description, date, created_at) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        
        $stmt->bind_param("diss", $amount, $categoryId, $description, $date);

        if ($stmt->execute()) {
            return true;
        } else {
            return "Error executing statement: " . $stmt->error;
        }
    } else {
        return "Error preparing statement: " . $conn->error;
    }
}

public function getAll(){
    global $conn;

    $sql= "SELECT * FROM expenses JOIN categories ON expenses.category_id =categories.id" ;

    $result =$conn->query($sql);

    if($result && $result->num_rows >0){
        $expenses =[];

         while ($row = $result->fetch_assoc()) {
         $expenses[] = $row;
        }

        return $expenses; 
    }else{
        return [];
    }
}

}
?>