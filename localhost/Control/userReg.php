<?PHP
    require_once "../Model/sqlConnect.php";
    // 验证用户的输入是否合法
   if(empty($_POST["username"])||empty($_POST["userCode"])||
   empty($_POST["sex"])||empty($_POST["password"])||empty($_POST["passwordCon"])){
    echo "<script>alert('请填写信息')</script>";
    echo "<script>window.history.back(-1)</script>";
   }
   else{
        $username = $_POST["username"];
        $userCode = $_POST["userCode"];
        $sex = $_POST["sex"];
        $password = $_POST["password"];
        $passwordCon = $_POST["passwordCon"];
        $dept = 1;
        $group = 1;
        $age = 21;
        $code = 1092;
        // 判断两次输入密码是否一致
        
        //编写sql语句
        //首先判断是否有重复的工号
        $sql1 = "select user_code from user";
        $result1 = mysqli_query($conn,$sql1);
        $userCodes = mysqli_fetch_all($result1);
      
   
        foreach($userCodes as $usercode1){
            
            if($usercode1[0] == $userCode){
                // 有重复的工号,流程结束
                echo 403;
                die("工号重复!");
            } 
        }
       
        $sql2 = "insert into user(user_name,user_pwd,user_sex,user_dept,user_group,user_age,user_code)
        values('$username','$password','$sex','$dept','$group','$age','$userCode') ";
        $result2 = mysqli_query($conn,$sql2);
        if($result2){
            echo "<h3 align='center'>恭喜你成为会员!<h3>";
            echo "<script>alert('注册成功!请关闭注册页面进行登录')</script>";
            //echo "<script>window.open('../View/login.html')</script>";
            echo "<script>window.history.back(-1)</script>";
            $username = $userCode = $password = "";
        }
        else{
            echo 502;
            echo "<script>alert('注册失败!')</script>";
        }
        
   }
?>