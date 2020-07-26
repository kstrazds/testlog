<html>
<?php require_once('layouts/_head.php'); ?>
<body>
<div class="main">
  <div class="container">
    <div class="forms-background-wrapper">
      <div class="signup-section-info">

      </div>
      <div class="login-section-info">

      </div>
    </div>

    <div class="forms-wrapper">
      <div class="form">
        <div class="form-heading-container">
          <div class="heading-label">
            <h3 class="title">Sign Up</h3>
          </div>
        </div>

        <div class="messages-container">
          <ul class="messages-list"></ul>
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
          <button id="signup-btn" type="submit">Sign Up</button>
        </form>
      </div>

      <div class="form">
        <div class="form-heading-container">
          <div class="heading-label">
            <h3 class="title">Login</h3>
          </div>
        </div>

        <div class="messages-container">
          <ul class="login-messages"></ul>
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
          <button id="login-btn" type="submit">Login</button>
        </form>
        <a id="password-reset-btn" href="/testlog/resetPage">Forgot?</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>