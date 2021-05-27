<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

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
  echo "존재하지 않는 게시물입니다.";
  exit;
}

?>

<?php
$pageTitle = "게시물 상세, ${id}번";
?>

<?php require_once __DIR__ . "/../head.php"; ?>

  <div>
  <a href="list.php">리스트</a>
  <a onclick="if(confirm('정말 삭제하시겠습니까?') == false ) return false;" href="doDelete.php?id=<?=$article['id']?>">삭제</a>
  <a href="modify.php?id=<?=$article['id']?>">수정</a>
  </div>
  <hr>
  <div>
    번호 : <?=$article['id']?><br>
    등록 : <?=$article['regDate']?><br>
    수정 : <?=$article['updateDate']?><br>
    제목 : <?=$article['title']?><br>
    내용 : <?=$article['body']?><br>
  </div>
  <hr>
  
  <?php require_once __DIR__ . "/../foot.php"; ?>