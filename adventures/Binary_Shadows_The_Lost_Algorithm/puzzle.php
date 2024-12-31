<?php
session_start();
$adventureId = $_GET['adventure'];
$roomId = $_GET['room'];

// Charger les données
$data = json_decode(file_get_contents('db.json'), true);
$currentPuzzle = $data['adventures'][$adventureId]['rooms'][$roomId]['puzzle'];

// Vérifier si une réponse a été soumise
if (isset($_POST['answer'])) {
    $userAnswer = strtolower(trim($_POST['answer']));
    $correctAnswer = "algorithm";

    if ($userAnswer === $correctAnswer) {
        echo "<p>Correct! You solved the puzzle.</p>";
        $_SESSION['inventory'][] = "Special Key";
    } else {
        echo "<p>Incorrect. Try again.</p>";
    }
}

echo "<h1>Puzzle</h1>";
echo "<p>" . $currentPuzzle . "</p>";

// Formulaire pour soumettre une réponse
?>
<form method="POST">
    <label for="answer">Your Answer:</label>
    <input type="text" name="answer" id="answer" required>
    <button type="submit">Submit</button>
</form>

<a href="room.php?adventure=<?php echo $adventureId; ?>&room=<?php echo $roomId; ?>">Back to Room</a>

<div class="nav">
    <a href="room.php?adventure=<?php echo $adventureId; ?>&room=<?php echo $roomId; ?>">Search</a>
    <a href="inventory.php?adventure=<?php echo $adventureId; ?>">Inventory</a>
    <a href="puzzle.php?adventure=<?php echo $adventureId; ?>&room=<?php echo $roomId; ?>">Puzzle</a>
</div>