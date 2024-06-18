<?php
include '../data/students_data.php';

function getPassionEmoji($passion)
{
    $emojis = [
        "Football" => "⚽",
        "Lecture" => "📚",
        "Musique" => "🎵",
        "Cuisine" => "🍳",
        "Voyage" => "✈️",
        "Photographie" => "📸",
        "Cinéma" => "🎬",
        "Danse" => "💃",
        "Peinture" => "🎨",
        "Jeux Vidéo" => "🎮",
        "Surf" => "🏄"
    ];
    return $emojis[$passion] ?? "";
}

if (isset($_GET['index']) && is_numeric($_GET['index'])) {
    $index = (int) $_GET['index'];
    if (isset($students[$index])) {
        $student = $students[$index];
    } else {
        echo "Élève non trouvé.";
        exit;
    }
} else {
    echo "Index non valide.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'élève</title>
    <link rel="stylesheet" href="../css/details.css">
</head>

<body>
    <div class="container">
        <img src="../img/eleve/<?php echo htmlspecialchars($student['nom']); ?>.png" class="student-image">
        <h1>
            <?php echo htmlspecialchars($student['prenom']); ?>
            <?php echo htmlspecialchars($student['nom']); ?>
        </h1>

        <div class="student-details">
            <p>
                <strong>
                    <?php echo htmlspecialchars($student['prenom']); ?>
                    <?php echo htmlspecialchars($student['nom']); ?>
                    as <?php echo htmlspecialchars($student['age']); ?> ans
                </strong>

            </p>
            <p>
                <strong>
                    <?php echo htmlspecialchars($student['prenom']); ?>
                    <?php echo htmlspecialchars($student['nom']); ?>
                    habite à <?php echo htmlspecialchars($student['ville']); ?></strong>

                <img src="../img/<?php echo htmlspecialchars($student['ville']); ?>.png" class="city-image">
            </p>

            <p>
                <?php
                $passions = array_map(function ($passion) {
                    return getPassionEmoji($passion) . " " . htmlspecialchars($passion);
                }, $student['passions']);
                ?>
                <strong>
                    <?php echo htmlspecialchars($student['prenom']); ?>
                    <?php echo htmlspecialchars($student['nom']); ?>
                    as comme passion : <br>
                    <?php
                    echo implode(" | ", $passions);
                    ?>
                </strong>

            </p>
        </div>
        <a href="../../index.php" class="back-link">Retour à la liste</a>
    </div>
</body>

</html>