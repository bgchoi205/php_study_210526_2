<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

if(!isset($_GET['loginId'])){
  echo "아이디를 입력해주세요.";
  exit;
}

if(!isset($_GET['loginPw'])){
  echo "비밀번호를 입력해주세요.";
  exit;
}

$loginId = $_GET['loginId'];
$loginPw = $_GET['loginPw'];

$sql = "
SELECT *
FROM `member` AS M
WHERE M.loginId = '$loginId'
";

$rs = mysqli_query($dbConn, $sql);

$member = mysqli_fetch_assoc($rs);

if( empty($member) ){
  print "<script language=javascript> alert('존재하지 않는 아이디입니다.'); history.back(-2); </script>";
  exit;
}

if( $member['loginPw'] != $loginPw ){
  print "<script language=javascript> alert('비밀번호가 틀립니다.'); history.back(-2); </script>";
  exit;
}

$_SESSION['loginedMemberId'] = $member['id'];

?>


<script>
alert("<?=$member['nickName']?>님 환영합니다.");
location.replace("../article/list.php");
</script>