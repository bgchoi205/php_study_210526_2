<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시물 수정</title>
</head>
<body>
  <h1>게시물 수정</h1>
  <hr>
  <a href="list.php">리스트 목록</a>
  <hr>

  <form action="doModify.php">
  
  <div>
    <span>수정할 게시물 번호</span>
    <br>
    <input required placeholder="번호입력" type="text" name="id">
  </div>
  <br>

  <div>
    <span>수정할 제목</span>
    <br>
    <input required placeholder="제목입력" type="text" name="title">
  </div>
  <br>

  <div>
    <span>수정할 내용</span>
    <br>
    <textarea required placeholder="내용입력" name="body"></textarea>
  </div>
  <br>

  <div>
    <input type="submit" value="수정">
  </div>
  
  </form>

</body>
</html>