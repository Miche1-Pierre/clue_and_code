<?php
session_start();
$_SESSION['inventory'] = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Enigma Protocol</title>
    <link rel="stylesheet" href="../../assets/css/the_enigma_protocol.css">
</head>

<body>
    <?php include('../../includes/header.php'); ?>
    <div class="overlay"></div>
    <div class="adventure-start">
        <div class="adventure-story">
            <h1>The Enigma Protocol</h1>
            <div class="content">
                <p>Late at night, you and your friends pass by the tech academy and notice a strange blue light flickering in a top-floor window. The building should be locked, but the door creaks open as you approach. Inside, a holographic display lights up with the words:</p>
                <p>'Protocol breached. Unlock the truth.'</p>
                <p>Before you can retreat, the door locks behind you. The academy’s secrets now rest in your hands.</p>
            </div>
            <button class="start-btn" onclick="window.location.href='room.php';">Start Adventure</button>
        </div>
    </div>
    <?php include('../../includes/footer.php'); ?>

</body>

</html>