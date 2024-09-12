@section('titre', "Lire Blog")
<x-app-layout>
    @php
        setlocale(LC_TIME, 'fr_FR.utf8');
        \Carbon\Carbon::setLocale('fr');
        $k = 0;
        $count = "b";
    @endphp

    <div class="min-h-screen bg-gradient-to-br from-gray-600 to-blue-600 dark:from-gray-900 dark:to-gray-800 text-gray-900 dark:text-gray-100 flex flex-col items-center">
        <!-- Container principal du post -->
        <div class="w-full max-w-4xl p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg mt-10 transition-all duration-300 hover:shadow-xl ">
          <!-- Section du profil de l'utilisateur -->
          @if (session('success'))
          <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800 " role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium"> {{ session('success') }}!</span>
              </div>
            </div>
          @endif

          @if (session('error'))
          <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium"> {{ session('error') }}!</span>
              </div>
            </div>
          @endif

          <div class="flex items-center space-x-4 mb-6">
            @if ($blog->user->image)
              <img class="w-12 h-12 rounded-full mb-4  transition-all duration-300 hover:border-blue-600" src="{{ $blog->user->imageUrls() }}" alt="Profil utilisateur">
            @else
              <svg class="w-12 h-12 mb-4 text-blue-500 transition-all duration-300 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            @endif
            <div>
              <h2 class="text-2xl text-blue-600 dark:text-blue-400 font-semibold transition-all duration-300 hover:text-blue-700 dark:hover:text-blue-300">{{ $blog->user->name }}</h2>
              <p class="text-sm text-gray-500 dark:text-gray-400">Posté le {{ $blog->created_at->translatedFormat('l, d F Y') }}</p>
            </div>
          </div>
      
          <!-- Contenu du post -->
          <div class="mb-6">
            <h1 class="text-3xl text-blue-700 dark:text-blue-300 font-bold mb-4 transition-all duration-300 hover:text-blue-800 dark:hover:text-blue-200">{{ $blog->titre }}</h1>
            <p class="text-lg leading-relaxed text-gray-700 dark:text-gray-300">
              {{ $blog->message }}
            </p>
          </div>
          <hr class="mb-4 border-blue-200 dark:border-blue-700">
          
          <!-- Section de commentaire -->
          <div class="mt-8">
            <h3 class="text-2xl font-semibold mb-4 text-gray-600 dark:text-blue-400">Laissez un commentaire</h3>
            <form action="" method="POST">
              @csrf
              <textarea 
                @error("contenus")
                  class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                @enderror 
                name="contenus" 
                class="w-full p-4 bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300" 
                placeholder="Écrire votre commentaire..."
              >{{ old('contenus') }}</textarea>
              @error('contenus')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>
              @enderror
              @auth
                <button class="mt-4 px-6 py-2 bg-blue-500 rounded-lg text-white hover:bg-blue-600 transition-all duration-300">Soumettre</button>
              @endauth
            </form>
          </div>
      
          @guest
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <a href="{{ route("login") }}" class="font-medium hover:underline">Rejoignez-nous</a> pour commenter ce post
              </div>
            </div>
          @endguest

          <!-- Section des commentaires -->
          <div class="mt-8">
            <h3 class="text-2xl font-semibold mb-4 text-gray-600 dark:text-blue-400">Commentaires</h3>
            <hr class="mb-4 border-blue-200 dark:border-blue-700">
            <div class="space-y-6">
              <!-- Commentaires individuels -->
              @forelse ($Commentaire as $c)
                @php
                  $k++;
                  $count = $count . $k;
                @endphp
                <article class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow transition-all duration-300 hover:shadow-md">
                  <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                      @if ($c->user->image)
                        <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">
                          <img class="mr-2 w-6 h-6 rounded-full " src="{{ $c->user->imageUrls() }}" alt="{{ $c->user->name }}">
                          {{ $c->user->name }}
                        </p>
                      @else
                        <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white">
                          <img class="mr-2 w-6 h-6 rounded-full border border-blue-500" src="{{ asset('icon_pri.svg') }}" alt="{{ $c->user->name }}">
                          {{ $c->user->name }}
                        </p>
                      @endif
                      @if ($c->created_at == $c->updated_at)
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                          <time pubdate datetime="{{ $c->created_at }}" title="{{ $c->created_at->translatedFormat('d F Y') }}">
                            {{ $c->created_at->diffForHumans() }}
                          </time>
                        </p>
                      @else
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                          <time pubdate datetime="{{ $c->updated_at }}" title="{{ $c->updated_at->translatedFormat('d F Y') }}">
                            Modifié {{ $c->updated_at->diffForHumans() }}
                          </time>
                        </p>
                      @endif
                    </div>
                    @auth
                      @if ($c->user->id == Auth::user()->id)
                        <button id="dropdownComment{{ $k }}Button" data-dropdown-toggle="dropdownComment{{ $k }}"
                          class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600 transition-all duration-300"
                          type="button">
                          <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                          </svg>
                          <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment{{ $k }}"
                          class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                          <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                              <a href="{{ route('comment.edit', ['id'=>$c->id]) }}"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition-colors duration-300">{{ __('Edit') }}</a>
                            </li>
                            <li>
                              <button data-modal-target="popup-modal{{  $count }}" data-modal-toggle="popup-modal{{  $count }}" 
                                class="block w-full text-left py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white transition-colors duration-300" type="button">
                                Supprimer
                              </button>
                            </li>
                          </ul>
                        </div>
                      @endif
                    @endauth
                  </footer>
                  <p class="text-gray-800 dark:text-gray-200 text-sm">{{ $c->contenus }}</p>
                </article>
                <div id="popup-modal{{  $count }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                  <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                      <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{  $count }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                      </button>
                      <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Êtes-vous sûr de vouloir supprimer ce commentaire ?</h3>
                        <a href="{{route('blog.deletecomm',['id'=>$c->id])}}" data-modal-hide="popup-modal{{  $count }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 transition-all duration-300">
                          Oui, je suis sûr
                        </a>
                        <button data-modal-hide="popup-modal{{  $count }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 transition-all duration-300">Non, annuler</button>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="border-blue-200 dark:border-blue-700">
              @empty
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                  <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                  </svg>
                  <span class="sr-only">Info</span>
                  <div>
                    <span class="font-medium">Aucun commentaire pour le moment</span> 
                  </div>
                </div>
              @endforelse
              <div class="mt-4">
                {{$Commentaire->links()}}
              </div>
            </div>
          </div>
        </div>
      
        <!-- Section des posts similaires -->
        <section class="py-12 w-full">
          <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center text-gray-200 dark:text-blue-400 mb-8">Autres Posts</h2>
    
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              @forelse ($autres as $a)
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 transition-all duration-300 hover:shadow-xl">
                  <p class="text-sm text-gray-500 dark:text-gray-400">{{ $a->created_at->translatedFormat('l, ') }} le {{ $a->created_at->translatedFormat('d/m/Y ') }}</p>
                  <h3 class="text-xl font-bold text-blue-600 dark:text-blue-400 mt-2 transition-all duration-300 hover:text-blue-700 dark:hover:text-blue-300">{{Str::limit($a->titre, 100)}}</h3>
                  <p class="mt-4 text-gray-700 dark:text-gray-300">{{Str::limit($a->message, 150)}}</p>
                  <a href="{{ route('blog.show', ['pro'=>$a->slug,'id'=>$a->id]) }}" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300 hover:underline mt-4 inline-block transition-all duration-300">Lire plus</a>
                </div>
              @empty
                <p class="col-span-3 text-center text-gray-500 dark:text-gray-400">Aucun autre post disponible pour le moment.</p>
              @endforelse
            </div>
          </div>
        </section>
      </div>
</x-app-layout>