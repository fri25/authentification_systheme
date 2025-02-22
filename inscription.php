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
<body class="bg-gradient-to-br from-purple-100 via-indigo-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto bg-white rounded-xl shadow-lg p-8 transform transition-all hover:shadow-xl">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Inscription</h1>

        <!-- Affichage des erreurs -->
        <?php if (!empty($error)): ?>
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire -->
        <form action="" method="post">
            <div class="mb-6">
                <label for="nom" class="block text-gray-700 text-sm font-semibold mb-2">Nom</label>
                <input 
                    type="text" 
                    name="nom" 
                    id="nom" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                    placeholder="Entrez votre nom" 
                    value="<?= htmlspecialchars($nom ?? '') ?>"
                >
            </div>

            <div class="mb-6">
                <label for="prenom" class="block text-gray-700 text-sm font-semibold mb-2">Prénom</label>
                <input 
                    type="text" 
                    name="prenom" 
                    id="prenom" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                    placeholder="Entrez votre prénom" 
                    value="<?= htmlspecialchars($prenom ?? '') ?>"
                >
            </div>

            <div class="mb-6">
                <label for="username" class="block text-gray-700 text-sm font-semibold mb-2">Nom d'utilisateur</label>
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                    placeholder="Choisissez un nom d'utilisateur" 
                    value="<?= htmlspecialchars($username ?? '') ?>"
                >
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Mot de passe</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                    placeholder="Entrez votre mot de passe"
                >
            </div>

            <div class="mb-6">
                <label for="confirm_password" class="block text-gray-700 text-sm font-semibold mb-2">Confirmez le mot de passe</label>
                <input 
                    type="password" 
                    name="confirm_password" 
                    id="confirm_password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                    placeholder="Confirmez votre mot de passe"
                >
            </div>

            <div class="text-center">
                <button 
                    type="submit" 
                    class="w-full bg-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-4 focus:ring-purple-300 transition duration-300"
                >
                    S'inscrire
                </button>
            </div>

            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">Vous avez déjà un compte ? 
                    <a href="login.php" class="text-purple-600 hover:text-purple-800 font-semibold transition duration-200">Connectez-vous</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>