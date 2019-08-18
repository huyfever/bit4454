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
        background-color: gray;
        font-family: "Lato", sans-serif;
      }

      #whitetext{
        color: white;
      }
      #message{
        margin-left: 100px;
      }
      #wrapper,img{
        width: 100%;
        height: 500px;
      }
    </style>

    <title>Sign Up Successful</title>
  </head>
  <body>
      <!--carousel-->
      <div id="wrapper">
        <img src="VT1.jpg" alt="Banner">
      </div>

      <div id="message">
        <h2 id="whitetext">You have successfully signed up</h2>
        <p><a href="login.php">Click here to login</a></p>
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
