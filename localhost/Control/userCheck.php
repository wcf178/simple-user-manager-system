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
    <div class="headBar" align = "center">
        

            <table>
                <tr>
                    <td>
                        <input type="text" id="Condition" name="nc" placeholder="请输入姓名或工号"`>
                    </td>
                    <td><button id="searchbtn">搜索</button></td> 
                    <!-- <td><input type="submit" value="搜索"></td> -->
                </tr>
            </table>

       
        
        
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

                $condition = $_GET["nc"];
                //if()
                //print_r( $_GET);
                //$condition = "";
                //查询所有的员工信息
                if(!empty($condition)){
                    //echo $condition;
                    $sql = "select user_name,user_code,user_sex,user_age,user_dept,user_group from user where user_name = '".$condition."' or user_code = '".$condition."'";
                }
                else{
                    $sql = "select user_name,user_code,user_sex,user_age,user_dept,user_group from user ";
                }
                
                $result = mysqli_query($conn,$sql);
                $i=0;
                while($row = mysqli_fetch_row($result)){
                ?>
                <?php echo"<tr id='tr'".$i."'>"?>
                <?php echo"<td>".$row[0]."</td>"?>
                <?php echo"<td class='usercode'>".$row[1]."</td>"?>
                <?php echo"<td>".$row[2]."</td>"?>
                <?php echo"<td>".$row[3]."</td>"?>
                <?php echo"<td>".$row[4]."</td>"?>
                <?php echo"<td>".$row[5]."</td>"?>
                <?php echo"<td><button class='deletebtn' id='user".$i."'>删除</botton></td>"?>
                <?php echo"</tr>"?>
                <?php
                $i++;
                }
            ?>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            $("#searchbtn").click(function(){
                $.get("userCheck.php",
                {
                    nc:$("#Condition").val()
                    
                },function(date,status){
                    console.log( date+" "+status)
                    if(status == "success"){
                        location.replace("userCheck.php?nc="+nc)
                    }
                    
                })
            });
            //console.log($(".deletebtn")[1].id);
            console.log("nihao0");

            

            for(var i=0;i<$(".deletebtn").length;i++){
                //console.log("nihao1");
                console.log($(".deletebtn")[i].id);
                $("#"+$(".deletebtn")[i].id).click(function(){
                    console.log($(this));
                    var userid = $(this).parent().parent().children(".usercode").text();
                    console.log("userId: "+userid)
                    //console.log("sdad satisfies:"+$(this).siblings(".usercode").text())
                    $.post("userDelete.php",
                    {
                        usercode: userid
                    },function(date,status){
                        if(status="success"){
                            alert('删除成功！');
                            //删除成功后刷新表格
                            location.reload();
                        }
                    })
                })
            }
            
        })
    </script>
</body>
</html>