<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>abc 게시판</title>
</head>
<body>
  <h1>게시판</h1>
  <h2>검색 결과</h2>
  <?php
        $conn = mysqli_connect("localhost:3307", "root",  "sese3355", "abc_corp");
        if(!$conn){
        echo "db 에 연결하지 못했습니다.".mysqli_connect_error();
        }
        else{
            #echo "db 에 접속했습니다.";
            $user_skey = $_POST['skey'];
            $sql = "SELECT * FROM msg_board WHERE message LIKE '%$user_skey%'";
            $result = mysqli_query($conn, $sql);
            $list = '';
        }

        while($row = mysqli_fetch_array($result)){
            $list = $list."<li>{$row['number']}: <a href=\"view.php?number={$row['number']}\">{$row['name']}</a></li>";
        }

        echo $list;
        mysqli_close($conn);

  ?>
  </ul>
  <p><a href="index.php">메인화면으로 돌아가기</a></p>

</body>
</html>
