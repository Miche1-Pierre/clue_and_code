<?php
// game.php: Page principale pour explorer une aventure
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

// Vérifier si une aventure est sélectionnée
if (!isset($_GET['adventure']) || !isset($data['adventures'][$_GET['adventure']])) {
    die('Erreur : Aventure non trouvée.');
}

$adventureKey = $_GET['adventure'];
$adventure = $data['adventures'][$adventureKey];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($adventure['name']); ?> - Exploration</title>
    <link rel="stylesheet" href="/assets/css/binary_shadows_the_lost_algorithm.css">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($adventure['name']); ?></h1>
        <h2>Liste des pièces</h2>
    </header>

    <main>
        <section class="room-list">
            <h3>Pièces disponibles :</h3>
            <ul>
                <?php foreach ($adventure['rooms'] as $key => $roomData): ?>
                    <li>
                        <a href="room.php?adventure=<?php echo urlencode($adventureKey); ?>&room=<?php echo urlencode($key); ?>">
                            <?php echo htmlspecialchars($roomData['name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Escape Game</p>
    </footer>
</body>
</html>
