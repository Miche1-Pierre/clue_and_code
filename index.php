<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Mystery School</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="background">
        <div class="overlay"></div>
        <div class="content">
            <h1>Welcome to Mystery Numeric School</h1>
            <p>Select your adventure to begin !</p>
            <div class="adventures">
                <a href="adventures/The_Enigma_Protocol/index.php" class="adventure-btn">The Enigma Protocol</a>
                <a href="adventures/Binary_Shadows_The_Lost_Algorithm/index.php" class="adventure-btn">Binary Shadows The Lost Algorithm</a>
                <a href="carte.php" class="adventure-btn">Test carte interactive</a>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

</body>

</html>