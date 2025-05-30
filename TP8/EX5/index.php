<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Livre d'or</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .message { border-bottom: 1px solid #ccc; margin-bottom: 10px; padding-bottom: 10px; }
    </style>
</head>
<body>

<h1>Livre d’or</h1>

<form method="post" action="save.php">
    <label>Message :<br>
        <textarea name="message" rows="5" cols="40" required></textarea>
    </label><br><br>
    <input type="submit" value="Envoyer">
    <link rel="stylesheet" href="styles.css">
</form>

<h2>Messages</h2>

<?php
$directory = "messages";
$files = glob($directory . "/*.txt");


usort($files, function($a, $b) {
    return filemtime($a) - filemtime($b);
});

foreach ($files as $file) {
    $content = file_get_contents($file);
    $lines = explode("|", $content);
    
    if (count($lines) === 2) {
        list($date, $message) = $lines;
        echo "<div class='message'>";
        echo "le <em>$date</em><br>";
        echo nl2br(htmlspecialchars($message));
        echo "</div>";
    }
}
?>

</body>
</html>
