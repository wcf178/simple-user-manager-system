<?php
    require_once "..//Model/sqlConnect.php";
   


    if(empty($_POST["username"])||empty($_POST["password"])){
        die("请将信息填写完整");
    }
    else{
        $userName = $_POST["username"];
        $password = $_POST["password"];
        #检查用户密码是否正确
        $sql = "select user_pwd from user where user_name = '".$userName."'";

        $pwdresult= mysqli_query($conn,$sql);
        $rightPwd = mysqli_fetch_row($pwdresult);
        
        if(!$rightPwd == $password){
            echo "fail";

        }
        else{
            echo 200;
        }
    }
   
    

?>