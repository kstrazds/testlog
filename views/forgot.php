<html>
<?php require_once('layouts/_head.php'); ?>
<body>
<div class="main">
  <div class="container">
    <div class="forms-wrapper">
      <div class="form forgot">
        <div class="inner-element forgot">
          <div class="form-heading-container">
            <div class="heading-label">
              <h3 class="title">Reset</h3>
            </div>
          </div>

          <div class="message-box"></div>
          <form method="post" action="requestReset" class="reset-password">
            <div class="input-data email">
              <label for="forgottenEmail">Email<span class="required">*</span></label>
              <input type="email" id="forgottenEmail" name="email" required autofocus>
            </div>

            <button class="btn blue" type="submit">Reset</button>
            <a class="btn back-login" id="back-login" href="/testlog/">Back to login</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>