<?php 
_db();
$sql = "DELETE FROM `user` WHERE datediff(now(), `last_login`) >= 90 ";

?>