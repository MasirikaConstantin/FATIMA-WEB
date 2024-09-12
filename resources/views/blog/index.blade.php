@section("titre", 'Les Membres')
<x-app-layout>
  <div class="min-h-screen mb-4 bg-gradient-to-br from-gray-900 to-blue-800 text-white antialiased flex flex-col items-center">
    <!-- Search Section -->
    <div class="w-full max-w-2xl p-6 bg-gradient-to-r from-blue-400 to-blue-600 rounded-lg shadow-lg mt-6">
      <h1 class="text-2xl font-bold mb-4 text-white text-center">Rechercher un Post</h1>
      <form class="space-y-4" method="GET">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <!-- Title Field -->
          <div class="relative">
            <input type="text" name="titre" value="{{ request('titre') }}" class="w-full p-2 pl-8 bg-blue-50 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 border border-blue-300 placeholder-blue-300 text-blue-800 text-sm" placeholder="Rechercher par titre...">
            <svg class="w-4 h-4 text-blue-400 absolute left-2 top-1/2 transform -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
            </svg>
          </div>
          
          <!-- Category Field -->
          <div class="relative">
            <select name="categorie_id" class="w-full p-2 pl-8 bg-blue-50 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 border border-blue-300 text-blue-800 appearance-none text-sm">
              <option value="">Sélectionner une Catégorie</option>
              @forelse ($categories as $category)
                <option @selected(old('categorie_id', request('categorie_id') ?? "") == $category->id) value="{{$category->id}}">{{$category->titre}}</option>
              @empty
              @endforelse
            </select>
            <svg class="w-4 h-4 text-blue-400 absolute left-2 top-1/2 transform -translate-y-1/2" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </div>
        </div>
        <div class="flex justify-center">
          <button class="px-6 py-2 bg-blue-700 rounded-full text-white text-sm font-semibold hover:bg-blue-800 transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 shadow-md">
            Rechercher
          </button>
        </div>
      </form>
    </div>
  
    <!-- Available Posts List -->
    <div class="mt-12 w-full max-w-6xl">
      <h2 class="text-2xl font-bold mb-6 text-gray-100">Tous les Posts Disponibles</h2>
      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($blogs as $blog)
          <article class="bg-white rounded-lg border border-gray-200 shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-1">
            <div class="p-6">
              <div class="flex justify-between items-center mb-5 text-gray-500">
                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                  {{ $blog->category->titre }}
                </span>
                <span class="text-sm">{{ $blog->created_at->diffForHumans() }}</span>
              </div>
              <h2 class="mb-2 text-xl font-bold tracking-tight text-gray-900"><a href="{{ route('blog.show', ['pro'=>$blog->slug,'id'=>$blog->id]) }}" class="hover:text-blue-600">{{ Str::limit($blog->titre, 50) }}</a></h2>
              <p class="mb-5 font-light text-gray-600">{{ Str::limit($blog->message, 150) }}</p>
              <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                  @if ($blog->user->image)
                    <img class="w-8 h-8 rounded-full object-cover" src="{{ $blog->user->imageUrls() }}" alt="Profil utilisateur">
                  @else
                    <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                  @endif
                  <span class="font-medium text-gray-900">
                    {{ $blog->user->name }}
                  </span>
                </div>
                <a href="{{ route('blog.show', ['pro'=>$blog->slug,'id'=>$blog->id]) }}" class="inline-flex items-center font-medium text-blue-600 hover:underline">
                  {{ __('Read more') }}
                  <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
              </div>
            </div>
          </article> 
        @empty
          <div class="col-span-full">
            <div id="alert-border-4" class="flex p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50" role="alert">
              <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
              <div class="ml-3 text-sm font-medium">
                Aucune donnée trouvée contenant le mot clé <span class="font-semibold">{{ request('titre') }}</span>.
              </div>
            </div>
          </div>
        @endforelse
      </div>
      
      <div class="mt-8">
        {{ $blogs->links() }}
      </div>
    </div>
  </div>
</x-app-layout>