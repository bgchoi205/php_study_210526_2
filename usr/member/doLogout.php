<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/webInit.php';

session_unset();

?>

<script>
alert("๋ก๊ทธ์์");
location.replace("../article/list.php");
</script>