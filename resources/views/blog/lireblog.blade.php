@section('titre', "Lire Blog")
<x-app-layout>
    @php
                setlocale(LC_TIME, 'fr_FR.utf8');
                \Carbon\Carbon::setLocale('fr');
                //dd($autres);*
              $k=0;
              $count="b";
 @endphp


    <div class="min-h-screen bg-white dark:bg-gray-900 text-gray-100 flex flex-col items-center">
        <!-- Container principal du post -->
        <div class="w-full max-w-4xl p-6  rounded-lg shadow-lg mt-10">
          <!-- Section du profil de l'utilisateur -->
          @if (session('success'))
          <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
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
            <img class="w-10 h-10 rounded-full mb-4" src="{{ $blog->user->imageUrls() }}" alt="Profil utilisateur">
              
          @else
            <svg class="w-10 h-10  mb-4  border-gray-700 " width="36" height="36" style="color: blue"  xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
              <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            </svg>
          @endif
            <div>
              <h2 class="text-xxl text-gray-800 font-semibold">{{ $blog->user->name }}</h2>
              <p class="text-xxl text-gray-500">Posté  {{ $blog->created_at->translatedFormat('l, d F Y') }}</p>
            </div>
          </div>
      
          <!-- Contenu du post -->
          <div class="mb-6">
            <h1 class="text-xl text-gray-900 font-bold mb-4">{{ $blog->titre }}</h1>
            <p class="text-lg leading-relaxed text-gray-900">
              {{ $blog->message }}
            </p>
          </div>
          <hr class="mb-4" >
          
          <!-- Section de commentaire -->
          <div class="mt-8">
            <h3 class="text-xl font-semibold mb-4 text-gray-900">Laissez un commentaire</h3>
            <form action="" method="POST">
              @csrf
              <textarea @error("contenus")
              class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
              @enderror name="contenus" class="w-full p-4 bg-gray-100 text-gray-900 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Écrire votre commentaire...">{{ old('contenus') }}</textarea>
              @error('contenus')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>

                            @enderror
              @auth
              <button class="mt-4 px-6 py-2 bg-blue-500 rounded-lg text-white hover:bg-blue-400">Soumettre</button>
                  
              @endauth
            </form>
          </div>
      
          @guest
          <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <a href="{{ route("login") }}"><span class="font-medium">Rejoignez nous  </span>  </a>Pour commenter ce post
              </div>
            </div>
          @endguest
          <!-- Section des commentaires -->
          <div class="mt-8">
            <h3 class="text-2xl font-semibold mb-4 text-gray-900 mb-3">Commentaires</h3>
            <hr>
            <div class="space-y-6">
              <!-- Commentaire individuel -->
              @forelse ($Commentaire as $c)
              @php
              $k++;
              $count =  $count . $k;
              
          @endphp
          <article class=" text-base bg-white rounded-lg dark:bg-gray-900">
              <footer class="flex justify-between items-center mb-2">
                  <div class="flex items-center">
                  @if ($c->user->image)
                  <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                      class="mr-2 w-6 h-6 rounded-full"
                      src="{{$c->user->imageUrls()  }}"
                      alt="Michael Gough">{{ $c->user->name }}</p>
                      @else
                      <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                          class="mr-2 w-6 h-6 rounded-full"
                          src="{{ asset('icon_pri.svg') }}"
                          alt="Michael Gough">{{ $c->user->name }}</p>
                  @endif
                      @if ($c->created_at == $c->updated_at)
                      <p class="text-sm text-gray-600 dark:text-gray-400"><time class="text-sm" pubdate datetime="2022-02-08"
                        title="  {{ $c->created_at->translatedFormat(' d F Y') }}">{{ $c->created_at->diffForHumans() }}</time></p>
                      @else
                      <p class="text-sm text-gray-600 dark:text-gray-400"><time class="text-sm" pubdate datetime="2022-02-08"
                        title="  {{ $c->created_at->translatedFormat(' d F Y') }}"> Modifié  {{ $c->updated_at->diffForHumans() }}</time></p>
                        @endif
                  </div>
                  @auth
                              @if ($c->user->id == Auth::user()->id)
                              <button id="dropdownComment{{ $k }}Button" data-dropdown-toggle="dropdownComment{{ $k }}"
                              class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
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
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Edit') }}</a>
                                  </li>
                                  <li>
                                      <button data-modal-target="popup-modal{{  $count }}" data-modal-toggle="popup-modal{{  $count }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" type="button">
                                          Supprimer
                                          </button>
                                      
                                  </li>
                                  <!--li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                  </li-->
                              </ul>
                          </div>
                      
                      @endif
                  @endauth
              </footer>
              <p class="text-gray-800 text-sm" >{{ $c->contenus }}</p>
                  
              
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
                          <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Êtes vous sur de vouloir supprimer ce Programme?</h3>
                          <a href="{{route('blog.deletecomm',['id'=>$c->id])}}" data-modal-hide="popup-modal{{  $count }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                              Oui je suis sur
                          </a>
                          <button data-modal-hide="popup-modal{{  $count }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non, Annuler</button>
                      </div>
                  </div>
              </div>
          </div>
<hr>
              @empty
              <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">Aucun Commentaire pour le moment</span> 
                </div>
              </div>
              @endforelse
              <div class="mt-1">
                {{$Commentaire->links()}}
             </div>
              <!-- Ajoute d'autres commentaires ici -->
            </div>
          </div>
        </div>
      
        <!-- Section des posts similaires -->
        <section class="py-12">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Autres Posts</h2>
    
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Lecture passée 1 -->
                   
                    @forelse ($autres as $a )
                        
                        <div class="bg-white shadow-lg rounded-lg p-6">
                            <p class="text-lg text-gray-500">{{ $a->created_at->translatedFormat('l, ') }} le {{ $a->created_at->translatedFormat('d/m/Y ') }}</p>
                            <h3 class="text-2xl font-bold text-gray-900 mt-2">{{Str::limit($a->titre,100)}}</h3>
                            <p class="mt-4 text-gray-700"> {{Str::limit($a->message,150)}}</p>
                            <a href="{{ route('blog.show', ['pro'=>$a->slug,'id'=>$a->id]) }}" class="text-blue-600 hover:underline mt-4 inline-block">Lire plus</a>
                        </div>
                    @empty
                        
                    @endforelse
    
                   
                </div>
            </div>

        </section>
      </div>
</x-app-layout>
