
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

$pageTitle = "회원가입";
?>

<?php require_once __DIR__ . "/../head.php"; ?>

  <div>
  <a href="list.php">리스트</a>
  </div>
  <hr>

  <form action="doJoin.php">
  <div>
  <span>&nbsp;사용할 아이디 입력&nbsp;&nbsp; : </span>
  <input required placeholder="사용할 아이디 입력" type="text" name="loginId">
  </div>
  <br>
  <div>

  <div>
  <span>사용할 비밀번호 입력 : </span>
  <input required placeholder="사용할 비밀번호 입력" type="text" name="loginPw">
  </div>
  <br>

  <div>
  <span>&nbsp;이름 입력&nbsp;&nbsp; : </span>
  <input required placeholder="이름 입력" type="text" name="name">
  </div>
  <br>

  <div>
  <span>닉네임 입력 : </span>
  <input required placeholder="사용할 닉네임 입력" type="text" name="nickName">
  </div>
  <br>

  <div>
  <span>이메일 입력 : </span>
  <input required placeholder="이메일 입력" type="text" name="email">
  </div>
  <br>

  <div>
  <input type="submit" value="가입">
  </div>

  </form>
  
  <?php require_once __DIR__ . "/../foot.php"; ?>