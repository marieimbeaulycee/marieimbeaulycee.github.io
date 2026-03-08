<?php
// Lister les fichiers MP3 dans le dossier courant

// Récupérer le chemin absolu du dossier courant
$dossier_courant = __DIR__;

// Récupérer tous les fichiers avec l'extension .mp3
$fichiers_mp3 = glob($dossier_courant . "/*.mp3");

// Trier les fichiers par nom (optionnel)
sort($fichiers_mp3);

// En-tête HTML
echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Liste des fichiers MP3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: white;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-left: 4px solid #4CAF50;
        }
        .filename {
            font-weight: bold;
            color: #2196F3;
            margin-bottom: 5px;
        }
        .path {
            font-family: monospace;
            background-color: #f8f9fa;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ddd;
            word-break: break-all;
            cursor: pointer;
        }
        .path:hover {
            background-color: #e9ecef;
        }
        .count {
            margin-bottom: 20px;
            font-size: 1.1em;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Fichiers MP3 disponibles</h1>";

if (count($fichiers_mp3) > 0) {
    echo "<div class='count'>" . count($fichiers_mp3) . " fichier(s) trouvé(s)</div>";
    echo "<ul>";
    
    foreach ($fichiers_mp3 as $fichier) {
        $nom_fichier = basename($fichier);
        echo "<li>";
        echo "<div class='filename'>📁 " . htmlspecialchars($nom_fichier) . "</div>";
        echo "<div class='path' onclick='this.select()'>" . htmlspecialchars($fichier) . "</div>";
        echo "</li>";
    }
    
    echo "</ul>";
} else {
    echo "<p>Aucun fichier MP3 trouvé dans le dossier : " . htmlspecialchars($dossier_courant) . "</p>";
}

echo "</body>
</html>";
?>