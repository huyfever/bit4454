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

  body{
    background-color: #595959;
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
      <li class=""><a href="InvestigatorSearch.php">Recalls</a></li>
      <li class=""><a href="MessageSeller.php">Message Seller</a></li>
      <li class="active"><a href="InvestigatorDisputes.php">Disputes</a></li>
      <li class=""><a href="Edit.php">Edit Listing</a></li>
      <li class=""><a href="Logout.php">Log Out</a></li>
    </ul>
  </nav>

  <!-- <h2 style = "text-align: center"> Edit Listings </h2>

  <form action="" method="post">
    <select name="param">
      <option value="add">Add</option>
      <!- <option value="edit">Edit</option> ->
      <option value="delete">Delete</option>
    </select>
    <br>
    <label>Product ID:</label> <br> <input type="text" name="productID"><br>
    <label>Listing URL:</label> <br> <input type="text" name="listingURL"><br>
    <label>Product Code:</label> <br> <input type="text" name="productCode"><br>
    <input type="submit" id="submit" name="submit" value="Submit">
  </form> -->

  <h3> Current Refutes </h3>

  <div4>
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

    //recalls table
    $sql3 = "SELECT * FROM Refutes";
    $result3 = $conn->query($sql3);
    if ($result3->num_rows > 0) {
      echo "<table border='2'>
      <tr>
      <th style='text-align: center;'>RefuteID</th>
      <th style='text-align: center;'>ViolationID</th>
      <th style='text-align: center;'>UserID</th>
      <th style='text-align: center;'>Contents</th>
      <th style='text-align: center;'>Date</th>
      </tr>";

      while($row = $result3->fetch_assoc()){
        echo "<tr>";
        echo "<td style='width: 200px; text-align: center';>" . $row['RefuteID'] . "</td>";
        echo "<td style='width: 200px; text-align: center';>" . $row['Viol_ID'] . "</td>";
        echo "<td style='width: 200px; text-align: center';>" . $row['UserID'] . "</td>";
        echo "<td style='width: 500px; text-align: center';>" . $row['Refute_Contents'] . "</td>";
        echo "<td style='width: 500px; text-align: center';>" . $row['Refute_Date'] . "</td>";
        echo "</tr>";
      }

      echo "</table>";
    }

    ?>

    <h3> Resolutions </h3>

    <?php

    //resolutions table
    $sql4 = "SELECT * FROM Resolutions";
    $result4 = $conn->query($sql4);
    if ($result4->num_rows > 0) {
      echo "<table border='2'>
      <tr>
      <th style='text-align: center;'>ResolutionID</th>
      <th style='text-align: center;'>RefuteID</th>
      <th style='text-align: center;'>Reason</th>
      <th style='text-align: center;'>Date</th>
      </tr>";

      while($row = $result4->fetch_assoc()){
        echo "<tr>";
        echo "<td style='width: 200px; text-align: center;'>" . $row['ResolID'] . "</td>";
        echo "<td style='width: 200px; text-align: center;'>" . $row['RefuteID'] . "</td>";
        echo "<td style='width: 700px; text-align: center;'>" . $row['Resol_Reason'] . "</td>";
        echo "<td style='width: 200px; text-align: center;'>" . $row['Resol_Date'] . "</td>";
        echo "</tr>";
      }

      echo "</table>";
    }
    $conn->close();
    ?>
  </div4>
</body>
</html>
