<x-app-layout>
    <div class="flex flex-col lg:flex-row min-h-screen bg-gray-100">
        <!-- Contenu principal à gauche -->
        <main class="flex-1 p-1 text-center" style="margin-top:2px !important;">
            <h1 class="text-3xl font-bold mb-6 text-center mt-6">Actualités</h1>

            <!-- Grille pour les articles avec tailles variées -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6">
                <!-- Article 1 - Grande taille -->
                <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert" style="overflow: hidden">
                    <header class="mb-4 lg:mb-6 not-format">
                        @if (session('success'))
                        <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div>
                                <span class="font-medium">Success alert!</span> {{ session('success') }}
                            </div>
                        </div>
                        @endif

                        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $actuslire->titre }}</h1>
                        @php
                            $dateDebut = \Carbon\Carbon::parse($actuslire->created_at);
                        @endphp
                        <p class="text-sm/relaxed text-start mb-4">
                            Le <strong>{{ $dateDebut->translatedFormat('d F Y') }}</strong> 
                        </p>

                        @if ($actuslire->image)
                        <img class="h-auto max-w-xl rounded-lg shadow-xl dark:shadow-gray-800" style="object-fit: contain" src="{{ $actuslire->imageUrls() }}" alt="image description">
                        @endif
                    </header>
                    <p class="lead mb-4">{{ $actuslire->description }}</p>
                    <hr class="mb-4">
                </article>
            </div>
        </main>

        <!-- Sidebar droite -->
        <aside class="w-full lg:w-1/4 bg-white shadow-lg p-6 mt-2 mb-3 lg:sticky lg:top-0 lg:h-screen">
            <div class="space-y-4">
                <h2 class="text-2xl font-bold mb-4">Plus anciens</h2>
                @forelse ($autres as $a)
                <div class="flex items-center p-4 bg-blue-50 rounded-lg shadow-md">
                    @if ($a->image)
                    <img src="{{ $a->imageUrls() }}" alt="Catégorie Image 1" class="w-12 h-12 object-cover rounded-full mr-4">
                    @else
                    <img src="{{ asset('presentation/IMG_20240827_122849_600.jpg') }}" alt="Catégorie Image 1" class="w-12 h-12 object-cover rounded-full mr-4">
                    @endif
                    <div>
                        <a href="{{ route('actuslire', ['pro' => $a->slug, 'id' => $a->id]) }}" class="font-semibold text-lg">{{ Str::limit($a->titre, 15) }}</a>
                        <p class="text-sm text-gray-600">🚨🚨{{ Str::limit($a->description, 50) }}</p>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </aside>
    </div>
</x-app-layout>
