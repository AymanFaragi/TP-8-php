<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'];
    $date = date('d-m-Y H:i:s');
    $directory='messages';
    $filename = $directory . "/" . time() . ".txt";
    file_put_contents($filename, "$date|$message");
    header("Location: index.php");
    exit;
}