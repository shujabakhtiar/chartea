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
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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

  <button type="submit">Submit</button>
</form>

</body>
</html>
