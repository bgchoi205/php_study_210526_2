<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

$sql = "
SELECT *
FROM board AS B
ORDER BY B.id DESC
";

$rs = mysqli_query($dbConn, $sql);

$boards = [];

while($board = mysqli_fetch_assoc($rs)){
  $boards[] = $board;
}

?>

<?php
$pageTitle = "게시판 리스트";
?>

<?php require_once __DIR__ . "/../head.php"; ?>

  <div>
  <a href="../article/write.php">글쓰기</a>&nbsp;&nbsp;
  <a href="../article/list.php">리스트</a>
  </div>
  <hr>

<div>
  <?php foreach($boards as $board) {?>
  
    번호 : <?=$board['id']?><br>
    <a href="../article/filteredListByBoard.php?boardId=<?=$board['id']?>">게시판명 : <?=$board['name']?></a><br>
    <hr>
  <?php }?>
  </div>
  
<?php require_once __DIR__ . "/../head.php"; ?>