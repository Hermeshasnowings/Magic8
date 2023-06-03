<?php
include "database.php";

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit; // Exit the script if there's an error
}

$answer = ''; // Initialize the $answer variable

// Check if the form is submitted
if (isset($_GET['question'])) {
    $query = "SELECT answers FROM sys.answers ORDER BY RAND() LIMIT 1";
    $stmt = $dbh->prepare($query);
    $stmt->execute();

    // Fetch the random answer
    $answer = $stmt->fetchColumn();
}

// Close the database connection
$dbh = null;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Magic 8 ball</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet"> 
</head>

<body>
    <h1>Ask the Magic 8 Ball</h1>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="question">Ask your question:</label>
        <input type="text" name="question" required>
        <input type="submit" value="Shake it!" class="button">
    </form>
    <div class="container">
    <img src="819557.png" alt="Image of magic 8 Ball">
    <div class="answer centered">
    <?php if (!empty($answer)) : ?>
        <p><?php echo $answer; ?></p>
    <?php endif; ?>
    </div>
    </div>
</body>
