<?php
// Step 1: Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ct";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $postalAddress = $_POST['postal_address'];
    $mobileNumber = $_POST['mobile_number'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $sendMethod = $_POST['send_method'];

    // Insert data into the CT_expressedInterest table
    $sql = "INSERT INTO CT_expressedInterest (forename, surname, postalAddress, mobileTelNo, email, sendMethod, catID)
            VALUES ('$forename', '$surname', '$postalAddress', '$mobileNumber', '$email', '$sendMethod', '$category')";
if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Record inserted successfully!");</script>';
} else {
    echo '<script>alert("Error: ' . $sql . '\n' . $conn->error . '");</script>';
}
}

// Retrieve categories from the CT_category table
$sql = "SELECT catID, catDesc FROM CT_category";
$result = $conn->query($sql);
$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[$row['catID']] = $row['catDesc'];
    }
}

// Step 4: Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Credits Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
    <script src='main.js'></script>
</head>
<body>
           
<nav class="nav">
      <div>
          SVG IMG
      </div>
    <ul class="nav-ul">
      <li><a href="landing.html">Home</a></li>
      <li><a href="viewrequests.php">View Requests</a></li>
      <li><a href="find.php">Find Out More</a></li>
      <li><a href="credits.html">Credits</a></li>
    </ul>
  </nav>

   <div class="about">
          <div class="abt-content">
              <div class="abt-box">
                <div class="heading">
                  <h2 class="sub-heading">Find Out More</h2>
                  <div class="line"></div>
                 </div>               
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form">
  <label for="forename">Forename:</label>
  <input type="text" id="forename" name="forename" required>

  <label for="surname">Surname:</label>
  <input type="text" id="surname" name="surname" required>

  <label for="postal_address">Postal Address:</label>
  <input type="text" id="postal_address" name="postal_address" required>

  <label for="mobile_number">Mobile Number:</label>
  <input type="tel" id="mobile_number" name="mobile_number" required>

  <label for="email">Email Address:</label>
  <input type="email" id="email" name="email" required>

  <label for="category">Interested Category:</label>
  <select id="category" name="category" required>
    <?php foreach ($categories as $catID => $catDesc) : ?>
        <option value="<?php echo $catID; ?>"><?php echo $catDesc; ?></option>
    <?php endforeach; ?>
  </select>

  <label for="send_method">Send Method:</label>
  <select id="send_method" name="send_method" required>
    <option value="post">Post</option>
    <option value="email">Email</option>
  </select>

  <button type="submit" style="margin-top:10px">Submit</button>
</form>


              </div>
          </div>
          <div class="abt-img">
          </div>
      </div>











<div class="location">
        <div class="myloc">
            <h1>Chollerton Tearooms</h1>
            <h3>A relaxing country hotel at the edge of Oulton Broad, Suffolk. Treat yourself, because everyone deserves a holiday.</h3>
            <button>BOOK NOW</button>
            
                <div class="contact">
                  <div>
                    <img src="assets/icons8-phone.svg"  style="width: 32px; fill:white"> 01916980085
                  </div> 
                  <div>
                    <img src="assets/email.svg"  style="width: 32px; fill:white">  info@chollertontearooms.co.uk
                  </div>
                  <div>
                    <img src="assets/email.svg"  style="width: 32px; fill:white">  LOCATION
                  </div>

                  </div>
            
        </div>
        <!--div class="map">
            ADD MAP
        </div-->

    </div>
<div class="footer">
    <div class="contain">
    <div class="col">
      <h1>Company</h1>
      <ul>
        <li>About</li>
        <li>Mission</li>
        <li>Services</li>
        <li>Social</li>
        <li>Get in touch</li>
      </ul>
    </div>
    
    <div class="col">
      <h1>Support</h1>
      <ul>
        <li>Contact us</li>
        <li>Web chat</li>
        <li>Open ticket</li>
      </ul>
    </div>
    <div class="col social">
      <h1>Social</h1>
      <ul>
        <li><img src="assets/icons8-facebook (1).svg" width="32" style="width: 32px; fill:white"></li>
        <li><img src="assets/icons8-insta.svg" width="32" style="width: 32px;"></li>
        <li><img src="assets/icons8-whatsapp (1).svg" width="32" style="width: 32px;"></li>

      </ul>
    </div>
  <div class="clearfix"></div>
  </div>
  </div>

</body>
</html>
