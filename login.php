<?php
  #session 시작
  session_start();
  #mysql 연동
  $conn = mysqli_connect("localhost:3307","root","sese3355","abc_corp");
  #id, pw
  $id = $_GET['id'];
  $pw = $_GET['pw'];
  $query = "SELECT * FROM user WHERE id='$id'";
  $result = $conn->query($query);

  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    #echo "!!!!";
    if($row['pw']==$pw){
      $_SESSION['id']=$id;
      #echo "@@@@";
      if(isset($_SESSION['id'])){
        #echo "####";
?>
        <script>
          alert("Login Success!!");
          location.replace("index.php");
        </script>
<?php
      }else{
        mysqli_close($conn);
        exit;
        ?>
          <script>
            alert("Login Failed...");
            history.back();
        </script>
        <?php
      }
    }
    else{
?>
      <script>
        alert("Login Failed...");
        history.back();
      </script>
<?php
    mysqli_close($conn);
    exit;
    }
  }else{
    mysqli_close($conn);
    exit;
?>
    <script>
        alert("Login Failed...");
        history.back();
    </script>
<?php
  }
?>
