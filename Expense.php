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

public function update($id,$amount, $categoryid,$date,$description){
    global $conn;

    $sql= "UPDATE expenses
        SET amount=?, category_id=? ,date=? ,description=? 
        WHERE id=? ";

    $stmt =$conn->prepare(sql);

    if(!$stmt){
        return false;
    }

    $stmt->bind_param("disss", $amout, $category_id , $date, $description, $id);

    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

public function delete($id){
global $conn;

$sql = "DELETE FROM expenses WHERE id =?";
$stmt= $conn->prepare($sql);
$stmt->bind_param("i", $id);
return $stmt->execute();
}

public function getById($id){
    global $conn;
    $sql= "SELECT * from expenses WHERE id=?";
    $stmt = $conn->prepare($sql);
    
    $stmt =bind_param("s", $id);

    $stmt->execute();
    $result = $stmt->get_result();
    
    return $result->fetch_assoc();
}
}
?>