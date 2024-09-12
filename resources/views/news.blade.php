<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-blue-900 text-white antialiased">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col lg:flex-row">
                <!-- Contenu principal à gauche -->
                <main class="flex-1 pr-0 lg:pr-8">
                    <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600 mb-8">Actualités</h1>

                    <!-- Grille pour les articles avec tailles variées -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Article 1 - Grande taille -->
                        <div class="col-span-1 lg:col-span-2 row-span-2 bg-gray-800 bg-opacity-50 rounded-xl overflow-hidden shadow-2xl transform hover:scale-102 transition duration-300">
                            @if ($dernier)
                                <div class="relative">
                                    @if ($dernier->image)
                                        <img src="{{ $dernier->imageUrls() }}" alt="Actualité Image 1" class="w-full h-96 object-cover">
                                    @else
                                        <img src="{{ asset('presentation/IMG_20240827_122849_600.jpg') }}" alt="Actualité 1" class="w-full h-96 object-cover">
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                                    <div class="absolute bottom-0 left-0 p-6 text-white">
                                        <span class="bg-blue-600 text-xs font-semibold px-2.5 py-1 rounded-full mb-2 inline-block">À la une</span>
                                        <h2 class="text-4xl font-bold mb-3 leading-tight">{{ $dernier->titre }}</h2>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <p class="text-gray-300 text-lg leading-relaxed mb-4">{{ Str::limit($dernier->description, 200) }}</p>
                                    <a href="{{ route('actuslire', ['pro' => $dernier->slug, 'id' => $dernier->id]) }}" class="inline-block bg-blue-600 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-700 transition duration-300">Lire la suite</a>
                                </div>
                            @endif
                        </div>

                        @forelse ($deux as $d)
                            <!-- Article 2 -->
                            <div class="bg-gray-800 bg-opacity-50 rounded-xl overflow-hidden transform hover:scale-105 transition duration-300">
                                @if ($d->image)
                                    <img src="{{ $d->imageUrls() }}" alt="Actualité Image 2" class="w-full h-48 object-cover">
                                @else
                                    <img src="{{ asset('presentation/IMG_20240827_122849_600.jpg') }}" alt="Actualité 1" class="w-full h-48 object-cover">
                                @endif
                                <div class="p-6">
                                    <a href="{{ route('actuslire', ['pro' => $d->slug, 'id' => $d->id]) }}" class="text-xl font-bold mb-2 hover:text-blue-400 transition duration-300">{{ Str::limit($d->titre, 25) }}</a>
                                    <p class="text-gray-300 mt-2">{{ Str::limit($d->description, 105) }}.</p>
                                    <p class="text-sm text-gray-400 mt-4">{{ $d->created_at->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                    <div class="mt-8">
                        {{ $deux->links() }}
                    </div>
                </main>

                <!-- Sidebar droite -->
                <aside class="lg:w-1/4 mt-8 lg:mt-0">
                    <div class="bg-gray-800 bg-opacity-50 rounded-xl p-6">
                        <h2 class="text-2xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">Plus anciens</h2>

                        <div class="space-y-6">
                            @forelse ($anciens as $a)
                                <div class="flex items-center bg-gray-700 bg-opacity-50 rounded-lg p-4 transform hover:scale-105 transition duration-300">
                                    @if ($a->image)
                                        <img src="{{ $a->imageUrls() }}" alt="Catégorie Image 1" class="w-16 h-16 object-cover rounded-full mr-4">
                                    @else
                                        <img src="{{ asset('presentation/presentation.jpg') }}" alt="Catégorie Image 1" class="w-16 h-16 object-cover rounded-full mr-4">
                                    @endif
                                    <div>
                                        <a href="{{ route('actuslire', ['pro' => $a->slug, 'id' => $a->id]) }}" class="font-semibold text-lg hover:text-blue-400 transition duration-300">{{ Str::limit($a->titre, 15) }}</a>
                                        <p class="text-sm text-gray-300 mt-1">{{ Str::limit($a->description, 50) }}</p>
                                        <p class="text-xs text-gray-400 mt-2">🚨🚨 {{ $a->created_at->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>