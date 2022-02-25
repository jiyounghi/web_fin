<?php
    $conn = mysqli_connect("localhost:3307", "root",  "sese3355", "abc_corp");
    if(!$conn){
    echo "db 에 연결하지 못했습니다.".mysqli_connect_error();
    }
    else{
        #echo "db 에 접속했습니다.";
        session_start();
        $view_num = $_GET['number'];
        $sql = "SELECT * FROM msg_board WHERE number = $view_num" ;
        $result = mysqli_query($conn, $sql);

?>
<?php
    if($row = mysqli_fetch_array($result)){
      if($row['author'] != $_SESSION['id']){
?>
        <script>alert('권한이 없습니다. (작성자 불일치)');</script>
        <script>history.back();</script>
<?php
      }else{
?>
      <!DOCTYPE html>
      <html>
      <head>
        <meta charset="utf-8">
        <title>글수정</title>
      </head>
      <body>
        <h1>글수정</h1>
        <form action="insert_update.php" method="post">
          <input type="hidden" name="number" value="<?= $view_num ?>">
          <p>
            <label for="name">작성자:<?php echo $row['author']?></label>
          </p>
          <p>
            <label for="name">이름:</label>
            <input type="text" id="name" name="name" value="<?= $row['name'] ?>">
          </p>
          <p>
            <label for="message">메시지:</label>
            <textarea name="message" id="message" cols="30" rows="10"><?= $row['message'] ?></textarea>
          </p>
          <input type="submit" value="글수정">
        </form>
      <a href="index.php" title="홈으로 돌아가기">홈으로 돌아가기</a>
      <a href="view.php?number=<?=$view_num?>" title="뒤로가기">뒤로가기</a>
<?php
      }
mysqli_close($conn);

?>
      </body>
</html>
<?php
    }
  }
?>
