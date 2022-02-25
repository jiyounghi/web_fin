<?php
    session_start();
    $username = $_SESSION[ 'id' ];
    if ( is_null( $username ) ) {
        header( 'Location: login.html' );
    }
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>비밀번호 변경</title>
    <style>
      body { font-family: sans-serif; font-size: 14px; }
      input, button { font-family: inherit; font-size: inherit; }
    </style>
  </head>
  <body>
    <!-- <h1><?php echo $username; ?>님, 비밀번호가 변경되었습니다.</h1> -->
    <script>
        alert("비밀번호가 변경되었습니다.");
        location.replace('login.html');
    </script>
  </body>
</html>
