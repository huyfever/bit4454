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
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145850506-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-145850506-2');
  </script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  * {box-sizing: border-box}
  body {
    font-family: "Lato", sans-serif;
  }
  h3 {
    text-align: center;
    color: white;
  }
  p {
    text-align: center;
    color: white;
  }
  nav{
    background-color: white;
  }
  body{
    background-color: #595959;
  }

</style>
</head>
<body>
  <nav>
    <ul class="nav nav-pills nav-justified">
      <li class="active"><a href="Welcome2.php">Home</a></li>
      <li class=""><a href="InvestigatorSearch.php">Recalls</a></li>
      <li class=""><a href="MessageSeller.php">Message Seller</a></li>
      <li class=""><a href="InvestigatorDisputes.php">Disputes</a></li>
      <li class=""><a href="Edit.php">Edit Listing</a></li>
      <li class=""><a href="Logout.php">Log Out</a></li>
    </ul>
  </nav>
  <h3>Welcome to For-Sale List Monitoring</h3>
  <p>View and report recalled items illegally sold online</p>
  <h3>About Us</h3>
  <p>We are a team of students from Virginia Tech composed of many different backgrounds trying to create a powerful web application</p>
  <br />

  <div class="imgbox">
    <img class="center-fit"src="CPSC1.jpg">
  </div>

  <br/>
  <script>
  function openMgr(evt, majorName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(majorName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>

</body>
</html>
