<?php

  $username = $_POST['Username'];
  $password = $_POST['Password'];

  echo 'Trying to log into... ';
  echo $username;
  echo ' with password ';
  echo $password;

  $error = false;
  $loginOK = false;

  if(empty($username) || empty($password)) {
    $error = true;
  }

  if (!$error) {
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $dbname = "Textbook_Reservation";
    global $row;

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Username, Password FROM User WHERE Username='$username' AND Password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
      $row = $result->fetch_assoc();
      if(strcmp($username, $row['Username']) == 0 && strcmp($password, $row['Password']) == 0)
      {
        $loginOK = true;
      }
      else
      {
        echo '<p>Make sure you have entered the correct information.</p>';
      }
    }
    else {
      echo '<p>Make sure you have entered the correct information.</p>';
    }

    if($loginOK)
    {
      session_start();
      $_SESSION['Username'] = $username;
      $_SESSION['Password'] = $password;
      echo '<p>Successfully found username and password... Redirecting...</p>';
      header('Refresh: 5; Welcome.php');
    }
  }
  else {
    echo '<p>Missing username or password, try again.</p>';
  }
?>
