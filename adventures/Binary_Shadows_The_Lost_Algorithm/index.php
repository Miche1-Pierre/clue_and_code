<?php
session_start();
$_SESSION['inventory'] = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Binary Shadows : The Lost Algorithm</title>
    <link rel="stylesheet" href="/assets/css/binary_shadows_the_lost_algorithm.css">
</head>

<body>
    <?php include $_SERVER["DOCUMENT_ROOT"] . '/includes/header.php'; ?>
    <div class="overlay"></div>
    <div class="adventure-start">
        <div class="adventure-story">
            <h1>The Binary Shadows : The Lost Algorithm</h1>
            <div class="content">
                <p>Walking past the tech academy late at night, you notice strange green lights pulsing through the windows. The building, locked for the night, suddenly clicks open as you approach. A robotic voice greets you:</p>
                <p><em>'Access granted. Begin the sequence.'</em></p>
                <p>The door slams shut behind you. There's no way out but forward. Will you solve the enigma within?</p>
            </div>
            <button class="start-btn" onclick="window.location.href='game.php?adventure=Binary_Shadows_The_Lost_Algorithm';">Start Adventure</button>
        </div>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"] . '/includes/footer.php'; ?>

</body>

</html>