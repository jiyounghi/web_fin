<?php
    session_start();
    $conn = mysqli_connect("localhost:3307", "root",  "sese3355", "abc_corp");
    if(!$conn){
      echo "db 에 연결하지 못했습니다.".mysqli_connect_error();
    }
    else{
      #echo "db 에 접속했습니다.";

      $page_num = $_GET['number'];
      $sql_1 = "SELECT * FROM msg_board WHERE number = $page_num" ;
      $result_1 = mysqli_query($conn, $sql_1);
      if($row1 = mysqli_fetch_array($result_1)){
        if($row1['author'] != $_SESSION['id']){
?>
          <script>alert('권한이 없습니다. (작성자 불일치)');</script>
          <script>history.back();</script>
<?php
        }else{
            $sqlDel = "DELETE FROM msg_board WHERE number = $page_num";
            mysqli_query($conn, $sqlDel);
?>
            <script>alert('삭제 완료!');</script>
            <script>location.href='index.php'</script>
<?php
        }
?>

<?php
      }
  }
mysqli_close($conn);
?>
