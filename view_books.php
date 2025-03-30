<?php
include 'db_connect.php';

$result = $conn->query("SELECT * FROM books");

echo "<table border='1'>";
echo "<tr><th>Title</th><th>Author</th><th>Availability</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['title']}</td><td>{$row['author']}</td><td>{$row['availability']}</td></tr>";
}
echo "</table>";
?>
