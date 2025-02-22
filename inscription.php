<?php
require 'db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    if (empty($nom) || empty($prenom) || empty($username) || empty($password) || empty($confirm_password)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        try {
            $checkUser = $pdo->prepare("SELECT * FROM inscription WHERE username = ?");
            $checkUser->execute([$username]);

            if ($checkUser->rowCount() > 0) {
                $error = "Ce nom d'utilisateur est déjà pris.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $requete = $pdo->prepare("INSERT INTO inscription (nom, prenom, username, password) VALUES (?, ?, ?, ?)");
                if ($requete->execute([$nom, $prenom, $username, $hashedPassword])) {
                    header("Location: login.php");
                    exit;
                } else {
                    $error = "Une erreur s'est produite lors de l'inscription.";
                }
            }
        } catch (PDOException $e) {
            $error = "Erreur database : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="text-3xl font-bold underline text-center">Inscription</h1>

    <form action="" method="post" class="max-w-md mx-auto mt-8 bg-white p-6 rounded shadow">
        <?php if (!empty($error)): ?>
            <div class="mb-4 p-2 bg-red-100 text-red-700 border border-red-400 rounded">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <div class="mb-4">
            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
            <input type="text" name="nom" id="nom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= htmlspecialchars($nom ?? '') ?>">
        </div>

        <div class="mb-4">
            <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= htmlspecialchars($prenom ?? '') ?>">
        </div>

        <div class="mb-4">
            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= htmlspecialchars($username ?? '') ?>">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
            <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Confirmez le mot de passe</label>
            <input type="password" name="confirm_password" id="confirm_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="text-center">
            <input type="submit" value="S'inscrire" class="shadow bg-purple-700 hover:bg-purple-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded cursor-pointer">
        </div>

        <div class="flex items-center justify-center space-x-2 mt-4">
            <p>Avez-vous un compte ?</p>
            <a href="login.php" class="inline-flex justify-center py-2 px-4 text-base font-medium text-white rounded-lg bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 dark:focus:ring-purple-900">
                Connectez-vous
            </a>
        </div>
    </form>
</body>
</html>