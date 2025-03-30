/* Borrow Books (borrow_book.php) */
<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $member_id = $_POST["member_id"];
    $book_id = $_POST["book_id"];
    $staff_id = $_POST["staff_id"];
    $borrow_date = date("Y-m-d");
    $due_date = date("Y-m-d", strtotime("+7 days"));
    
    $sql = "INSERT INTO book_borrowing (member_id, book_id, staff_id, borrow_date, due_date, status) VALUES ('$member_id', '$book_id', '$staff_id', '$borrow_date', '$due_date', 'Borrowed')";
    $conn->query($sql);
    $conn->query("UPDATE books SET availability='Not Available' WHERE book_id='$book_id'");
    echo "Book borrowed successfully!";
}
?>