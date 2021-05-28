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

$loginedMemberId = $_SESSION['loginedMemberId'];


$sqlReply = "
SELECT *
FROM reply AS R
WHERE R.articleId = '$id'
ORDER BY R.id DESC
";

$rsReply = mysqli_query($dbConn, $sqlReply);

$replies = [];

while( $reply = mysqli_fetch_assoc($rsReply) ){
  $replies[] = $reply;
}


$sqlMember = "
SELECT *
FROM `member` AS M
WHERE M.id = ${article['memberId']}
";

$rsMember = mysqli_query($dbConn, $sqlMember);

$member = mysqli_fetch_assoc($rsMember);


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
    작성자 : <?=$member['nickName']?><br>
    등록 : <?=$article['regDate']?><br>
    수정 : <?=$article['updateDate']?><br>
    제목 : <?=$article['title']?><br>
    내용 : <?=$article['body']?><br>
  </div>
  <hr>
  <h2>댓글 목록</h2>
  <span>댓글쓰기</span>
  <br>
  <form action="../reply/doWrite.php">
    <input type="hidden" name="articleId" value="<?=$article['id']?>">
    <input type="hidden" name="memberId" value="<?=$loginedMemberId?>">
    <textarea name="body"></textarea>
    <input type="submit" value="등록">
  </form>
  <hr>

  <?php foreach($replies as $reply) { ?>
    <?php
      $sqlWriter = "
      SELECT *
      FROM `member` AS M
      WHERE M.id = ${reply['memberId']}
      ";  

      $rsWriter = mysqli_query($dbConn, $sqlWriter);

      $writer = mysqli_fetch_assoc($rsWriter);
    ?>
    
    <span class="replyWriter replyTop"><?=$writer['nickName']?></span>&nbsp;&nbsp;
    <span class="replyTop"><?=$reply['regDate']?></span>&nbsp;&nbsp;
    <span><a href="../reply/doDelete.php?id=<?=$reply['id']?>">삭제</a></span>
    <br>
    <br>
    <span class="replyBottom"><?=$reply['body']?></span>
    <hr>
  <?php }?>
  
  <?php require_once __DIR__ . "/../foot.php"; ?>