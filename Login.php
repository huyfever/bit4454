<?php
// define variables and set to empty values
$password = $email = "";

if (isset($_POST["submit"])) {
  if(isset($_POST["email"])) $email=$_POST["email"];
  if(isset($_POST["password"])) $password=$_POST["password"];
  if(!empty($password) && !empty($email)) {
    header("HTTP/1.1 307 Temporary Redirect");
    header("Location: AfterLogin.php");
  } else {
    $err = true;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>CPSC</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <script src="jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145850506-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-145850506-2');
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  * {box-sizing: border-box}

  #chunk{
    text-align: center;
  }

  #textright{
    text-align: right;
    margin-right: 4.55in;
  }

  #textleft{
    text-align: left;
    margin-left: 5in;
  }

  #textwhite{
    color: white;
  }

  .errlabel{
    color: red;
  }

  body{
    background-color: #595959;
    font-family: "Lato", sans-serif;
  }

  img{
    margin-left: 0.6in;
  }

  h2{
    color: white;
  }

  p{
    color: white;
  }

  .inputlabel{
    color: white;
  }

</style>

</head>
<body>
  <div id="chunk">
    <div id="textleft">
      <br>
      <img src="CPSC.jpg">
      <h2> Welcome to CPSC Login </h2>
      <p>Login to Begin</p>


      <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <input type="radio" name="logintype" value="Investigator"> <label id="textwhite">Investigator</label><br>
        <input type="radio" name="logintype" value="Customer"> <label id="textwhite">Customer</label><br>

        <label class='inputlabel'>Email:</label><br>
        <input type="text" size="50" name="email" placeholder="example@example.com"><br>
        <?php
        if ($err && empty($email)) {
          echo "<label class='errlabel'>Error: Please enter an email</label><br>";
        }
        ?>

        <label class='inputlabel'>Password:</label><br>
        <input type="password" size="50" name="password" placeholder="******"><br>
        <?php
        if ($err && empty($password)) {
          echo "<label class='errlabel'>Error: Please enter a password</label>";
        }
        ?>
      </div>
      <div id="textleft" style="color: white;">
        Not a member? <a href="signup.php">Sign up here!</a>
      </div>
      <div id="textright">
        <input type="submit" name="submit" value="Submit">
      </div>
    </form>
  </div>

</body>
</html>
