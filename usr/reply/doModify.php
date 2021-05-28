<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

if( !isset($_SESSION['loginedMemberId']) ){
  print "<script language=javascript> alert('로그인 후 이용해주세요.'); history.back(-2); </script>";
  exit;
}

if(!isset($_GET['id'])){
  echo "id를 입력해주세요.";
  exit;
}

$id = intval($_GET['id']);



if(!isset($_GET['body'])){
  echo "내용을 입력해주세요.";
  exit;
}


$body = $_GET['body'];

$sql = "
UPDATE reply
SET updateDate = NOW(),
`body` = '$body'
WHERE id = '$id'
";

$rs = mysqli_query($dbConn, $sql);

$reply = mysqli_fetch_assoc($rs);

?>

<script>
alert("댓글이 수정되었습니다.");
location.replace("detail.php?id=<?=$reply['articleId']?>");
</script>