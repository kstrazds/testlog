<html>
<?php require_once('layouts/_head.php'); ?>
<body>
  <h3>Welcome!</h3>

  <?php 
  $isLoggedIn = classes\Auth::isLoggedIn();

  if ($isLoggedIn): ?>
    You are logged in!

    <a href="/testlog" id="logout" class="logout">Logout</a>
  <?php endif; ?>
</body>
</html>