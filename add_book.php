/* Add Books (add_book.php) */
<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $author = trim($_POST["author"]);
    if (empty($title) || empty($author)) {
        die("Title and author cannot be empty.");
    }
    $sql = "INSERT INTO books (title, author, availability) VALUES ('$title', '$author', 'Available')";
    $conn->query($sql);
    echo "Book added successfully!";
}
?>