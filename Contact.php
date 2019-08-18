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
  body {
    font-family: "Lato", sans-serif;
  }

  .errlabel {
    color: red;
  }

  body{
    background-color: #595959;
  }

  nav{
    background-color: white;
  }

  #label{
    color: white;
  }

  p{
    color: white;
  }

  label{
    color: white;
  }

  #refuteform{
    margin-right: 200px;
  }

  #reportform{
    margin-left: 50px;
  }

  input[type=text]{
    width: 300px;
  }

  .column {
  float: left;
  width: 50%;
  }

  .row {
    margin-left: 190px;
    margin-top: 60px;
    background-color: grey;
    padding: 20px;
    width: 800px;

  }



</style>
</head>
<body>
  <nav>
    <ul class="nav nav-pills nav-justified">
      <li class=""><a href="Welcome.php">Home</a></li>
      <li class=""><a href="RecallViolationSearch.php">Recall/Violations</a></li>
      <li class="active"><a href="Contact.php">Contact Us</a></li>
      <li class=""><a href="logout.php">Log Out</a></li>
    </ul>
  </nav>
  <div class="row">
  <div class="column">
    <h3 id="label" style="margin-left: 50px"> Report Potential Violation</h3>
    <!--Report Form-->
    <form id="reportform" class="" action="Thankyou.php" method="post">
      <h5 id="label">Model</h5>
      <input type="text" name="model" value="">
      <h5 id="label">Manufacturer</h5>
      <input type="text" name="manufacturer" value="">
      <h5 id="label">URL</h5>
      <input type="text" name="URL" value="">
      <h5 id="label">Contents</h5>
      <input type="text" name="reportcontents" value=""><br>
      <input type="submit" name="reportsubmit" value="Submit">
    </form>

    <?php
    session_start();
    $servername = "localhost";
    $username = "alan";
    $password = "bit4444";
    $dbname = "CSV_DB";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    ?>
  </div>

    <div class="column">
      <h3 style="color: white;">Refute Violation</h3>
      <!--Refute Form-->
      <form id = "refuteform" class="" action="Thankyou.php" method="post">
        <h5 id="label">Violation ID</h5>
        <input type="text" name="violationid" value="">
        <h5 id="label">Today's Date</h5>
        <input type="text" name="date" placeholder="YYYY/MM/DD">
        <h5 id="label">Contents</h5>
        <textarea name="refutecontents" style="color: black;" rows="8" cols="40"></textarea><br>
        <input type="submit" name="refutesubmit" value="Submit">
      </form>
    </div>
  </div>

  <?php
  //Refute Violation CODE
  $servername = "localhost";
  $username = "alan";
  $password = "bit4444";
  $dbname = "CSV_DB";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $violationID = "";
  $refutedate = "";
  $refutecontents = "";


  ?>


</body>
</html>
