<?php
$conn = include("../login_system/connect.php");
//127.0.0.1/Unity1257backend/Pets/getLevel.php

$usercookie=$_COOKIE["usercookie"];


if($usercookie != NULL){
    //Check connection
    if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }

    $sql= "SELECT petLevel From userspets where username='".$usercookie."'";
   
    $result = $conn ->query($sql);
    
    if($result->num_rows > 0){
        while($row = $result -> fetch_assoc()){
            echo $row["petLevel"]. "<br />";
        }
    }else{
        echo "No Results";
        die();
    }
}else{
    echo"login failed"; //重新導回登入頁面
}
$conn->close();
?>