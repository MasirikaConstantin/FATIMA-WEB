@section('titre', "Gallerie")


<x-app-layout>

    <div class=" bg-white mx-auto px-4 py-8">
        <!-- En-tête -->
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold mb-4">Galerie</h1>
            <p class="text-gray-700">Découvrez les moments forts et les événements récents de notre communauté.</p>
        </header>

    
  

        <form method="GET" class="mt-4 mb-4 w-full gap-4 sm:flex sm:items-center sm:justify-end lg:mt-0">
                            
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full flex-1 lg:max-w-sm">
                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
                </div>
                <input type="text" name="description"value="{{ request('description') }}" id="simple-search" class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 ps-9 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Rechercher par description"  />
            </div>
             <button  class="btnn  text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Rechercher</button>
    
            </form>
  
        <!-- Galerie -->
        <section>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                
               @forelse ($galerie as $g )
                   

                <!-- Photo 2 -->
                <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
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
               <div class="space-y-4 py-6 md:py-8">

                <div id="alert-border-4" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                    Aucune donnée trouvée  contenant le mot clé <span href="#" class="font-semibold underline hover:no-underline">{{ request('description') }} </span>.
                    </div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-4" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    </button>
                </div>
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
