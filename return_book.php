/* Return Books (return_book.php) */
<?php
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaction_id = $_POST["transaction_id"];
    $return_date = date("Y-m-d");
    $due_date = $_POST["due_date"];
    
    if (strtotime($return_date) < strtotime($due_date)) {
        $late_days = 0;
    } else {
        $late_days = (strtotime($return_date) - strtotime($due_date)) / 86400;
    }
    
    $fine = $late_days * 50;
    $conn->query("UPDATE book_borrowing SET status='Returned' WHERE transaction_id='$transaction_id'");
    if ($late_days > 0) {
        $conn->query("INSERT INTO fines (transaction_id, fine_amount, fine_status) VALUES ('$transaction_id', '$fine', 'Unpaid')");
        echo "Book returned successfully! Fine: Rs. $fine";
    } else {
        echo "Book returned successfully with no fine.";
    }
}
?>