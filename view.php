<?php
    include ("login_check.php");
    $conn = mysqli_connect("localhost:3307", "root",  "sese3355", "abc_corp");
    if(!$conn){
    echo "db 에 연결하지 못했습니다.".mysqli_connect_error();
    }
    else{
        session_start();
        $view_num = $_GET['number'];
        $sql = "SELECT * FROM msg_board WHERE number = $view_num" ;
        $result = mysqli_query($conn, $sql);
        #echo "db 에 접속했습니다.";
?>
<?php
        if(isset($_SESSION['id'])) {
            echo $_SESSION['id']; echo "님 안녕하세요";
?>
            <button onclick="location.href='logout.php'">로그아웃</button>

            <h1>게시판</h1>
            <h2>글 내용</h2>
<?php
            if($row = mysqli_fetch_array($result)){
?>
            <h3>글번호 : <?= $row['number'] ?></h3>
            <h3>글쓴이 : <?= $row['author'] ?></h3>
            <div>
                <?= $row['message'] ?>
            </div>
<?php
            }
            mysqli_close($conn);
?>
            <p><a href="index.php">메인화면으로 돌아가기</a></p>
            <p><a href="update.php?number=<?= $row['number'] ?>">수정하기</a></p>
            <p><a href="delete.php?number=<?= $row['number'] ?>" onClick="return confirm('삭제하시겠습니까?')">삭제하기</a></p>
<?php
        }
        else{
            echo "로그인 상태가 아닙니다";
?>
            <button onclick="location.href='login.html'">로그인해주세요</button>
            <h1>게시판</h1>
            <h2>글 내용</h2>
            <?php
            if($row = mysqli_fetch_array($result)){
?>
            <h3>글번호 : <?= $row['number'] ?></h3>
            <br></br>
            <h3>글쓴이 : <?= $row['author'] ?></h3>
            <div>
                <?= $row['message'] ?>
            </div>
<p>
<?php
            }
            mysqli_close($conn);
?>
            <p><a href="index.php">메인화면으로 돌아가기</a></p>
<?php
        }
    }

?>
