<x-app-layout>


    <div class="flex min-h-screen bg-gray-100">

        <!-- Contenu principal à gauche -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6">Actualités</h1>

            <!-- Grille pour les articles avec tailles variées -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Article 1 - Grande taille -->
                <div class="col-span-1 lg:col-span-2 row-span-2 bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/600x400" alt="Actualité Image 1" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="text-2xl font-semibold mb-2">Titre de l'actualité 1</h3>
                        <p class="text-gray-600 text-sm">Résumé ou introduction à l'actualité 1.</p>
                    </div>
                </div>

                <!-- Article 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/300x200" alt="Actualité Image 2" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Titre de l'actualité 2</h3>
                        <p class="text-gray-600 text-sm">Résumé ou introduction à l'actualité 2.</p>
                    </div>
                </div>

                <!-- Article 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/300x200" alt="Actualité Image 3" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Titre de l'actualité 3</h3>
                        <p class="text-gray-600 text-sm">Résumé ou introduction à l'actualité 3.</p>
                    </div>
                </div>

                <!-- Article 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/300x200" alt="Actualité Image 4" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Titre de l'actualité 4</h3>
                        <p class="text-gray-600 text-sm">Résumé ou introduction à l'actualité 4.</p>
                    </div>
                </div>

                <!-- Article 5 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/300x200" alt="Actualité Image 5" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Titre de l'actualité 5</h3>
                        <p class="text-gray-600 text-sm">Résumé ou introduction à l'actualité 5.</p>
                    </div>
                </div>

                <!-- Article 6 - Grande taille -->
                <div class="col-span-1 lg:col-span-2 row-span-2 bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://via.placeholder.com/600x400" alt="Actualité Image 6" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h3 class="text-2xl font-semibold mb-2">Titre de l'actualité 6</h3>
                        <p class="text-gray-600 text-sm">Résumé ou introduction à l'actualité 6.</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Sidebar droite fixe -->
        <aside class="w-1/4 bg-white shadow-lg p-6 sticky top-0 h-screen mt-5">
            <div class="space-y-4">
            <h2 class="text-2xl font-bold mb-4 mt-15">Catégories</h2>

                <div class="flex items-center p-4 bg-blue-50 rounded-lg shadow-md">
                    <img src="https://via.placeholder.com/50x50" alt="Catégorie Image 1" class="w-12 h-12 object-cover rounded-full mr-4">
                    <div>
                        <h3 class="font-semibold text-lg">Catégorie 1</h3>
                        <p class="text-sm text-gray-600">Description de la catégorie 1 🚨🚨🚨🚨</p>
                    </div>
                </div>
                <div class="flex items-center p-4 bg-blue-50 rounded-lg shadow-md">
                    <img src="https://via.placeholder.com/50x50" alt="Catégorie Image 2" class="w-12 h-12 object-cover rounded-full mr-4">
                    <div>
                        <h3 class="font-semibold text-lg">Catégorie 2</h3>
                        <p class="text-sm text-gray-600">Description de la catégorie 2</p>
                    </div>
                </div>
                <div class="flex items-center p-4 bg-blue-50 rounded-lg shadow-md">
                    <img src="https://via.placeholder.com/50x50" alt="Catégorie Image 3" class="w-12 h-12 object-cover rounded-full mr-4">
                    <div>
                        <h3 class="font-semibold text-lg">Catégorie 3</h3>
                        <p class="text-sm text-gray-600">Description de la catégorie 3</p>
                    </div>
                </div>
            </div>
        </aside>

    </div>

</x-app-layout>
