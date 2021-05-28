<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

if( !isset($_SESSION['loginedMemberId']) ){
  print "<script language=javascript> alert('로그인 후 이용해주세요.'); history.back(-2); </script>";
  exit;
}

if(!isset($_GET['boardId'])){
  echo "게시판을 선택해주세요.";
  exit;
}

if(!isset($_GET['title'])){
  echo "제목을 입력해주세요.";
  exit;
}

if(!isset($_GET['body'])){
  echo "내용을 입력해주세요.";
  exit;
}

$boardId = $_GET['boardId'];
$title = $_GET['title'];
$body = $_GET['body'];

$sql = "
INSERT INTO article
SET boardId = '$boardId',
regDate = NOW(),
updateDate = NOW(),
title = '$title',
`body` = '$body'
";

mysqli_query($dbConn, $sql);

$id = mysqli_insert_id($dbConn);

?>

<script>
alert("<?=$id?>번 게시물이 등록되었습니다.");
location.replace("detail.php?id=<?=$id?>");
</script>