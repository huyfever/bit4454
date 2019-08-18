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
  <script>
    function myFunctionRecall() {

      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInputRecall");
      filter = input.value.toUpperCase();
      table = document.getElementById("recallTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
  }
  </script>
  <script>
  function myFunctionViolation() {

    // Declare variables
    var input2, filter2, table2, tr2, td2, i2, txtValue2;
    input2 = document.getElementById("myInputViolation");
    filter2 = input2.value.toUpperCase();
    table2 = document.getElementById("violTable");
    tr2 = table2.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr2.length; i++) {
      td2 = tr2[i].getElementsByTagName("td")[1];
      if (td2) {
        txtValue2 = td2.textContent || td2.innerText;
        if (txtValue2.toUpperCase().indexOf(filter2) > -1) {
          tr2[i].style.display = "";
        } else {
          tr2[i].style.display = "none";
        }
      }
    }
  }
  </script>
  <style>
  * {box-sizing: border-box}
  body{
    font-family: "Lato", sans-serif;
    background-color: #595959;
  }
  div {
    text-align: center;
  }

  form {
    text-align: center;
  }

  h3 {
    text-align: center;
    color: white;
  }

  label{
    color: white;
  }

  h2{
    color: white;
  }

  div4{
    color: white;
  }

  nav{
    background-color: white;
  }

  table{
    border-style:solid;
    border-width:2px;
    border-color:white;
    display: block;
    height: 250px;
    overflow-y: scroll;
  }

  #violationsearch{
    color: black;
  }

  </style>
</head>
<body>
  <nav>
    <ul class="nav nav-pills nav-justified">
      <li class=""><a href="Welcome2.php">Home</a></li>
      <li class="active"><a href="InvestigatorSearch.php">Recalls</a></li>
      <li class=""><a href="MessageSeller.php">Message Seller</a></li>
      <li class=""><a href="InvestigatorDisputes.php">Disputes</a></li>
      <li class=""><a href="Edit.php">Edit Listing</a></li>
      <li class=""><a href="Logout.php">Log Out</a></li>
    </ul>
  </nav>

<br>
<h3> Recall Search List </h3>
<!-- Recalls Search Bar -->
<input type="text" id="myInputRecall" name="query" onkeyup="myFunctionRecall()" placeholder="search by model"/>

<?php
$servername = "localhost";
$username = "alan";
$password = "bit4444";
$dbname = "CSV_DB";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$searchparam = "";
$recallquery = $_POST['query'];
if(isset($_POST['recallsearchsubmit'])){
  $searchparam = $_POST['query'];
  $recallsql = "SELECT FROM Recalls WHERE Model LIKE '%{$recallquery}%'";
  $recallresult = $conn->query($recallsql);
  echo $recallresult;
}
?>



<div4>
  <?php
  session_start();
  $servername = "localhost";
  $username = "alan";
  $password = "bit4444";
  $dbname = "CSV_DB";
  $productid = $_POST['productID'];
  $listingurl = $_POST['listingURL'];
  $productcode = $_POST['productCode'];

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if(isset($_POST['submit'])){
    $selected_val = $_POST['param'];  // Storing Selected Value In Variable
    if($selected_val == "add"){
      $sql = "INSERT INTO Listings (Product_ID, Listing_URL, Prod_Code) VALUES ($productid, '$listingurl', $productcode)";
    }
    elseif($selected_val == "edit"){
      $sql = "SELECT * FROM Listings WHERE Product_ID LIKE '%{$productid}%'";
    }
    elseif($selected_val == "delete"){
      $sql = "DELETE FROM Listings WHERE Product_ID=$productid AND Listing_URL='$listingurl' AND Prod_Code='$productcode'";
    }
    $result = $conn->query($sql);
  }

  //recalls table
  $sql3 = "SELECT * FROM Recalls";
  $result3 = $conn->query($sql3);
  if ($result3->num_rows > 0) {
    echo "<table border='2' id='violTable'>
    <tr>
    <th style='text-align: center;'>RecallID</th>
    <th style='text-align: center;'>Manufacturer</th>
    <th style='text-align: center;'>Model</th>
    <th style='text-align: center;'>RecalledDate</th>
    <th style='text-align: center;'>Reason</th>
    <th style='text-align: center;'>Country</th>
    </tr>";

    while($row = $result3->fetch_assoc()){
      echo "<tr>";
      echo "<td style='width: 100px; text-align: center;'>" . $row['RecallID'] . "</td>";
      echo "<td style='width: 100px; text-align: center;'>" . $row['Manufacturer'] . "</td>";
      echo "<td style='width: 100px; text-align: center;'>" . $row['Model'] . "</td>";
      echo "<td style='width: 100px; text-align: center;'>" . $row['RecallDate'] . "</td>";
      echo "<td style='width: 100px; text-align: center;'>" . $row['Reason'] . "</td>";
      echo "<td style='width: 100px; text-align: center;'>" . $row['ManufacturerCountry'] . "</td>";
      echo "</tr>";
    }

    echo "</table>";
  }


  ?>

  <br>
  <h3> Violations Search List </h3>
  <input type="text" id="myInputViolation" name="query2" onkeyup="myFunctionViolation()" placeholder="search by model" style="color: black;"/>
  <?php
  //violations table
  $sql4 = "SELECT Viol_ID, Model, Manufacturer FROM Recalls R RIGHT JOIN Violations V ON R.RecallID = V.RecallID";
  $result4 = $conn->query($sql4);
  if ($result4->num_rows > 0) {
    echo "<table border='2' id='violTable'>
    <tr>
    <th style='text-align: center;'>ViolationID</th>
    <th style='text-align: center;'>Model</th>
    <th style='text-align: center;'>Manufacturer</th>
    </tr>";

    while($row = $result4->fetch_assoc()){
      echo "<tr>";
      echo "<td style='width: 200px; text-align: center;'>" . $row['Viol_ID'] . "</td>";
      echo "<td style='width: 700px; text-align: center;'>" . $row['Model'] . "</td>";
      echo "<td style='width: 500px; text-align: center;'>" . $row['Manufacturer'] . "</td>";
      echo "</tr>";
    }

    echo "</table>";
  }
  $conn->close();
  ?>

</div4>
</body>
</html>
