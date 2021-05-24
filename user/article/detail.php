<meta charset="UTF-8">

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

print_r($article);

?>