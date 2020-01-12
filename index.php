<?php
if (!empty($_POST)) {
  $motDePasseVerifie = sha256('coucoulemotdepasse123');
  $messageRetour = false;
  if (empty(trim($_POST["password"]))) {
    $messageRetour = "Le mot de passe ne peut être vide";		
  }
  elseif (sha256($_POST["password"]) == $motDePasseVerifie) {
    $messageRetour = "Le mot de passe n'est pas le bon !";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>HTML5 Login</title>
  <link rel="stylesheet" href="normalize.css">
  <link rel="stylesheet" href="style.css">
  </head>
<body>
  <section class="loginform cf">
  <form name="login" action="<?php echo $_POST["PHP_SELF"]; ?>" method="post" accept-charset="utf-8">
    <ul>
      <li>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="password" required />
      </li>
      <li>
        <input type="submit" value="Login" />
      </li>
      <?php
      if (!empty($messageRetour)) {
        ?>
        <p><?php echo $messageRetour; ?></p>
        <?php
      }
      ?>
    </ul>
  </form>
  </section>
</body>
</html>