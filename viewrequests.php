<?php
// Step 1: Establish a database connection
$servername = "localhost";  // Replace with your server name
$username = "root";     // Replace with your username
$password = "";     // Replace with your password
$dbname = "ct";     // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Query the database
$sql = "SELECT expressInterestID, forename, surname, postalAddress, mobileTelNo, email, sendMethod, catDesc
        FROM CT_expressedInterest
        JOIN CT_category ON CT_expressedInterest.catID = CT_category.catID
        ORDER BY surname";

$result = $conn->query($sql);

// Step 3: Generate the web page
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
    <h1>View Requests</h1>
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

</body>
</html>

<?php
// Step 4: Close the database connection
$conn->close();
?>
