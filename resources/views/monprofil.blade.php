@section("titre",'Mon Profile')
@php
  
@endphp
<x-app-layout>



    <div class="min-h-screen bg-gray-300 text-gray-100 flex flex-col md:flex-row p-6">
        <!-- Section gauche : Profil utilisateur -->
        <div class="md:w-1/4 bg-gray-500 p-6 flex flex-col items-center" style="border-radius:2% ">
          <!-- Photo de profil -->
          @if (Auth::user()->image)
            <img class="w-24 h-24 rounded-full mb-4" src="{{ Auth::user()->imageUrls() }}" alt="Profil utilisateur">
              
          @else
            <svg class="w-24 h-24  mb-4  border-gray-700 " width="36" height="36" style="color: blue"  xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
              <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5"/>
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            </svg>
          @endif
          
          


          <h2 class="text-xl font-semibold mb-6">Nom de l'utilisateur</h2>
      
          <!-- Options de gestion du profil -->
          <nav class="space-y-4 w-full">
            <a href="{{ route('profile.edit') }}" class="block text-center py-2 bg-blue-500 rounded-lg hover:bg-blue-400">Modifier le profil</a>
            <a href="{{ route('blog.newblog') }}" class="block text-center py-2 bg-blue-500 rounded-lg hover:bg-blue-400">Créer un Post</a>
            <a href="#" class="block text-center py-2 bg-red-500 rounded-lg hover:bg-red-400">Supprimer le compte</a>
            <a href="#" class="block text-center py-2 bg-gray-700 rounded-lg hover:bg-gray-600">Se déconnecter</a>
          </nav>
        </div>
      
        <!-- Section droite : Posts de l'utilisateur -->
        <div class="md:w-3/4 p-6 flex flex-col space-y-6">
          <h1 class="text-3xl text-gray-800 font-bold mb-6">Mes Posts</h1>
          <!-- Post individuel -->
          @if (session('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">Success alert!</span> {{ session('success') }}
                </div>
              </div>
            @endif

          @forelse ($blogs as $p)
            <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
              <h3 class="text-xl text-gray-800 font-semibold mb-2">{{ Str::limit($p->titre, 50) }}</h3>
              <p class="text-gray-500 mb-2">Posté {{ $p->created_at->translatedFormat('l, ') }} le {{ $p->created_at->translatedFormat('d-m-Y ') }}</p>
              <p class="text-gray-700">{{ Str::limit($p->message, 200) }}</p>
              
              <a href="{{ route('blog.show', ['pro'=>$p->slug,'id'=>$p->id]) }}" class="text-blue-400 hover:underline">Lire plus</a>
            </div>
            @empty
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium"> Vous n'avez plubliez aucun Blog pour le moment</span>
            </div>
          </div>
          @endforelse
      
          
      
          <!-- Ajout automatique des nouveaux posts -->
        </div>
      </div>
</x-app-layout>