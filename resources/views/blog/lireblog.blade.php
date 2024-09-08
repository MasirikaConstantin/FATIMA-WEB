
<x-app-layout>
    @php
    date_default_timezone_set('Europe/Paris');
                setlocale(LC_TIME, 'fr_FR.utf8');
                \Carbon\Carbon::setLocale('fr');
                //dd($autres);
 @endphp


    <div class="min-h-screen bg-white dark:bg-gray-900 text-gray-100 flex flex-col items-center">
        <!-- Container principal du post -->
        <div class="w-full max-w-4xl p-6  rounded-lg shadow-lg mt-10">
          <!-- Section du profil de l'utilisateur -->
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
            <textarea class="w-full p-4 bg-gray-100 text-gray-900 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Écrire votre commentaire..."></textarea>
            @auth
            <button class="mt-4 px-6 py-2 bg-blue-500 rounded-lg text-white hover:bg-blue-400">Soumettre</button>
                
            @endauth
          </div>
      
          @guest
          <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
              <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <a href="{{ route("login") }}"><span class="font-medium">Rejoignez nous  </span>  </a>Pour commenter cette activité
              </div>
            </div>
          @endguest
          <!-- Section des commentaires -->
          <div class="mt-8">
            <h3 class="text-2xl font-semibold mb-4 text-gray-900">Commentaires</h3>
            <div class="space-y-6">
              <!-- Commentaire individuel -->
              <div class="flex items-start space-x-4">
                <img class="w-12 h-12 rounded-full" src="/path-to-comment-profile.jpg" alt="Profil du commentateur">
                <div>
                  <h4 class="font-semibold text-gray-900">Nom du Commentateur</h4>
                  <p class="text-gray-400 text-gray-400">Commenté le 13 janvier 2024</p>
                  <p class="text-gray-300 text-gray-900">Voici un exemple de commentaire laissé sur ce post.</p>
                </div>
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
                            <h3 class="text-2xl font-bold text-gray-900 mt-2">Évangile :   {{Str::limit($a->titre,100)}}</h3>
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
