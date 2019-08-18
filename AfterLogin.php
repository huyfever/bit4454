<?php
  $username = $_POST['email'];
  $password = $_POST['password'];

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
    $dbusername = "alan";
    $dbpassword = "bit4444";
    $dbname = "CSV_DB";
    global $row;

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    //that new new

    $selected_val = $_POST['logintype'];
    if($selected_val == "Investigator"){
      $sql = "SELECT Admin_Email, Admin_Pass FROM Admin WHERE Admin_Email='$username' AND Admin_Pass='$password'";
    }
    elseif($selected_val == "Customer"){
      $sql = "SELECT UserID, User_Email, User_Pass FROM User WHERE User_Email='$username' AND User_Pass='$password'";
    }
    //end of that new new

    //$sql = "SELECT username, password FROM login WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
      $row = $result->fetch_assoc();
      if($selected_val == "Customer"){
        if(strcmp($username, $row['User_Email']) == 0 && strcmp($password, $row['User_Pass']) == 0)
        {
          session_start();
          $_SESSION['user_email'] = $username;
          $_SESSION['user_pass'] = $password;
          $_SESSION['user_id'] = $row['UserID'];


          echo '<p>Successfully found email and password... Redirecting...</p>';
          header('Refresh: 5; Welcome.php');
        }
        else
        {
          echo '<p>Make sure you have entered the correct information.</p>';
        }
      }
      elseif($selected_val == "Investigator"){
        if(strcmp($username, $row['Admin_Email']) == 0 && strcmp($password, $row['Admin_Pass']) == 0)
        {
          session_start();
          $_SESSION['user_email'] = $username;
          $_SESSION['user_pass'] = $password;
          $_SESSION['user_id'] = $row['UserID'];


          echo '<p>Successfully found email and password... Redirecting...</p>';
          header('Refresh: 5; Welcome2.php');
        }
        else
        {
          echo '<p>Make sure you have entered the correct information.</p>';
        }
      }
  }
    else {
      echo '<p>Make sure you have entered the correct information.ECHO</p>';
      echo $sql;
    }
  }
  else {
    echo '<p>Missing email or password, try again.</p>';
  }

?>
