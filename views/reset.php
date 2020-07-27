<html>
<?php require_once('layouts/_head.php'); ?>
<body>
  <div class="main">
    <div class="container">
      <div class="forms-wrapper">


        <div class="form">
          <div class="form-heading-container">
            <div class="heading-label">
              <h3 class="title">Reset</h3>
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
            <div class="input-data">
              <label for="password-entry">New Password<span class="required">*</span></label>
              <input type="password" id="password-entry" name="password" required autofocus>
            </div>

            <button class="btn blue" id="send-reset" type="submit">Reset</button>
            <a class="btn back-login" id="back-login" href="/testlog/">Back to login</a>
          </form>
        </div>


      </div>
    </div>
  </div>










</body>
</html>