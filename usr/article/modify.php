<?php

if(!isset($_GET['id'])){
  echo "id를 입력해주세요.";
  exit;
}

$id = intval($_GET['id']);

?>

<?php
$pageTitle = "게시물 수정, $id 번";
?>

<?php require_once __DIR__ . "/../head.php"; ?>

  <div>
  <a href="list.php">리스트</a>
  <a href="detail.php?id=<?=$id?>">원문</a>
  </div>
  <hr>

  <form action="doModify.php">
  <div>
  <input type="hidden" name="id" value="<?=$id?>">
  </div>
  <div>
  <span>제목</span><br>
  <input required placeholder="제목입력" type="text" name="title">
  </div>
  <br>
  <div>
  <span>내용</span><br>
  <textarea required placeholder="내용입력" name="body"></textarea>
  </div>
  <br>
  <div>
  <input type="submit" value="수정">
  </div>

  </form>
  
  <?php require_once __DIR__ . "/../foot.php"; ?>