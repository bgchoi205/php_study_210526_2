<?php

$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_test_4") or die("Error yo");

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
INSERT INTO article
SET regDate = NOW(),
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