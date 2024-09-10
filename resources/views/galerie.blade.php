<x-app-layout>

    <div class="container mx-auto px-4 py-8">
        <!-- En-tête -->
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-4">Galerie</h1>
            <p class="text-gray-700">Découvrez les moments forts et les événements récents de notre communauté.</p>
        </header>

        <!-- Galerie -->
        <section>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                <!-- Photo 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Titre au-dessus de l'image -->
                    <div class="bg-teal-500 text-white text-2xl font-semibold p-4">
                        <p>Événement 1</p>
                    </div>
                    <!-- Image -->
                    <img src="{{ asset('presentation/presentation.jpg') }}" alt="Événement" class="w-full h-64 object-cover">
                    <!-- Description en bas -->
                    <div class="p-4">
                        <p class="text-gray-700">Ceci est une description pour l'Événement 1. Un moment marquant de notre communauté où nous avons célébré notre unité et solidarité.</p>
                    </div>
                </div>

                <!-- Photo 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Titre au-dessus de l'image -->
                    <div class="bg-green-500 text-white text-2xl font-semibold p-4">
                        <p>Événement 2</p>
                    </div>
                    <!-- Image -->
                    <img src="{{ asset('presentation/presentation.jpg') }}" alt="Événement" class="w-full h-64 object-cover">
                    <!-- Description en bas -->
                    <div class="p-4">
                        <p class="text-gray-700">Description de l'Événement 2. Une journée spéciale avec des activités de groupe et des moments de partage.</p>
                    </div>
                </div>

                <!-- Photo 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Titre au-dessus de l'image -->
                    <div class="bg-red-500 text-white text-2xl font-semibold p-4">
                        <p>Événement 3</p>
                    </div>
                    <!-- Image -->
                    <img src="{{ asset('presentation/presentation.jpg') }}" alt="Événement" class="w-full h-64 object-cover">
                    <!-- Description en bas -->
                    <div class="p-4">
                        <p class="text-gray-700">Voici la description de l'Événement 3. Un événement marquant pour notre communauté avec des moments inoubliables.</p>
                    </div>
                </div>

                <!-- Photo 4 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Titre au-dessus de l'image -->
                    <div class="bg-yellow-500 text-white text-2xl font-semibold p-4">
                        <p>Événement 4</p>
                    </div>
                    <!-- Image -->
                    <img src="{{ asset('presentation/presentation.jpg') }}" alt="Événement" class="w-full h-64 object-cover">
                    <!-- Description en bas -->
                    <div class="p-4">
                        <p class="text-gray-700">Description pour l'Événement 4. Une journée remplie de joie et de festivités qui a rapproché notre communauté.</p>
                    </div>
                </div>

                <!-- Photo 5 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Titre au-dessus de l'image -->
                    <div class="bg-purple-500 text-white text-2xl font-semibold p-4">
                        <p>Événement 5</p>
                    </div>
                    <!-- Image -->
                    <img src="{{ asset('presentation/presentation.jpg') }}" alt="Événement" class="w-full h-64 object-cover">
                    <!-- Description en bas -->
                    <div class="p-4">
                        <p class="text-gray-700">Description de l'Événement 5. Un moment de réflexion et de rassemblement autour de notre mission commune.</p>
                    </div>
                </div>

                <!-- Photo 6 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Titre au-dessus de l'image -->
                    <div class="bg-pink-500 text-white text-2xl font-semibold p-4">
                        <p>Événement 6</p>
                    </div>
                    <!-- Image -->
                    <img src="{{ asset('presentation/presentation.jpg') }}" alt="Événement" class="w-full h-64 object-cover">
                    <!-- Description en bas -->
                    <div class="p-4">
                        <p class="text-gray-700">Description de l'Événement 6. Une célébration pleine de couleur et de vie qui a marqué notre année.</p>
                    </div>
                </div>

                <!-- Photo 7 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Titre au-dessus de l'image -->
                    <div class="bg-indigo-500 text-white text-2xl font-semibold p-4">
                        <p>Événement 7</p>
                    </div>
                    <!-- Image -->
                    <img src="{{ asset('presentation/presentation.jpg') }}" alt="Événement" class="w-full h-64 object-cover">
                    <!-- Description en bas -->
                    <div class="p-4">
                        <p class="text-gray-700">Description de l'Événement 7. Une occasion spéciale qui a mis en avant les talents et les efforts de notre communauté.</p>
                    </div>
                </div>

               
      <div class="relative bg-gray-200 rounded-lg shadow-lg overflow-hidden">
        <!-- Image de l'événement -->
        <img src="{{ asset('presentation/presentation.jpg') }}" alt="Événement" class="w-full h-64 object-cover">
    
        <!-- Titre superposé sur l'image -->
        <div class="absolute top-0 left-0 w-full h-16 bg-teal-500 bg-opacity-75 flex items-center justify-center text-white text-2xl font-semibold">
            <p>Événement 8</p>
        </div>
    
        <!-- Description en dessous de l'image -->
        <div class="p-4">
            <p class="text-gray-700">Votre description ici.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, sed, possimus ullam eum laudantium aspernatur, incidunt beatae nesciunt obcaecati magni ducimus et! Cumque eius nam pariatur nemo similique enim minima.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda mollitia consequatur quos, saepe debitis incidunt doloremque repellat maxime recusandae temporibus, molestiae dolorem. Ex ab architecto tenetur, aspernatur voluptates placeat quod?
            </p>
        </div>
    </div>


            </div>
        </section>
    </div>

    <div class="min-h-screen bg-gray-100 flex flex-col items-center py-6">
        <h2 class="text-2xl font-bold mb-6">Galerie des Événements</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-6xl">
          <!-- Carte d'événement avec une couleur en fond -->
          <div class="bg-blue-300 shadow-lg rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">Événement 1</h3>
            <p class="text-gray-700 mb-4">Description de l'événement important, détails sur la communauté.</p>
          </div>
      
          <div class="bg-green-300 shadow-lg rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">Événement 2</h3>
            <p class="text-gray-700 mb-4">Description de l'événement important, détails sur la communauté.</p>
          </div>
      
          <div class="bg-red-300 shadow-lg rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">Événement 3</h3>
            <p class="text-gray-700 mb-4">Description de l'événement important, détails sur la communauté.</p>
          </div>
      
          <div class="bg-yellow-300 shadow-lg rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">Événement 4</h3>
            <p class="text-gray-700 mb-4">Description de l'événement important, détails sur la communauté.</p>
          </div>
      
          <div class="bg-purple-300 shadow-lg rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">Événement 5</h3>
            <p class="text-gray-700 mb-4">Description de l'événement important, détails sur la communauté.</p>
          </div>
      
          <div class="bg-pink-300 shadow-lg rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2">Événement 6</h3>
            <p class="text-gray-700 mb-4">Description de l'événement important, détails sur la communauté.</p>
          </div>
        </div>
      </div>
        
</x-app-layout>
