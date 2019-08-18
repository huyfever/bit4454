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

    <style>
      body{
        background-color: #595959;
        font-family: "Lato", sans-serif;

      }

      #marginleft{
        margin-left: 700px;

      }
      #loginform{
        color: white;;
      }
      .imgbox {
          display: grid;
          height: 100%;
        }
        .center-fit {
          max-width: 100%;
          max-height: 100vh;
          margin: auto;
        }

        #column {
        float: left;
        width: 50%;
      }
    </style>

    <title>Sign Up</title>

  </head>

  <body>
    <div id="column">
      <div class="imgbox">
        <img class="center-fit" src="CPSC2.jpg" style="height: 700px; margin-top: 0px;">
      </div>
    </div id="column">
    <div id="marginleft">
    <div id="column">
      <h3 style="color: white;">Please fill out the items below to sign up</h3>
      <form id="loginform" method="post" action="SignupThankyou.php">
        Email <br>
        <input type="text" name="username"><br>
        Password<br>
        <input type="text" name="password"><br>
        First Name<br>
        <input type="text" name="firstname"><br>
        Last Name<br>
        <input type="text" name="lastname"><br>
        Phone Number<br>
        <input type="text" name="phonenumber"><br>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>
    </div>

    <?php
      $servername = "localhost";
      $username = "alan";
      $password = "bit4444";
      $dbname = "CSV_DB";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $SUusername="";
      $SUpassword="";
      $SUfirstname="";
      $SUlastname="";
      $SUphonenumber="";

      if(isset($_POST['submit'])){
        $SUusername = $_POST['username'];
        $SUpassword = $_POST['password'];
        $SUfirstname = $_POST['firstname'];
        $SUlastname = $_POST['lastname'];
        $SUphonenumber = $_POST['phonenumber'];
        $sql = "INSERT INTO User (User_Email, User_Pass, User_FirstName, User_LastName, User_Phone) VALUES ('$SUusername', '$SUpassword', '$SUfirstname', '$SUlastname', '$SUphonenumber')";
        $result = $conn->query($sql);
      }
    ?>
  </body>
</html>
