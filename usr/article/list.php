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
$pageTitle = "전체 게시물 리스트";
?>

<?php require_once __DIR__ . "/../head.php"; ?>

  
  <div>
  <a href="write.php">글쓰기</a>
  <a href="../board/list.php">전체 게시판 보기</a>
  </div>
  <hr>
  <form action="filteredListByBoard.php">
  <span>게시판 선택</span>
  <select required name="boardId">
    <option value="1">1.공지</option>
    <option value="2">2.자유</option>
  </select>
  <input type="submit" value="이동">
  </form>
  <hr>

<div>
  <?php foreach($articles as $article) {?>

    <?php
    $sqlBoard = "
    SELECT *
    FROM board AS B
    WHERE B.id = ${article['boardId']}
    ";
    
    $rsBoard = mysqli_query($dbConn, $sqlBoard);
    
    $board = mysqli_fetch_assoc($rsBoard)
    
    ?>
  
    <a href="detail.php?id=<?=$article['id']?>">번호 : <?=$article['id']?></a>
    <br>
    <span>게시판 : <?=$board['name']?></span>
    <br>
    등록 : <?=$article['regDate']?><br>
    <a href="detail.php?id=<?=$article['id']?>">제목 : <?=$article['title']?></a><br>
    <hr>
  <?php }?>
  </div>
  
<?php require_once __DIR__ . "/../head.php"; ?>