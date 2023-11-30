<?php
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST")
{
  $mysqli = require __DIR__ . "/database.php";
  $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();

  if($user)
  {
    if(password_verify($_POST["password"], $user["password_hash"]))
    {
      session_start();
      session_regenerate_id();
      $_SESSION["user_id"] = $user["id"];
      header("Location: index.php");
      exit;
    }
  }
  $is_invalid = true;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>LogIn Page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/login.css">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
</head>
<body>
<img src="https://images.unsplash.com/photo-1447752875215-b2761acb3c5d?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
  <div class="form__class">
  <form class="login__form" method="post">
    <h1>Login</h1>
    <?php if($is_invalid):?>
  <p>Invalid Email or Password</p>
  <?php endif; ?>
    <input className="emailInput" autocomplete="off" type="email" placeholder="Email" name="email" id="email" value=" <?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
    <i class="ri-mail-fill"></i>
    <br><br>
    <input className="passwordInput" autocomplete="off" type="password" placeholder="Password" name="password" id="password" required>
    <i class="ri-lock-2-fill"></i>
    <br><br> 
      <button type="submit" class="login__button">Login</button>
      <br><br> 
    <div class="login__check">
      <div class="login_check_box">
        <input type="checkbox" class="login__check-box" id="user-check">
        <label for="user-check" class="login__check-label" > <mark style="background-color:rgba(255, 99, 71, 0.2);">Remember me  </mark></label>
      </div>
    </div>
    <br></br>

    <a href="#" class="login__forgot">Forgot Password</a>
    <br><br>
 
    <div class="login__register">
      Don't have an account <a href="signup.php" class="register">Register </color:black></a>
    </div>
  </form>
  </div>
</body>
</html>


