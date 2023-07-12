<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js">
    </script>
    <title>员工信息</title>
</head>
<body>
    <!-- 暂未实现搜索功能 -->
    <div class="headBar">
        <input type="text" id="Condition" placeholder="请输入姓名或工号">
        <button id="searchbtn">搜索</button>
    </div>
    <div>
        <table align = "center">
            <caption><h3>员工信息总览</h3></caption>
            <tr>
                <td>员工姓名</td>
                <td>员工工号</td>
                <td>员工性别</td>
                <td>员工年龄</td>
                <td>员工部门</td>
                <td>员工小组</td>
                <td>操作</td>
            </tr>
            <?php require_once "../Model/sqlConnect.php";?>
            <?PHP
                //$condition = $_POST["condition"];
                $condition = "";
                //查询所有的员工信息
                if(!empty($condition)){
                    $sql = "select user_name,user_code,user_sex,user_age,user_dept,user_group from user where user_name = '".$condition."' or user_code = '".$condition."'";
                }
                else{
                    $sql = "select user_name,user_code,user_sex,user_age,user_dept,user_group from user ";
                }
                
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_row($result)){
                ?>
                <?php echo"<tr>"?>
                <?php echo"<td>".$row[0]."</td>"?>
                <?php echo"<td>".$row[1]."</td>"?>
                <?php echo"<td>".$row[2]."</td>"?>
                <?php echo"<td>".$row[3]."</td>"?>
                <?php echo"<td>".$row[4]."</td>"?>
                <?php echo"<td>".$row[5]."</td>"?>
                <?php echo"<td><button id='deletebtn'>删除</botton></td>"?>
                <?php echo"</tr>"?>
                <?php
                }
            ?>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            $("#searchbtn").click(function(){
                $.post("userCheck.php",
                {
                    condition:$("#Condition").val()
                })
            })
            $("#deletebtn").click(function(){
                $.post("userDelete.php",
                {
                    userCode:$("#")
                })
            })
        })
    </script>
</body>
</html>