<html>
<?php require_once('layouts/_head.php'); ?>
<body>
  <?php 
    $isLoggedIn = classes\Auth::isLoggedIn();
    $loggedUser = classes\Auth::getUser();
  ?>
  <h3>Welcome <?php echo $loggedUser->name; ?>!</h3>

  <?php 
    if ($isLoggedIn): ?>
      You are logged in!

      <a href="/testlog" id="logout" class="logout">Logout</a>
    <?php endif; ?>
</body>
</html>