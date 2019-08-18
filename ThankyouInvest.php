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
    <title>Thank You</title>

    <style>
      body{
        background-color: #595959;
      }
      nav{
        background-color: white;
      }

      #message{
        margin-top: 100px;
        margin-left: 400px;
        background-color: grey;
        width: 500px;
        color: white;
        padding: 50px;
      }
    </style>

  </head>
  <body>
    <nav>
      <ul class="nav nav-pills nav-justified">
        <li class=""><a href="Welcome2.php">Home</a></li>
        <li class=""><a href="InvestigatorSearch.php">Recalls</a></li>
        <li class=""><a href="MessageSeller.php">Message Seller</a></li>
        <li class=""><a href="InvestigatorDisputes.php">Disputes</a></li>
        <li class="active"><a href="Edit.php">Edit Listing</a></li>
        <li class=""><a href="Logout.php">Log Out</a></li>
      </ul>
    </nav>

    <?php
      $servername = "localhost";
      $username = "alan";
      $password = "bit4444";
      $dbname = "CSV_DB";
      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $model = "";
      $manufacturer = "";
      $URL = "";
      $contents = "";

      if(isset($_POST['reportsubmit'])){
        $model = $_POST['model'];
        $manufacturer = $_POST['manufacturer'];
        $URL = $_POST['URL'];
        $contents = $_POST['reportcontents'];
        $reportSQL = "INSERT INTO Listings (Listing_URL, Listing_Contents) VALUES ('$URL', '$contents')";
        $reportresult = $conn->query($reportSQL);
      }

      if(isset($_POST['updatesubmit'])){
        $recallid = $_POST['recallID'];
        $userid = $_POST['userID'];
        $sql2 = "INSERT INTO Violations (RecallID, UserID) VALUES ('$recallid', '$userid')";
        $result = $conn->query($sql2);

        $listingID2 = $_POST['listingid2'];
        $deletesql = "DELETE FROM Listings WHERE Listing_ID = '$listingID2'";
        $deleteresult = $conn->query($deletesql);
      }

      if(isset($_POST['deletesubmit'])){
        $listingID = $_POST['listingid'];
        $deletesql = "DELETE FROM Listings WHERE Listing_ID = '$listingID'";
        $deleteresult = $conn->query($deletesql);
      }

      $violationID = "";
      $refutedate = "";
      $refutecontents = "";

      if(isset($_POST['refutesubmit'])){
        $violationID = $_POST['violationid'];
        $refutedate = $_POST['date'];
        $refutecontents = $_POST['refutecontents'];
        $refuteSQL = "INSERT INTO Refutes (Viol_ID, Refute_Date, Refute_Contents) VALUES ('$violationID', '$refutedate', '$refutecontents')";
        $refuteresult = $conn->query($refuteSQL);
        echo $refuteSQL;



        echo "<br>";

        echo "<br>";

        echo "<br>";

      }
    ?>

    <div id="message">
      <h4>Thank you for your help</h4>
      <br>
      <h4>We will review the report and update accordingly</h4>
      <p><a href="Welcome.php" style="color: white;">Return Home</a></p>
    </div>
  </body>
</html>
