
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

$pageTitle = "게시물 작성";
?>

<?php require_once __DIR__ . "/../head.php"; ?>

  <div>
  <a href="list.php">리스트</a>
  </div>
  <hr>

  <form action="doWrite.php">
  <div>
  <span>게시판 선택</span><br>
  <select required name="boardId">
    <option value="1">1.공지</option>
    <option value="2">2.자유</option>
  </select>
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
  <input type="submit" value="등록">
  </div>

  </form>
  
  <?php require_once __DIR__ . "/../foot.php"; ?>