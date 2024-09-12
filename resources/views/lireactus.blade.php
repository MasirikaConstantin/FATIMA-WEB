<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-blue-800 text-white antialiased">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col lg:flex-row">
                <!-- Contenu principal à gauche -->
                <main class="flex-1 pr-0 lg:pr-8">
                    <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400 mb-8">Actualités</h1>

                    <!-- Article principal -->
                    <article class="bg-gray-800 bg-opacity-50 rounded-xl overflow-hidden shadow-2xl transform hover:scale-102 transition duration-300 mb-8">
                        @if ($actuslire)
                            <div class="relative">
                                @if ($actuslire->image)
                                    <img src="{{ $actuslire->imageUrls() }}" alt="Actualité Image" class="w-full h-96 object-cover">
                                @else
                                    <img src="{{ asset('presentation/presentation.jpg') }}" alt="Actualité Image" class="w-full h-96 object-cover">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                                <div class="absolute bottom-0 left-0 p-6 text-white">
                                    <span class="bg-blue-700 text-xs font-semibold px-2.5 py-1 rounded-full mb-2 inline-block">À la une</span>
                                    <h2 class="text-4xl font-bold mb-3 leading-tight">{{ $actuslire->titre }}</h2>
                                    <p class="text-sm font-semibold">Le {{ \Carbon\Carbon::parse($actuslire->created_at)->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-300 text-lg leading-relaxed mb-4">{{ $actuslire->description }}</p>
                            </div>
                        @endif
                    </article>

                    @if (session('success'))
                        <div class="bg-green-800 bg-opacity-50 border border-green-600 text-green-100 px-4 py-3 rounded relative mb-6" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                </main>

                <!-- Sidebar droite -->
                <aside class="lg:w-1/4 mt-8 lg:mt-0">
                    <div class="bg-gray-800 bg-opacity-50 rounded-xl p-6">
                        <h2 class="text-2xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">Plus anciens</h2>

                        <div class="space-y-6">
                            @forelse ($autres as $a)
                                <div class="flex items-center bg-gray-700 bg-opacity-50 rounded-lg p-4 transform hover:scale-105 transition duration-300">
                                    @if ($a->image)
                                        <img src="{{ $a->imageUrls() }}" alt="Catégorie Image" class="w-16 h-16 object-cover rounded-full mr-4">
                                    @else
                                        <img src="{{ asset('presentation/presentation.jpg') }}" alt="Catégorie Image" class="w-16 h-16 object-cover rounded-full mr-4">
                                    @endif
                                    <div>
                                        <a href="{{ route('actuslire', ['pro' => $a->slug, 'id' => $a->id]) }}" class="font-semibold text-lg hover:text-blue-300 transition duration-300">{{ Str::limit($a->titre, 15) }}</a>
                                        <p class="text-sm text-gray-300 mt-1">{{ Str::limit($a->description, 50) }}</p>
                                        <p class="text-xs text-gray-400 mt-2">🚨🚨 {{ \Carbon\Carbon::parse($a->created_at)->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-400">Aucun article ancien disponible.</p>
                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>