<x-app-layout>

    <!-- Section Accueil -->
    <section class="relative h-screen bg-cover bg-center"
        style="background-image: url('https://source.unsplash.com/1600x900/?church');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold">Paroisse Notre Dame de Fatima</h1>
                <p class="mt-4 text-xl">Bienvenue à notre église, un lieu de prière, de paix et de communauté.</p>
                <a href="#programmes"
                    class="mt-6 inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Découvrir
                    plus</a>
            </div>
        </div>
    </section>

    <!-- Section Programmes -->
    <section id="programmes" class="py-16 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8">Nos Programmes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Programme 1 -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Messe du Dimanche</h3>
                    <p class="text-gray-700">Chaque dimanche à 10h.</p>
                </div>
                <!-- Programme 2 -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Prière Communautaire</h3>
                    <p class="text-gray-700">Tous les vendredis à 18h.</p>
                </div>
                <!-- Programme 3 -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Confession</h3>
                    <p class="text-gray-700">Chaque premier samedi du mois à 16h.</p>
                </div>
                <!-- Programme 4 -->
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4">Catéchèse</h3>
                    <p class="text-gray-700">Tous les mercredis à 15h.</p>
                </div>
            </div>
        </div>


    </section>



    
    @php
// Définir la timezone et la localisation en français
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.UTF-8');
\Carbon\Carbon::setLocale('fr');

// Créer un objet Carbon à partir de la chaîne de date
$date = \Carbon\Carbon::createFromFormat('Y-m-d', $dernier['date'])->startOfDay();

