<?php

if(!isset($_GET['id'])){
  echo "id를 입력해주세요.";
  exit;
}

$id = intval($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$id?>번 게시물 수정</title>
</head>
<body>
  <h1><?=$id?>번 게시물 수정</h1>
  <hr>
  <a href="list.php">리스트</a>
  <a href="detail.php?id=<?=$id?>">원문</a>
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
  
</body>
</html>