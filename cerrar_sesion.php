<?php
setcookie("usuario", "", time() - 3600);
header ("location:../indexSC.php");
?>