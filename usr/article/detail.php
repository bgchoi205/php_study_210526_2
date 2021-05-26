<?php

$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_test_4") or die("Error yo");

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

$article = mysqli_fetch_assoc($rs)

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$id?>번 게시물 상세보기</title>
</head>
<body>
  <h1><?=$id?>번 게시물 상세보기</h1>
  <hr>
  <a href="list.php">리스트</a>
  <a onclick="if(confirm('정말 삭제하시겠습니까?') == false ) return false;" href="doDelete.php?id=<?=$article['id']?>">삭제</a>
  <a href="modify.php?id=<?=$article['id']?>">수정</a>
  <hr>
  번호 : <?=$article['id']?><br>
  등록 : <?=$article['regDate']?><br>
  수정 : <?=$article['updateDate']?><br>
  제목 : <?=$article['title']?><br>
  내용 : <?=$article['body']?><br>
  <hr>
  
</body>
</html>