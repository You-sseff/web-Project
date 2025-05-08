<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur 404</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
            color: #333;
        }
        .error-container {
            text-align: center;
            max-width: 600px;
        }
        .error-code {
            font-size: 10rem;
            font-weight: bold;
            color: #e63946;
        }
        .error-message {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .error-description {
            font-size: 1rem;
            color: #6c757d;
        }
        .btn-home {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }
        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Page non trouvée</div>
        <div class="error-description">
            Désolé, la page que vous recherchez n'existe pas ou a été déplacée.
        </div>
        <a href="liste_offre_emplois.php" class="btn-home">Retour à la page précédente</a>
    </div>
</body>
</html>