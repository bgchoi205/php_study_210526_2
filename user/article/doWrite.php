
<?php

$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_test") or die("Error Error");

if ( isset($_GET['title']) == false ){
  echo "제목를 입력해주세요.";
  exit;
}

if ( isset($_GET['body']) == false ){
  echo "내용를 입력해주세요.";
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

echo "${id}번 게시물이 추가되었습니다.";

?>
<hr>
<div><a href="list.php">리스트로 돌아가기</a></div>
