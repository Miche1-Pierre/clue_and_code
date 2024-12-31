<?php
// room.php: Page pour afficher les détails d'une pièce
session_start();

// Charger les données depuis db.json
$db = file_get_contents('db.json');
if ($db === false) {
    die('Erreur : Impossible de charger les données.');
}
$data = json_decode($db, true);
if ($data === null) {
    die('Erreur : Données JSON invalides.');
}

// Vérifier si une aventure et une pièce sont sélectionnées
if (!isset($_GET['adventure']) || !isset($_GET['room']) || !isset($data['adventures'][$_GET['adventure']]['rooms'][$_GET['room']])) {
    die('Erreur : Pièce ou aventure non trouvée.');
}

$adventureKey = $_GET['adventure'];
$roomKey = $_GET['room'];
$adventure = $data['adventures'][$adventureKey];
$room = $adventure['rooms'][$roomKey];

// Initialiser l'inventaire dans la session si non défini
if (!isset($_SESSION['inventory'])) {
    $_SESSION['inventory'] = [];
}

// Fonction pour récupérer les objets de la pièce
function listObjects($objects) {
    if (empty($objects)) {
        return '<p>Aucun objet trouvé dans cette pièce.</p>';
    }
    $output = '<ul>';
    foreach ($objects as $object) {
        $output .= '<li>' . htmlspecialchars($object) . '</li>';
    }
    $output .= '</ul>';
    return $output;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($room['name']); ?> - Exploration</title>
    <link rel="stylesheet" href="../../assets/css/binary_shadows_the_lost_algorithm.css">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($adventure['name']); ?></h1>
        <h2><?php echo htmlspecialchars($room['name']); ?></h2>
    </header>

    <main>
        <section class="room-details">
            <h3>Objets trouvés dans cette pièce :</h3>
            <?php echo listObjects($room['objects']); ?>
        </section>
    </main>

    <footer>
        <nav class="menu">
            <ul>
                <li><a href="room.php?adventure=<?php echo urlencode($adventureKey); ?>&room=<?php echo urlencode($roomKey); ?>">Search</a></li>
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="puzzle.php?adventure=<?php echo urlencode($adventureKey); ?>&room=<?php echo urlencode($roomKey); ?>">Puzzle</a></li>
            </ul>
        </nav>
    </footer>
</body>
</html>
