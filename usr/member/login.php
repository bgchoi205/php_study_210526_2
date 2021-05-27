
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

$pageTitle = "로그인";
?>

<?php require_once __DIR__ . "/../head.php"; ?>

  <div>
  <a href="list.php">리스트</a>
  </div>
  <hr>

  <form action="doLogin.php">
  <div>
  <span>아이디</span><br>
  <input required placeholder="아이디입력" type="text" name="loginId">
  </div>
  <br>
  <div>
  <span>비밀번호</span><br>
  <input required placeholder="비밀번호입력" type="password" name="loginPw">
  </div>
  <br>
  <div>
  <input type="submit" value="로그인">
  </div>

  </form>
  
  <?php require_once __DIR__ . "/../foot.php"; ?>