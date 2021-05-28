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
FROM reply AS R
WHERE R.id = '$id'
";

$rs = mysqli_query($dbConn, $sql);

$reply = mysqli_fetch_assoc($rs);

if($reply == null){
  echo "없는 댓글입니다.";
  exit;
}

$sql2 = "
DELETE FROM reply
WHERE id = '$id'
";

mysqli_query($dbConn, $sql2);

?>

<script>
alert("댓글이 삭제되었습니다.");
location.replace("../article/detail.php?id=<?=$reply['articleId']?>");
</script>