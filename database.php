<?php $host = 'database-1.cehrannj89ud.eu-north-1.rds.amazonaws.com'; // RDS endpoint
$dbname = ''; // name of the database
$user = 'admin'; // my login
$password = 'Integraftw8484';
 // password for login

 try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit; // Exit the script if there's an error
}

?>
