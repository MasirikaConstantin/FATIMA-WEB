@section('titre', 'Evenements')
<x-app-layout>
    <style>
        @media (max-width: 650px) {
            .btnn {
                margin-top: 0.5em;
                width: 100%;
            }
        }
    </style>
    @php
        date_default_timezone_set('Europe/Paris');
        setlocale(LC_TIME, 'fr_FR.utf8');
        \Carbon\Carbon::setLocale('fr');
    @endphp
    <main class="pt-16 pb-24 bg-gradient-to-br from-gray-900 to-blue-900 text-white antialiased">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <section class="py-12">


                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-12">
                    <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600 mb-6 lg:mb-0">Archives Evénements</h2>
                    
                    <form method="GET" class="w-full lg:w-auto">
                        <div class="relative">
                            <input type="text" name="titre" value="{{ request('titre') }}" class="w-full lg:w-80 bg-gray-800 bg-opacity-50 text-white rounded-full py-3 px-6 pl-12 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Rechercher par titre">
                            <button class="absolute right-2 top-2 bg-blue-600 text-white rounded-full p-2 hover:bg-blue-700 transition duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>

                
                    <div class="space-y-8">
                            @forelse ($events as $pr)
                                @php
                                    $dateString = $pr->date_debut;
                                    $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateString)->startOfDay();
                                @endphp
                                
                                <div class="bg-gray-800 bg-opacity-50 rounded-xl p-6 transform hover:scale-105 transition duration-300">
                                    <div class="flex justify-between items-start mb-4">
                                        <span class="bg-green-500 text-xs font-semibold px-2.5 py-0.5 rounded-full">Publié le {{ $pr->created_at->translatedFormat('d F Y') }}</span>
                                       
                                    </div>
                                    <a href="{{ route('event.lireeventsme',['pro'=>$pr->slug,"id"=>$pr->id]) }}" class="text-xl font-semibold text-gray-200 hover:underline dark:text-white">{{$pr->titre}}
                                    
                                    <p class="text-gray-200 mb-4">{{ Str::limit($pr->description, 200) }}</p>
                                    
                                    <p class="text-sm text-gray-400">
                                        Par {{ $pr->User->name }}
                                    </p>
                                </a>
                                </div>
                            @empty
                                <div class="space-y-4 py-6 md:py-8">
                                    <div id="alert-border-4" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <div class="ms-3 text-sm font-medium">
                                            Aucune donnée trouvée contenant le mot clé <span class="font-semibold underline hover:no-underline">{{ request('titre') }}</span>.
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
                    </div>
                    <div class="text-gray-900 px-8" >
                        {{ $events->links() }}
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>