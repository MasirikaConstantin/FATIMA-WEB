<x-app-layout>

     <!-- Section Accueil -->
     <section class="relative h-screen bg-cover bg-center" style="background-image: url('https://source.unsplash.com/1600x900/?church');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold">Paroisse Notre Dame de Fatima</h1>
                <p class="mt-4 text-xl">Bienvenue à notre église, un lieu de prière, de paix et de communauté.</p>
                <a href="#programmes" class="mt-6 inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Découvrir plus</a>
            </div>
        </div>
    </section>

    <!-- Section Programmes -->
    <section id="programmes" class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8">Nos Programmes à Venir</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Programme 1 -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Messe du Dimanche</h3>
                    <p class="text-gray-700">Chaque dimanche à 10h.</p>
                </div>
                <!-- Programme 2 -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Prière Communautaire</h3>
                    <p class="text-gray-700">Tous les vendredis à 18h.</p>
                </div>
                <!-- Programme 3 -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Confession</h3>
                    <p class="text-gray-700">Chaque premier samedi du mois à 16h.</p>
                </div>
                <!-- Programme 4 -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Catéchèse</h3>
                    <p class="text-gray-700">Tous les mercredis à 15h.</p>
                </div>
            </div>
            <a href="#" class="mt-8 inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Voir tous les programmes</a>
        </div>
    </section>

    <!-- Section Événements -->
    <section id="evenements" class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8">Événements à Venir</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Événement 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Retraite Spirituelle</h3>
                    <p class="text-gray-700">Du 15 au 17 septembre 2024</p>
                </div>
                <!-- Événement 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Fête de l'Assomption</h3>
                    <p class="text-gray-700">15 août 2024</p>
                </div>
            </div>
            <a href="#" class="mt-8 inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Voir tous les événements</a>
        </div>
    </section>

    
    <!-- Section Actualités -->
<section id="actualites" class="py-16 bg-gray-50">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-8">Actualités</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Actualité 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/400x300/?church,event" alt="Actualité 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2">Messe spéciale pour les jeunes</h3>
                    <p class="text-gray-700 mb-4">Une messe dédiée aux jeunes aura lieu ce samedi à 16h.</p>
                    <a href="#" class="text-yellow-500 font-semibold hover:underline">Lire plus</a>
                </div>
            </div>
            <!-- Actualité 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/400x300/?prayer,people" alt="Actualité 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2">Nouvelle retraite spirituelle</h3>
                    <p class="text-gray-700 mb-4">Participez à notre retraite spirituelle du mois prochain.</p>
                    <a href="#" class="text-yellow-500 font-semibold hover:underline">Lire plus</a>
                </div>
            </div>
            <!-- Actualité 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/400x300/?community,gathering" alt="Actualité 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2">Collecte de dons pour les nécessiteux</h3>
                    <p class="text-gray-700 mb-4">Nous organisons une collecte de dons pour soutenir les familles démunies.</p>
                    <a href="#" class="text-yellow-500 font-semibold hover:underline">Lire plus</a>
                </div>
            </div>
        </div>
        <a href="#" class="mt-8 inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Voir toutes les actualités</a>
    </div>
</section>




    </x-app-layout>
