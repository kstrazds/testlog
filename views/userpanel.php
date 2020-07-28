<html>
<?php require_once('layouts/_head.php'); ?>
<body>
  <?php 
  $isLoggedIn = classes\Auth::isLoggedIn();
  $loggedUser = classes\Auth::getUser();

  if ($isLoggedIn): ?>
    <div class="main">
      <div class="container userprofile">
        <div class="forms-wrapper">
          <div class="form forgot userprofile">
            <div class="inner-element forgot">
              <div class="form-heading-container">
                <div class="heading-label userprofile">
                  <h3 class="title">Welcome, <span class="user-name"><?php echo $loggedUser->name; ?></span>!</h3>
                </div>
              </div>

              <form method="post" action="updateProfile" class="signup-form">
                <div class="input-data name">
                  <label for="inputName">Name<span class="required">*</span></label>
                  <input name="name" 
                        required 
                        id="inputName" 
                        value="<?php echo $loggedUser->name; ?>" 
                        autocomplete="off">
                </div>
                <div class="input-data name">
                  <label for="inputAge">Age</label>
                  <input name="age"  
                        id="inputAge" 
                        value="<?php echo $loggedUser->age; ?>" 
                        autocomplete="off">
                </div>
                <div class="input-data email">
                  <label for="inputEmail">Email<span class="required">*</span></label>
                  <input type="email" 
                        required 
                        name="email" 
                        value="<?php echo $loggedUser->email; ?>" 
                        id="inputEmail" 
                        autocomplete="off" 
                        readonly 
                        onfocus="this.removeAttribute('readonly');">
                </div>
                <div class="input-data password">
                  <label for="inputPassword">Password</label>
                  <input type="password" 
                        name="password" 
                        id="inputPassword" 
                        autocomplete="off" 
                        placeholder="Optional"
                        readonly onfocus="this.removeAttribute('readonly');">
                </div>
                <button class="btn orange" type="submit">Update</button>
                <a class="btn forgot userlogout" href="/testlog" id="logout" class="logout">Logout</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</body>
</html>