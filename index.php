<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/style.css?version=<?= filemtime("css/style.css")?>" >

</head>
<body>
<form method="POST" action="ceklogin.php">
 	<?php if (isset($_GET['msg'])) : ?>
						<div class="alert" role="alert">
							<small class="text-danger"><?= $_GET['msg'];  ?></small>
						</div>
					<?php endif ?>

 <h1 class="a11y-hidden">Login Form</h1>
 <h2 align="center" class="h2">S A M L A U N D R Y</h2>
  <div>
    <label class="label-username">
      <input type="text" class="text" name="username" placeholder="username" tabindex="1" required />
      <span class="required">username</span>
    </label>
  </div>
  <input type="checkbox" name="show-password" class="show-password a11y-hidden" id="show-password" tabindex="3" />
  <label class="label-show-password" for="show-password">
    <span>Show Password</span>
  </label>
  <div>
    <label class="label-password">
      <input type="text" class="text" name="password" placeholder="Password" tabindex="2" required />
      <span class="required">Password</span>
    </label>
  </div>
  <input type="submit" value="Log In" />
  <figure aria-hidden="true">
    <div class="person-body"></div>
    <div class="neck skin"></div>
    <div class="head skin">
      <div class="eyes"></div>
      <div class="mouth"></div>
    </div>
    <div class="hair"></div>
    <div class="ears"></div>
    <div class="shirt-1"></div>
    <div class="shirt-2"></div>
  </figure>
</form>
</body>
</html>