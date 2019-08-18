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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145850506-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-145850506-2');
  </script>
  <style>
  * {box-sizing: border-box}
  body {font-family: "Lato", sans-serif;}
  body{
    background-color: #595959;
    color: white;
  }
  nav{
    background-color: white;
  }

  form{
    margin-left: 50px;
    padding-left: 200px;
    padding-top: 50px;
  }
  input{
    color: black;
    width: 300px;
  }

  #box{
    background-color: grey;
    width: 800px;
    height: 500px;
    margin-left: 270px;
    margin-top: 50px;
  }

</style>
</head>
<body>
  <nav>
    <ul class="nav nav-pills nav-justified">
      <li class=""><a href="Welcome2.php">Home</a></li>
      <li class=""><a href="InvestigatorSearch.php">Recalls</a></li>
      <li class="active"><a href="MessageSeller.php">Message Seller</a></li>
      <li class=""><a href="InvestigatorDisputes.php">Disputes</a></li>
      <li class=""><a href="Edit.php">Edit Listing</a></li>
      <li class=""><a href="Logout.php">Log Out</a></li>
    </ul>
  </nav>

  <div id="box">
    <h2 style="margin-left: 50px; padding-left: 220px; padding-top: 20px;">Message Seller</h2>
    <form id="loginform" method="post" action="">
      Seller Email <br> <!--nedds to grab userid based on email-->
      <input type="text" name="selleremail"><br>
      Today's Date<br>
      <input type="text" name="date" placeholder="2019-01-01"><br>
      RefuteID<br> <!-- should be a drop down-->
      <select name="RefuteID" style="color: black;">
        <?php
          $servername = "localhost";
          $username = "alan";
          $password = "bit4444";
          $dbname = "CSV_DB";
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $resultset = $conn->query("SELECT RefuteID FROM Refutes");

          while($rows = $resultset->fetch_assoc()){
            $selectrefuteid = $rows['RefuteID'];
            echo "<option value='";
            echo $selectrefuteid;
            echo "'>";
            echo $selectrefuteid;
            echo "</option>";
          }
        ?>
      </select><br>
      Message<br>
      <textarea name="message" style="color: black;" rows="8" cols="40"></textarea><br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </div>

  <?php
    $servername = "localhost";
    $username = "alan";
    $password = "bit4444";
    $dbname = "CSV_DB";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $useremail="";
    $messagedate = "";
    $messagecontents = "";
    $userid = "";
    $refuteid = "";

    if(isset($_POST['submit'])){
      $useremail = $_POST['selleremail'];
      $messagecontents = $_POST['message'];
      $messagedate = $_POST['date'];
      $refuteID = $_POST['RefuteID'];
      $finduseridSQL = "SELECT * FROM User WHERE User_Email = '$useremail'";
      $result = $conn->query($finduseridSQL);
      $row = $result->fetch_assoc();
      $useridValue = $row['UserID'];

      $messageSQL = "INSERT INTO Messages (RefuteID, UserID, Msg_Contents, Msg_Date) VALUES ('$refuteID', '$useridValue', '$messagecontents', '$messagedate')";
      $insertresult = $conn->query($messageSQL);

    }
    ?>
</html>
