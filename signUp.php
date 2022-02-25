<?php

  $conn = mysqli_connect("localhost:3307","root","sese3355","abc_corp") or die("Failed...");

  $id = $_GET['id'];
  $pw = $_GET['pw'];
  $pw_check = $_GET['pw_check'];
  $date = date('Y-m-d H:i:s');
  #echo $date;
  $query_id = "select * from user where id='$id'";
  $result_id = $conn->query($query_id);
  if($pw != $pw_check){
?>
    <script>
      alert("pw 가 서로 다릅니다.");
      location.replace("signUp.html");
    </script>

<?php
  exit;
  mysqli_close($conn);
  }

  if(mysqli_num_rows($result_id) > 0){
?>
    <script>
      alert("이미 존재하는 ID 입니다");
      location.replace("signUp.html");
    </script>

<?php
    exit;
    mysqli_close($conn);
  }

  $insert_query = "insert into user (id, pw, date, permit) values ('$id', '$pw', '$date', 0)";
  $result_insert = $conn->query($insert_query);

  if($result_insert){
?>
    <script>
      alert("Register Success");
      location.replace("index.php");
    </script>
<?php
  }
  else{
?>
  <script>alert("Register Failed...");</script>
<?php
}
    mysqli_close($conn);
?>
