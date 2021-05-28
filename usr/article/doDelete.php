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

$sql = "
SELECT *
FROM article AS A
WHERE A.id = '$id'
";

$rs = mysqli_query($dbConn, $sql);

$article = mysqli_fetch_assoc($rs);

if($article == null){
  echo "없는 게시물입니다.";
  exit;
}

$sql2 = "
DELETE FROM article
WHERE id = '$id'
";

mysqli_query($dbConn, $sql2);

?>

<script>
alert("<?=$id?>번 게시물이 삭제되었습니다.");
location.replace("list.php");
</script>