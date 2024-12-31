<?php
session_start();
$adventureId = $_GET['adventure'];

// Initialiser une session pour l'inventaire si ce n'est pas déjà fait
if (!isset($_SESSION['inventory'])) {
    $_SESSION['inventory'] = []; // Par défaut, un inventaire vide
}

// Exemple d'ajout d'objet (vous pouvez le remplacer par une logique réelle)
if (isset($_GET['addItem'])) {
    $item = $_GET['addItem'];
    if (!in_array($item, $_SESSION['inventory'])) {
        $_SESSION['inventory'][] = $item;
    }
}

// Afficher l'inventaire
echo "<h1>Inventory</h1>";

if (!empty($_SESSION['inventory'])) {
    echo "<ul>";
    foreach ($_SESSION['inventory'] as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Your inventory is empty.</p>";
}

// Ajouter un lien de retour
echo "<a href='game.php?adventure=$adventureId'>Back to Game</a>";
?>

<div class="nav">
    <a href="room.php?adventure=<?php echo $adventureId; ?>&room=<?php echo $roomId; ?>">Search</a>
    <a href="inventory.php?adventure=<?php echo $adventureId; ?>">Inventory</a>
    <a href="puzzle.php?adventure=<?php echo $adventureId; ?>&room=<?php echo $roomId; ?>">Puzzle</a>
</div>
