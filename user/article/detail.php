
<?php

$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_test") or die("Error Error");

if ( isset($_GET['id']) == false ){
  echo "id를 입력해주세요.";
  exit;
}

$id = intval($_GET['id']);

$sql = "
SELECT *
FROM article AS A
WHERE A.id = '${id}'
";

$rs = mysqli_query($dbConn, $sql);

$article = mysqli_fetch_assoc($rs);

if ($article == null){
  echo "없는 게시물 번호입니다.";
  exit;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시물 상세페이지, <?=$id?>번 게시물</title>
</head>
<body>
  <h1>게시물 상세페이지, <?=$id?>번 게시물</h1>
  <hr>
  <div>번호 : <?=$article['id']?></div>
  <div>등록일 : <?=$article['regDate']?></div>
  <div>수정일 : <?=$article['updateDate']?></div>
  <div>제목 : <?=$article['title']?></div>
  <div>내용 : <?=$article['body']?></div>
  <br>
  <div>
    <a href="list.php">리스트로 돌아가기</a>
  </div>
</body>
</html>