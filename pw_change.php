<?php
session_start();
$id = $_SESSION['id'];
if ( !isset($id) ) {
    header( 'Location: login.html' );
}
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$new_password_confirm = $_POST['new_password_confirm'];

if ( !is_null( $current_password ) ) {
    $conn = mysqli_connect("127.0.0.1:3307", "root", "sese3355", "abc_corp");
    $sql = "SELECT pw FROM user WHERE id = '" . $id . "';";

    $result = mysqli_query( $conn, $sql );
    while ( $row = mysqli_fetch_array( $result ) ) {
        $old_password = $row['pw'];
    }
    if ($current_password == $old_password ) {
        if ( $new_password == $new_password_confirm ) {
            # $new_password = password_hash( $new_password, PASSWORD_DEFAULT);        암호화
            $sql_change_password = "UPDATE user SET pw = '$new_password' WHERE id = '$id'";
            mysqli_query( $conn, $sql_change_password );
            header( 'Location: change_password_check.php' );
        } else { ?>
            <script>
                alert("입력한 비밀번호가 서로 다릅니다.");
                location.replace('pw_change.html');
            </script>;
<?php
        }
    }else{  ?>
        <script>
            alert("현재 비밀번호가 다릅니다.");
            location.replace('pw_change.html');
        </script>;
<?php
    }
}
?>
