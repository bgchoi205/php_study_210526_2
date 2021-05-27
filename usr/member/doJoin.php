<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

if(!isset($_GET['loginId'])){
  echo "아이디를 입력해주세요.";
  exit;
}

if(!isset($_GET['loginPw'])){
  echo "비밀번호를 입력해주세요.";
  exit;
}

if(!isset($_GET['name'])){
  echo "이름을 입력해주세요.";
  exit;
}

if(!isset($_GET['nickName'])){
  echo "닉네임을 입력해주세요.";
  exit;
}

if(!isset($_GET['email'])){
  echo "이메일을 입력해주세요.";
  exit;
}

$loginId = $_GET['loginId'];
$loginPw = $_GET['loginPw'];
$name = $_GET['name'];
$nickName = $_GET['nickName'];
$email = $_GET['email'];

$sqlCheck = "
SELECT *
FROM `member` AS M
WHERE M.loginId = '$loginId'
";

$rsCheck = mysqli_query($dbConn, $sqlCheck);

$member = mysqli_fetch_assoc($rsCheck);

if( $member != null ){
  echo "사용중인 아이디입니다.";
  exit;
}

$sql = "
INSERT INTO `member`
SET regDate = NOW(),
updateDate = NOW(),
loginId = '$loginId',
loginPw = '$loginPw',
`name` = '$name',
nickName = '$nickName',
email = '$email'
";

mysqli_query($dbConn, $sql);

$id = mysqli_insert_id($dbConn);

?>

<script>
alert("회원 가입되었습니다.");
location.replace("login.php");
</script>