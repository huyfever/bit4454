<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145850506-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-145850506-2');
    </script>
    <title>Logged Out</title>

  </head>
  <style>
    body{
      background-color: #595959;
    }
    nav{
      background-color: white;
    }

    #message{
      margin-top: 170px;
      margin-left: 220px;
      background-color: #cccccc;
      padding-right: 500px;
      color: black;
      width: 300px;
    }

    #container{
      padding-top: 10px;
      padding-left: 10px;
      padding-bottom: 10px;
    }
  </style>
  <body>
    <div id="message">
      <div id="container">
      <h4>Thank You.</h4>
      <h4>You have been successfully logged out.</h4>
      <p><a href="Login.php">Click to login again</a></p>
    </div>
    </div>
    <?php
      session_start();
      session_destroy();
      exit;
    ?>
  </body>
</html>
