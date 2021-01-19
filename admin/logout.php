<?php
  session_destroy();
  header('location:../login.php?stat=logout_success');
?>
