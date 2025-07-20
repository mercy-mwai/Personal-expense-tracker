<?php
$db_server ="localhost";
$db_user= "root";
$db_password= "";
$db_name ="expensesdb";
$conn ="";


try{
$conn=new mysqli($db_server,
            $db_user,
            $db_password,
            $db_name);

}catch(mysqli_sql_exception){
        echo "You are not connected";
}

if($conn){
    echo "Your connection is valid <br />";
}
?>