<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

$sql = "
SELECT *
FROM article AS A
ORDER BY A.id DESC
";

$rs = mysqli_query($dbConn, $sql);

$articles = [];

while($article = mysqli_fetch_assoc($rs)){
  $articles[] = $article;
}

?>

<?php
$pageTitle = "게시물 리스트";
?>

<?php require_once __DIR__ . "/../head.php"; ?>

  <div>
  <a href="write.php">글쓰기</a>
  </div>
  <hr>

<div>
  <?php foreach($articles as $article) {?>
  
    <a href="detail.php?id=<?=$article['id']?>">번호 : <?=$article['id']?></a><br>
    등록 : <?=$article['regDate']?><br>
    <a href="detail.php?id=<?=$article['id']?>">제목 : <?=$article['title']?></a><br>
    <hr>
  <?php }?>
  </div>
  
<?php require_once __DIR__ . "/../head.php"; ?>