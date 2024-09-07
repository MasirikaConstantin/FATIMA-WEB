<x-app-layout>


    <div class="flex min-h-screen bg-gray-100">

        <!-- Contenu principal à gauche -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6">Actualités</h1>

            <!-- Grille pour les articles avec tailles variées -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Article 1 - Grande taille -->
                <div class="col-span-1 lg:col-span-2 row-span-2 bg-white rounded-lg shadow-md overflow-hidden">
                    @if ($dernier)
                        @if ($dernier->image)
                        <img src="{{ $dernier->imageUrls()  }}" alt="Actualité Image 1" class="w-full h-64 object-cover">

                        @else
                            <img src="{{ asset('presentation/IMG_20240827_122849_600.jpg')  }}" alt="Actualité 1" class="w-full h-48 object-cover">

                        @endif
                        <div class="p-4">
                            <a href="{{ route('actuslire', ['pro' => $dernier->slug, 'id' => $dernier->id]) }}" class="text-2xl font-semibold mb-2">{{ $dernier->titre }}</a>
                            <p>
                                🚨🚨
                            </p>
                            <p class="text-gray-600 text-sm">{{ $dernier->description }}</p>
                        </div>
                    @else
                        
                    @endif
                </div>

                @forelse ($deux as $d )
                    <!-- Article 2 -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if ($d->image)
                    <img src="{{ $d->imageUrls()  }}" alt="Actualité Image 2" class="w-full h-48 object-cover">

                    @else
                        <img src="{{ asset('presentation/IMG_20240827_122849_600.jpg')  }}" alt="Actualité 1" class="w-full h-48 object-cover">

                    @endif
                        <div class="p-4">
                            <a href="{{ route('actuslire', ['pro' => $d->slug, 'id' => $d->id]) }}" class="text-xl font-semibold mb-2">{{ Str::limit($d->titre, 25) }}</a>
                            <p class="text-gray-600 text-sm">{{ Str::limit($d->description, 105) }}.</p>
                        </div>
                    </div>
                @empty
                    vide
                @endforelse

                

            </div>
<div class="mt-4">
    {{ $deux->links() }}

</div>
        </main>

        <!-- Sidebar droite fixe -->
        <aside class="w-1/4 bg-white shadow-lg p-6 sticky top-0 h-screen mt-5">
            <div class="space-y-4">
            <h2 class="text-2xl font-bold mb-4 mt-15">Plus anciens</h2>

            @forelse ($anciens as $a )
                <div class="flex items-center p-4 bg-blue-50 rounded-lg shadow-md">
                    @if ($a->image)
                         <img src="{{ $a->imageUrls()  }}" alt="Catégorie Image 1" class="w-12 h-12 object-cover rounded-full mr-4">
                    @else
                        <img src="{{ asset('presentation/IMG_20240827_122849_600.jpg')  }}" alt="Catégorie Image 1" class="w-12 h-12 object-cover rounded-full mr-4">
                    @endif
                    <div>
                        <a href="{{ route('actuslire', ['pro' => $a->slug, 'id' => $a->id]) }}" class="font-semibold text-lg">{{ Str::limit($a->titre, 15) }}</a>

                        <p class="text-sm text-gray-600"> 🚨🚨{{ Str::limit($a->description, 50) }}</p>
                    </div>
                </div>
            @empty
                
            @endforelse
                
               
            </div>
        </aside>

    </div>

</x-app-layout>
