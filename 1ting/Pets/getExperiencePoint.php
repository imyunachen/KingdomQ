<?php
$conn = include("../login_system/connect.php");
//127.0.0.1/Unity1257backend/Pets/getExperiencePoint.php

$usercookie=$_COOKIE["usercookie"];


if($usercookie != NULL){
    //Check connection
    if($conn->connect_error){
        die("Connection failed:" . $conn->connect_error);
    }

    $sql= "SELECT experiencePoint From userspets where username='".$usercookie."'";
   
    $result = $conn ->query($sql);
    
    if($result->num_rows > 0){
        while($row = $result -> fetch_assoc()){
            echo $row["experiencePoint"]. "<br />";
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