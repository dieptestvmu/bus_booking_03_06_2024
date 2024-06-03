<?php
$servername = "localhost";
$username = "root"; // XAMPP mặc định là root
$password = ""; // XAMPP mặc định là không có mật khẩu
$dbname = "chat_system";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['user'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (user, message) VALUES ('$user', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "Message sent";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT user, message, timestamp FROM messages ORDER BY timestamp ASC";
    $result = $conn->query($sql);

    $messages = array();
    while($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
    echo json_encode($messages);
}

$conn->close();
?>
