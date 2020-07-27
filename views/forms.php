<html>
<?php require_once('layouts/_head.php'); ?>
<body>
<div class="main">
  <div class="messages-container">
    <ul class="messages-list"></ul>
  </div>
  <div class="container">
    <div class="forms-background-wrapper">
      <div class="signup-section-info">

      </div>
      <div class="login-section-info">

      </div>
    </div>

    <div class="forms-wrapper">
      <div class="form login">

        <div class="form-blue-bg"></div>
        <div class="inner-element signup hidden">
          <div class="form-heading-container">
            <div class="heading-label">
              <h3 class="title">Sign Up</h3>
            </div>
          </div>
          <form method="post" class="signup-form">
            <div class="input-data name">
              <label for="inputName">Name<span class="required">*</span></label>
              <input name="name" required id="inputName" autocomplete="off">
            </div>
            <div class="input-data email">
              <label for="inputEmail">Email<span class="required">*</span></label>
              <input type="email" required name="email" id="inputEmail" autocomplete="off">
            </div>
            <div class="input-data password">
              <label for="inputPassword">Password<span class="required">*</span></label>
              <input type="password" required name="password" id="inputPassword" autocomplete="off">
            </div>
            <button class="btn blue" id="signup-btn" type="submit">Sign Up</button>
            <a class="btn login-mobile" id="login-mobile" href="#">Login</a>
          </form>
        </div>

        <div class="inner-element login visible">
          <div class="form-heading-container">
            <div class="heading-label">
              <h3 class="title">Login</h3>
            </div>
          </div>

          <form action="login" method="post" class="login-form">
            <div class="input-data email">
              <label for="loginEmail">Email<span class="required">*</span></label>
              <input type="email" required name="email" id="loginEmail" autocomplete="off">
            </div>
            <div class="input-data password">
              <label for="loginPassword">Password<span class="required">*</span></label>
              <input type="password" required name="password" id="loginPassword" autocomplete="off">
            </div>
            <button class="btn orange" id="login-btn" type="submit">Login</button>
            <a class="btn forgot" id="password-reset-btn" href="/testlog/resetPage">Forgot?</a>
            <a class="btn signup-mobile" id="signup-mobile" href="#">Sign Up</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>