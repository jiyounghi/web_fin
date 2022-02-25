<?php
  session_start();
  session_destroy();
?>
<script>
  alert("Logout Success");
  location.replace("index.php");
</script>
