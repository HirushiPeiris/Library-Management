<?php
include 'db_connect.php';

$result = $conn->query("SELECT * FROM book_borrowing INNER JOIN books ON book_borrowing.book_id = books.book_id INNER JOIN members ON book_borrowing.member_id = members.member_id");

echo "<table border='1'>";
echo "<tr><th>Book Title</th><th>Member Name</th><th>Borrow Date</th><th>Due Date</th><th>Status</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['title']}</td><td>{$row['name']}</td><td>{$row['borrow_date']}</td><td>{$row['due_date']}</td><td>{$row['status']}</td></tr>";
}
echo "</table>";
?>
