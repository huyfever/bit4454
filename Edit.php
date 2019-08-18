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
    background-color: #595959;
  }

  .errlabel {
    color: red;
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

  #AddListing{
    margin-left: 50px;
  }

  input[type=text]{
    width: 250px;
  }

  #whitetext{
    color:white;
  }

  #Update{
    float: right;
  }

  #Delete{
    float: right;
    padding-right: 200px;
  }
  table{
    border-style:solid;
    border-width:2px;
    border-color:white;
    display: block;
    height: 250px;
    width: 1100px;
    overflow-y: scroll;
    margin-left: 35px;
    color: white;
    margin-top: 20px;
  }

  .column {
  float: left;
  width: 33.33%;
}

/* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
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

  <div class="row">
    <div class="column" id="Add" style="padding-left: 50px;">
      <h3 id="label" > Add Listing </h3>
      <!--Report Form-->
      <form id="Add" class="" action="ThankyouInvest.php" method="post">
        <h5 id="label">Model</h5>
        <input type="text" name="model" value="">
        <h5 id="label">Manufacturer</h5>
        <input type="text" name="manufacturer" value="">
        <h5 id="label">URL</h5>
        <input type="text" name="URL" value="">
        <h5 id="label">Contents</h5>
        <input type="text" name="reportcontents" value=""><br>
        <input type="submit" name="reportsubmit" value="Report Item">
      </form>
    </div>

    <div class="column" id="Update">
      <h3 id="label"> Update </h3>
      <!--Refute Form-->
      <form id = "updateform" class="" action="ThankyouInvest.php" method="post">
        <h5 id="label">Listing ID</h5>
        <input type="text" name="listingid2" value=""><br>
        <h5 id="label">User ID</h5>
        <input type="text" name="userid" value=""><br>
        <h5 id="label">Violation ID</h5>
        <input type="text" name="recallID"><br>
        <select>
          <option value="violation"><label id ="whitetext">Violation</label></option><br>
          <option value="notviolation"><label id ="whitetext">Not a Violation</label></option><br>
        </select>
        <input type="submit" name="updatesubmit" value="Update Listing">
      </form>
    </div>

    <?php
      session_start();
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
    ?>

    <div class="column" id="Delete">
      <h3 id="label">Delete Listing</h3>
      <h5 id="label">Listing ID</h5>
      <form id="deleteform" class="" action="ThankyouInvest.php" method="post">
        <input type="text" name="listingid" value="">
        <input type="submit" name="deletesubmit" value="Delete Listing">
      </form>
    </div>
  </div>

  <!-- <h3 id="label">Current Listings</h3> -->
  <?php
  $sql = "SELECT * FROM Listings";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "<table border='2' id='myTable'width: 1200px; padding-left: 30px;'>
    <tr>
    <th>ListingID</th>
    <th>Listing_URL</th>
    <th>Listing_Contents</th>
    </tr>";

    while($row = $result->fetch_assoc()){
      echo "<tr>";
      echo "<td style='text-align: center;'>" . $row['Listing_ID'] . "</td>";
      echo "<td>" . $row['Listing_Url'] . "</td>";
      echo "<td>" . $row['Listing_Contents'] . "</td>";
      echo "</tr>";
    }

    echo "</table>";
  }
  ?>


</body>
</html>
