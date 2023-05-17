<?php
$servername = "localhost";  
$username = "root";    
$password = "";     
$dbname = "ct";    
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT expressInterestID, forename, surname, postalAddress, mobileTelNo, email, sendMethod, catDesc
        FROM CT_expressedInterest
        JOIN CT_category ON CT_expressedInterest.catID = CT_category.catID
        ORDER BY surname";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Requests</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
      <link rel="stylesheet" type="text/css" href="styles.css">

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
  <div class="heading"  >
    <h2 class="sub-heading"  style="margin-left:70px" ></h2>
   </div>
   <div class="heading"  >
    <h2 class="sub-heading"  style="margin-left:70px" >View Requests</h2>
    <div class="line"></div>
   </div>
    <table>
        <tr>
            <th>Forename</th>
            <th>Surname</th>
            <th>Postal Address</th>
            <th>Mobile Tel No</th>
            <th>Email</th>
            <th>Send Method</th>
            <th>Category Description</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["forename"]."</td>";
                echo "<td>".$row["surname"]."</td>";
                echo "<td>".$row["postalAddress"]."</td>";
                echo "<td>".$row["mobileTelNo"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["sendMethod"]."</td>";
                echo "<td>".$row["catDesc"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No requests found</td></tr>";
        }
        ?>

    </table>
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

<?php

$conn->close();
?>
