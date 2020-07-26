<html>
<?php require_once('layouts/_head.php'); ?>
<body>
<div class="form">
  <div class="form-heading-container">
    <div class="heading-label">
      <h3 class="title">Reset Password</h3>
    </div>
  </div>

  <div class="message-box"></div>
  <form method="post" action="requestReset" class="reset-password">
    <div>
      <label for="forgottenEmail">Email</label>
      <input type="email" id="forgottenEmail" name="email" required autofocus>
    </div>

    <button type="submit">Reset</button>
  </form>
</div>
</body>
</html>