<?php
include 'assets/data/students_data.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des élèves</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>Liste des élèves</h1>
        <ul class="student-list">
            <?php foreach ($students as $index => $student): ?>
                <li class="student-item">
                    <a href="assets/php/student_details.php?index=<?php echo $index; ?>" class="student-link">
                        <?php echo htmlspecialchars($student['prenom'] . ' ' . $student['nom']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
