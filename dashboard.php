<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- En-tête -->
    <header class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-6 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold text-center">Bienvenue sur votre site</h1>
            <p class="text-center mt-2 text-lg">Explorez votre tableau de bord personnalisé</p>
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="flex-grow max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Galerie d'images -->
            <div class="group relative">
                <img class="h-48 w-full object-cover rounded-lg shadow-md transform group-hover:scale-105 transition duration-300" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="Image 1">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition duration-300 flex items-center justify-center">
                    <p class="text-white opacity-0 group-hover:opacity-100">Voir plus</p>
                </div>
            </div>
            <div class="group relative">
                <img class="h-48 w-full object-cover rounded-lg shadow-md transform group-hover:scale-105 transition duration-300" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="Image 2">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition duration-300 flex items-center justify-center">
                    <p class="text-white opacity-0 group-hover:opacity-100">Voir plus</p>
                </div>
            </div>
            <div class="group relative">
                <img class="h-48 w-full object-cover rounded-lg shadow-md transform group-hover:scale-105 transition duration-300" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="Image 3">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition duration-300 flex items-center justify-center">
                    <p class="text-white opacity-0 group-hover:opacity-100">Voir plus</p>
                </div>
            </div>
            <div class="group relative">
                <img class="h-48 w-full object-cover rounded-lg shadow-md transform group-hover:scale-105 transition duration-300" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="Image 4">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition duration-300 flex items-center justify-center">
                    <p class="text-white opacity-0 group-hover:opacity-100">Voir plus</p>
                </div>
            </div>
            <div class="group relative">
                <img class="h-48 w-full object-cover rounded-lg shadow-md transform group-hover:scale-105 transition duration-300" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="Image 5">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition duration-300 flex items-center justify-center">
                    <p class="text-white opacity-0 group-hover:opacity-100">Voir plus</p>
                </div>
            </div>
            <div class="group relative">
                <img class="h-48 w-full object-cover rounded-lg shadow-md transform group-hover:scale-105 transition duration-300" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="Image 6">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition duration-300 flex items-center justify-center">
                    <p class="text-white opacity-0 group-hover:opacity-100">Voir plus</p>
                </div>
            </div>
            <div class="group relative">
                <img class="h-48 w-full object-cover rounded-lg shadow-md transform group-hover:scale-105 transition duration-300" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg" alt="Image 7">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition duration-300 flex items-center justify-center">
                    <p class="text-white opacity-0 group-hover:opacity-100">Voir plus</p>
                </div>
            </div>
            <div class="group relative">
                <img class="h-48 w-full object-cover rounded-lg shadow-md transform group-hover:scale-105 transition duration-300" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" alt="Image 8">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition duration-300 flex items-center justify-center">
                    <p class="text-white opacity-0 group-hover:opacity-100">Voir plus</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Bouton de déconnexion -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="max-w-7xl mx-auto px-4 flex justify-end">
            <a href="logout.php" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 rounded-lg text-base font-medium transition duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Déconnexion
            </a>
        </div>
    </footer>
</body>
</html>