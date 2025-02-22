<?php
session_start();

require "db.php";

$error = ""; // Initialisation de la variable pour afficher les erreurs

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = "Tous les champs sont obligatoires.";
    } else {
        try {
            $requete = $pdo->prepare("SELECT * FROM `inscription` WHERE username = :username");
            $requete->execute(['username' => $username]);

            if ($requete->rowCount() > 0) {
                $user = $requete->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['uid'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    // Note : 'role' n'existe pas dans ta table actuelle, à ajouter si nécessaire
                    // $_SESSION['role'] = $user['role'] ?? 'user';

                    // Redirection (ajuste selon tes besoins)
                    header('Location: dashboard.php');
                    exit;
                } else {
                    $error = "Mot de passe incorrect.";
                }
            } else {
                $error = "Nom d'utilisateur introuvable.";
            }
        } catch (PDOException $e) {
            $error = "Erreur de connexion : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 via-indigo-100 to-blue-100 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-auto bg-white rounded-xl shadow-lg p-8 transform transition-all hover:shadow-xl">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Connexion</h1>

        <!-- Affichage des erreurs -->
        <?php if (!empty($error)): ?>
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire -->
        <form action="" method="post">
            <div class="mb-6">
                <label for="username" class="block text-gray-700 text-sm font-semibold mb-2">Nom d'utilisateur</label>
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                    placeholder="Entrez votre nom d'utilisateur" 
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

            <div class="text-center">
                <button 
                    type="submit" 
                    class="w-full bg-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-4 focus:ring-purple-300 transition duration-300"
                >
                    Se connecter
                </button>
            </div>

            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">Pas encore de compte ? 
                    <a href="inscription.php" class="text-purple-600 hover:text-purple-800 font-semibold transition duration-200">Inscrivez-vous</a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>