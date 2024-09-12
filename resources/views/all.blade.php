<x-app-layout>
    @php
        date_default_timezone_set('Europe/Paris');
        setlocale(LC_TIME, 'fr_FR.utf8');
        \Carbon\Carbon::setLocale('fr');
    @endphp
    <main class="pt-16 pb-24 bg-gradient-to-br from-gray-900 to-blue-900 text-white antialiased">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <section class="py-12">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-12">
                    <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600 mb-6 lg:mb-0">Tous les programmes</h2>
                    
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
                    @forelse ($program as $pr)
                        @php
                            $dateString = $pr->date;
                            $dateString = strtok($dateString, ' ');
                            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateString)->startOfDay();
                        @endphp
                        
                        <div class="bg-gray-800 bg-opacity-50 rounded-xl p-6 transform hover:scale-105 transition duration-300">
                            <div class="flex justify-between items-start mb-4">
                                <span class="bg-green-500 text-xs font-semibold px-2.5 py-0.5 rounded-full">Publié le {{ $pr->created_at->translatedFormat('d F Y') }}</span>
                                @if ($pr->etat == 1)
                                    <span class="bg-red-500 text-xs font-semibold px-2.5 py-0.5 rounded-full">Événement passé ou annulé</span>
                                @elseif($date->isPast())
                                    <span class="bg-red-500 text-xs font-semibold px-2.5 py-0.5 rounded-full">Événement passé</span>
                                @endif
                            </div>
                            
                            <a href="{{ route('programme.lireprogramme',['pro'=>$pr->slug,"id"=>$pr->id]) }}" class="text-2xl font-bold mb-3 hover:text-blue-400 transition duration-300">{{$pr->titre}}</a>
                            <p class="text-gray-300 mb-4">{{Str::limit($pr->description,200)}}</p>
                            <p class="text-sm text-gray-400">Par {{$pr->User->name}}</p>
                        </div>
                    @empty
                        <div class="bg-yellow-900 border-l-4 border-yellow-500 p-4 rounded-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-300">
                                        Aucune donnée trouvée contenant le mot clé <span class="font-medium underline">{{ request('titre') }}</span>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="mt-12">
                    {{$program->links()}}
                </div>
            </section>
        </div>
    </main>
</x-app-layout>