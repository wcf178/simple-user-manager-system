
<?PHP


    $username = "root";
    $password = "123456";
    $servername = "localhost";
    $dbname = "usermanage_db";
  

    $conn = new mysqli($servername,$username,$password,$dbname);
    
    
    if($conn->connect_error){
        die("链接失败".$conn->connect_error);
     }
     
?>