@section('titre', "Gallerie")


<x-app-layout>

    <div class="container mx-auto px-4 py-8">
        <!-- En-tête -->
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-4">Galerie</h1>
            <p class="text-gray-700">Découvrez les moments forts et les événements récents de notre communauté.</p>
        </header>

    
  

  
  
        <!-- Galerie -->
        <section>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                
               @forelse ($galerie as $g )
                   

                <!-- Photo 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Titre au-dessus de l'image -->
                    <div class="bg-gray-100 text-white text-2xl font-semibold p-4   ">
                        <figure class="relative max-w-sm transition-all duration-300 cursor-pointer filter hover:grayscale">
                            <a href="{{ $g->imageUrls() }}" data-fancybox="gallery">
                                
                              <img class="rounded-lg" src="{{ $g->imageUrls() }}" >
                            </a>
                            <figcaption class="absolute px-4 text-lg text-white bottom-6">
                                <p>{{ $g->titre }}</p>
                            </figcaption>
                          </figure>
                          
                    </div>
                    <!-- Image -->
                    <!-- Description en bas -->
                    <div class="p-4">
                        <p class="text-gray-700">{{ $g->description }}</p>

                        @if ($g->lien)
                        <a href="{{ $g->lien }}" class="text-blue-600 hover:underline mt-4 inline-block">Voir plus</a>
                            
                        @endif

                    </div>
                </div>

               @empty
                   
               @endforelse
               
               
    
        </section>
        <div>
            {{ $galerie->links() }}
           </div>   
    </div>

    <!--div class="min-h-screen bg-gray-100 flex flex-col items-center py-6">
        <h2 class="text-2xl font-bold mb-6">Galerie des Événements</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full max-w-6xl">
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
      </div-->
        
</x-app-layout>
