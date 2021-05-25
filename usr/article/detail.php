<?php 

$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_test_3") or die("Error man");

if( !isset($_GET['id']) ){
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
  <title>게시물 상세, <?=$article['id']?>번</title>
</head>
<body>
  <h1><?=$article['id']?>번 게시물</h1>
  <hr>
  <div>번호 : <?=$article['id']?></div>
  <div>등록 : <?=$article['regDate']?></div>
  <div>수정 : <?=$article['updateDate']?></div>
  <div>제목 : <?=$article['title']?></div>
  <div>내용 : <?=$article['body']?></div>
  <hr>

  <a href="list.php">리스트 목록</a>
  
</body>
</html>