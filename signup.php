<!DOCTYPE html>
<html>
<head>
  <title>Sign Up </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/signup.css">
  
</head>
<body >
  <img class="signup_img"src="https://lh3.googleusercontent.com/p/AF1QipM2h00vjqWj4Th777WSKMsbO90lOaYA65MGE0B2=s1360-w1360-h1020">
 

  <div class="signup_class">
    <form class="signup_form" action="process_signup.php" method="POST" novalidate>
     <h1 class="signup_header"><u>Sign Up Page </h1><br><br>
  <input autocomplete="off" type="username" placeholder="Username" name="username" id="username1">
      <br><br>
      <input autocomplete="off" type="email" placeholder="Email" name="email" id="email1" <?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
      <br><br>
      <input autocomplete="off" type="password" placeholder="Password" id="password1" name="password">
      <br><br>
      <input autocomplete="off" type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" id="confirm_password">
      <br><br>
      <button>SignUp</button>
    </form>
</div>
</body>
</html>