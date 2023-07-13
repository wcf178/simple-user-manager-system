<?php
    require_once "..//Model/sqlConnect.php";
    if(empty($_POST["usercode"])){
        die("接受信息失败");
    }
    else{
        $usercode = $_POST["usercode"];
        $sql = "delete from user where user_code = '".$usercode."'";
        $result = mysqli_query($conn,$sql);
        if($result){
            //删除成功
            echo "<script>alert('删除成功!请关闭页面')</script>";
            echo "<script>window.history.back(-1)</script>";
        }
        else{
            echo "<script>alert('删除失败!请关闭页面')</script>";
        }
    }
?>