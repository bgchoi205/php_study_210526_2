<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

if( !isset($_SESSION['loginedMemberId']) ){
  echo "로그인 후 이용해주세요.";
  exit;
}

if(!isset($_GET['articleId'])){
  echo "게시물 번호를 입력해주세요.";
  exit;
}

if(!isset($_GET['memberId'])){
  echo "회원번호를 입력해주세요.";
  exit;
}

if(!isset($_GET['body'])){
  echo "내용을 입력해주세요.";
  exit;
}

$articleId = intval($_GET['articleId']);
$memberId = intval($_GET['memberId']);
$body = $_GET['body'];

$sql = "
INSERT INTO reply
SET 
regDate = NOW(),
updateDate = NOW(),
articleId = '$articleId',
memberId = '$memberId',
`body` = '$body'
";

mysqli_query($dbConn, $sql);

?>

<script>
alert("댓글이 등록되었습니다.");
location.replace("../article/detail.php?id=<?=$articleId?>");
</script>