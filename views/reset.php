<html>
<?php require_once('layouts/_head.php'); ?>
<body>
<div class="form">
  <div class="form-heading-container">
    <div class="heading-label">
      <h3 class="title">Reset Password</h3>
    </div>
  </div>

  <div class="message-box-reset"></div>
  <form method="post" action="/testlog/resetPassword" class="password-reset-form">
    <?php 
      $url = $_SERVER['REQUEST_URI'];

      $getUrlArray = explode('/testlog/reset/', $url);
      $getUrlHash = implode($getUrlArray);
    ?>
    <input type="hidden" name="token" value="<?php echo $getUrlHash; ?>">
    <div>
      <label for="password-entry">New Password</label>
      <input type="password" id="password-entry" name="password" required autofocus>
    </div>

    <button id="send-reset" type="submit">Reset</button>
  </form>
</div>
</body>
</html>