@section("titre",'Les Membres')
<x-app-layout>
      <div class="min-h-screen mb-4 bg-gray-100 flex flex-col items-center">
        <!-- Section de recherche -->
        <div class="w-full max-w-4xl p-6  rounded-lg shadow-lg mt-10">
          <h1 class="text-3xl font-bold mb-6">Rechercher un Post</h1>
          <form class="space-y-6" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Champ Titre -->
              <div>
                <label class="block text-sm font-medium mb-2">Titre</label>
                <input type="text" name="titre" value="{{ request('titre') }}" class="w-full p-3 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Rechercher par titre...">
              </div>
              
              <!-- Champ Catégorie -->
              <div>
                <label class="block text-sm font-medium mb-2">Catégorie</label>
                <select name="categorie_id" class="w-full p-3 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                  <option value="" >Selectionner une Catégorie</option>
                  @forelse ( $categories as $category )
                  <option @selected(old('categorie_id', request('categorie_id')?? "")== $category->id) value="{{$category->id}}" >{{$category->titre}}</option>
                    
                  @empty
                    
                  @endforelse
                  
                </select>
              </div>
            </div>
            <button  class="mt-4 px-6 py-3 bg-blue-500 rounded-lg text-white hover:bg-blue-400">Rechercher</button>
          </form>
        </div>
      
        <!-- Liste des posts disponibles -->
        <div class=" mt-12">
          <h2 class="text-2xl font-bold mb-6">Tous les Posts Disponibles</h2>
          <div class="space-y-2 " >
            <!-- Post individuel -->
            <section class="bg-white dark:bg-gray-900  rounded-lg">
              <div class="py-2 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                   
                  <div class="grid gap-8 lg:grid-cols-2">
            @forelse ($blogs as $blog )

                      <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                          <div class="flex justify-between items-center mb-5 text-gray-500">
                              <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                  {{  $blog->category->titre }}
                              </span>
                              <span class="text-sm">{{ $blog->created_at->diffForHumans() }}</span>
                          </div>
                          <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="{{ route('blog.show', ['pro'=>$blog->slug,'id'=>$blog->id]) }}">{{ Str::limit($blog->titre, 50) }}</a></h2>
                          <p class="mb-5 font-light text-gray-500 dark:text-gray-400"> {{ Str::limit($blog->message, 200) }}</p>
                          <div class="flex justify-between items-center">
                              <div class="flex items-center space-x-4">
                                @if ($blog->user->image)
                                  <img class="w-7 h-7 rounded-full" src="{{ $blog->user->imageUrls() }}" alt="Profil utilisateur">
              
                                @else
                                  <svg class="w-7 h-7 rounded-full  border-gray-700 " width="36" height="36" style="color: blue"  xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                  </svg>
                                @endif

                                  <span class="font-medium dark:text-white">
                                    {{ $blog->user->name }}
                                  </span>
                              </div>
                              <a href="{{ route('blog.show', ['pro'=>$blog->slug,'id'=>$blog->id]) }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                  {{ __('Read more') }}
                                  <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                              </a>
                          </div>
                      </article> 
                      @empty
                      <div class="space-y-4 py-6 md:py-8 items-center text-center">

                        <div id="alert-border-4" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ms-3 text-sm font-medium">
                            Aucune donnée trouvée  contenant le mot clé <span href="#" class="font-semibold underline hover:no-underline">{{ request('titre') }} </span>.
                            </div>
                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-4" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            </button>
                        </div>
                        </div>

            @endforelse
                  </div> 
                                     
                  
                  <div class="mt-4">
                    {{ $blogs->links() }}
                  </div>

                  
              </div>
            </section>
            
            
          
            <!-- Ajoutez plus de posts ici -->
          </div>
        </div>
      </div>

</x-app-layout>
    