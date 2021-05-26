<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

if(!isset($_GET['id'])){
  echo "id를 입력해주세요.";
  exit;
}

$id = intval($_GET['id']);

if(!isset($_GET['title'])){
  echo "제목을 입력해주세요.";
  exit;
}

if(!isset($_GET['body'])){
  echo "내용을 입력해주세요.";
  exit;
}

$title = $_GET['title'];
$body = $_GET['body'];

$sql = "
UPDATE article
SET title = '$title',
`body` = '$body'
WHERE id = '$id'
";

mysqli_query($dbConn, $sql);


?>

<script>
alert("<?=$id?>번 게시물이 수정되었습니다.");
location.replace("detail.php?id=<?=$id?>");
</script>