@endphp
        <!-- En-tête -->
        <header class="bg-blue-900 text-white py-6">
            <div class="container mx-auto text-center">
                <h1 class="text-3xl font-bold">Lectures du jour</h1>
                <p class="text-lg mt-2">Découvrez les lectures spirituelles et méditations quotidiennes</p>
            </div>
        </header>
    
        <!-- Section Lecture du Jour -->
        <section class="py-12">
            <div class="container mx-auto bg-white shadow-lg rounded-lg p-8">
                <!-- Date de la lecture -->
                <div class="text-center mb-8">
                    <p class="text-lg text-gray-500">{{ $date->translatedFormat('l, ') }} le {{ $date->translatedFormat('d/m/Y ') }} </p>
                    <h2 class="text-2xl font-bold text-gray-900 mt-2">1ère Lecture : {{  $dernier['titre_1'] }}</h2>
                </div>
    
                <!-- Contenu de la lecture -->
                <div class="prose prose-lg max-w-full text-gray-700 mx-auto leading-loose">
                    <p>
                        
                        {{  $dernier['description_1'] }}
                    </p>
    
                </div>

                <a href="{{ route('lecture-jour') }}" class="text-blue-600 hover:underline mt-4 inline-block">Lire plus</a>
            </div>
        </section>


    <!-- Section Programmes -->
    <section id="programmes" class="py-16 bg-white">
        <div class="container mx-auto text-censter">
            <h2 class="text-4xl font-bold mb-8 text-center">Nos Programmes à Venir</h2>
            <!-- Programme 1 -->
            <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

                @forelse ($programmes as $p)
                    <a href="{{ route('programme.lireprogramme', ['pro' => $p->slug, 'id' => $p->id]) }}"
                        class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <div
                            class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#1d8abdd7]/10 sm:size-16">
                            <img src="{{ asset('icon_pri.svg') }}" class="size-5 sm:size-8"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" />
                        </div>

                        <div class="pt-3 sm:pt-5">
                            <h2 class="text-xl font-semibold text-black dark:text-white">{{ $p->titre }}</h2>

                            <p class="mt-4 text-sm/relaxed">
                                {{ Str::limit($p->description, 200) }}
                            </p>
                        </div>
                        <style>
                            canvas {
                                color: #1d8abdd7;
                            }
                        </style>
                        <svg class="size-6 shrink-0 self-center stroke-[#1d8abdd7]" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>

                @empty
                @endforelse
            </div>
            <div class="text-center">
                <a href="{{ route('programme.tous') }}"
                    class="mt-8 text-center inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Voir
                    tous les programmes</a>
            </div>
        </div>
        </div>
    </section>

    <!-- Section Événements -->
    <section id="evenements" class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8 ">Événements à Venir</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                @forelse ($evenements as $ev)
                    <!-- Événement 1 -->
                    <div class="">

                        <a href="{{ route('event.lireeventsme', ['pro' => $ev->slug, 'id' => $ev->id]) }}" id="docs-card" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                            <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                <img src="@if ($ev->image == '') {{ asset('presentation/IMG_20240827_122849_600.jpg') }}@else{{ $ev->imageUrls() }} @endif"
                                    alt="Laravel documentation screenshot"
                                    class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                    onerror="
                                            document.getElementById('screenshot-container').classList.add('!hidden');
                                            document.getElementById('docs-card').classList.add('!row-span-1');
                                            document.getElementById('docs-card-content').classList.add('!flex-row');
                                            document.getElementById('background').classList.add('!hidden');
                                        " />

                                <div
                                    class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900">
                                </div>
                            </div>

                            <div class="relative flex items-center gap-6 lg:items-end">
                                <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">


                                    <div class="pt-2 sm:pt-4 lg:pt-0">
                                        <h2 class="text-xl font-semibold text-black dark:text-white">{{ $ev->titre }}
                                        </h2>
                                        @php
                                            $date_debut = \Carbon\Carbon::createFromFormat('Y-m-d', $ev->date_debut)->startOfDay();
                                            $date_fin = \Carbon\Carbon::createFromFormat('Y-m-d', $ev->date_fin)->startOfDay();

                                            $dateDebut = \Carbon\Carbon::parse($date_debut);
                                            $dateFin = \Carbon\Carbon::parse($date_fin);
                                        @endphp

                                        <p class="mt-4 text-sm/relaxed text-start ">
                                            @if ($dateDebut->equalTo($dateFin))
                                            Le  <strong> {{ $date_debut->translatedFormat('d F Y') }}</strong> 
                                            @elseif ($dateDebut->lessThan($dateFin))
                                            Du  <strong> {{ $date_debut->translatedFormat('d F Y') }}</strong> au <strong> {{ $date_fin->translatedFormat('d F Y') }}</strong>
                                            @else
                                            @endif
                                             
                                        </p>
                                        <p class="mt-4 text-sm/relaxed">
                                            {{ Str::limit($ev->description, 200) }}
                                        </p>
                                    </div>
                                </div>

                                <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                </svg>
                            </div>
                        </a>





                    </div>
                @empty
                @endforelse
            </div>
            <div class="text-center">
                <a href="{{ route('event.tousevent') }}"
                    class="mt-8 inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Voir
                    tous les événements</a>

            </div>
        </div>
    </section>


    <!-- Section Actualités -->
    <section id="actualites" class="py-16 bg-gray-50">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8">Actualités</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Actualité 1 -->
                @forelse ($actus as $act)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    @if ($act->image)
                        <img src="{{ $act->imageUrls()  }}" alt="Actualité 1" class="w-full h-48 object-cover">
                    @else
                        <img src="{{ asset('presentation/IMG_20240827_122849_600.jpg')  }}" alt="Actualité 1" class="w-full h-48 object-cover">

                    @endif
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2">🚨🚨{{ Str::limit($act->titre,10) }}</h3>
                        <p class="text-gray-700 mb-4">{{ Str::limit($act->description, 50) }}
                        </p>
                        <a href="{{ route('actuslire', ['pro' => $act->slug, 'id' => $act->id]) }}" class="text-yellow-500 font-semibold hover:underline">Lire plus</a>
                    </div>
                </div>
               
                @empty
                    
                @endforelse
            </div>
            <a href="{{ route('news') }}"
                class="mt-8 inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Voir
                Toutes les actualités</a>
        </div>
    </section>


</x-app-layout>
