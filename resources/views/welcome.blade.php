 
    @php
    // Définir la timezone et la localisation en français
    date_default_timezone_set('Europe/Paris');
    setlocale(LC_TIME, 'fr_FR.UTF-8');
    \Carbon\Carbon::setLocale('fr');
    
    // Assurez-vous que la variable $dernier est définie et contient les clés nécessaires
    $date = null;
    $title1 = null;
    $description1 = null;
    // dd($dernier);
    
    if (isset($dernier) ) {
        $date = isset($dernier['date']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $dernier['date'])->startOfDay() : \Carbon\Carbon::now()->startOfDay();
        $title1 = $dernier['titre_1'] ?? 'Titre non disponible';
        $description1 = $dernier['description_1'] ?? 'Description non disponible';
    } else {
        $date = \Carbon\Carbon::now()->startOfDay(); // Valeur par défaut si $dernier n'est pas valide
        $title1 = 'Titre non disponible';
        $description1 = 'Description non disponible';
    }
    @endphp

<x-app-layout>
    <!-- Section Accueil -->
  <!-- Section Accueil avec animation fade-in -->
<section class="relative h-screen bg-cover bg-center animate-fadeIn"
style="background-image: url('{{ asset('presentation/presentation.jpg') }}');">
<div class="absolute inset-0 bg-black bg-opacity-50"></div>
<div class="relative z-10 flex items-center justify-center h-full">
    <div class="text-center text-white animate-slideUp">
        <h1 class="text-5xl font-bold">Paroisse Notre Dame de Fatima</h1>
        <p class="mt-4 text-xl">Bienvenue à notre église, un lieu de prière, de paix et de communauté.</p>
        <a href="#programmes"
            class="mt-6 inline-block bg-yellow-500 text-black font-semibold py-2 px-6 rounded-full hover:bg-yellow-600 transition-all duration-300 transform hover:scale-105">
            Découvrir plus
        </a>
    </div>
</div>
</section>

    <style>
        @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(30px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .animate-fadeIn {
        animation: fadeIn 2s ease-in-out;
    }

    .animate-slideUp {
        animation: slideUp 1.5s ease-out;
    }
    </style>

    <!-- Section Programmes -->
    <section id="programmes" class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8 text-blue-900">Nos Rendez - Vous</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Programme 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-800">Messe en semaine</h3>
                    <ul class="text-gray-700 space-y-2">
                        <li>
                            <span class="font-bold">Mercredi :</span>
                            <p class="ml-4">Adoration et Chapelet : 17h-18h30</p>
                            <p class="ml-4">Messe du soir : 18h30</p>
                        </li>
                        <li>
                            <span class="font-bold">Vendredi :</span>
                            <p class="ml-4">Lecture biblique : 17h-18h30</p>
                            <p class="ml-4">Vêpres : 18h30</p>
                        </li>
                    </ul>
                </div>
                
                <!-- Programme 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-800">Messe du Dimanche</h3>
                    <ul class="text-gray-700 space-y-2">
                        <li>Messe de l'Aurore : 7h00</li>
                        <li>Grand-Messe : 10h00 <span class="text-red-400 font-bold">(en direct 🔴)</span></li>
                        <li>Messe du soir : 18h00</li>
                    </ul>
                </div>
                
                <!-- Programme 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-800">Confession</h3>
                    <ul class="text-gray-700 space-y-2">
                        <li><span class="font-bold">Avant chaque messe :</span> 30 min avant chaque messe</li>
                    </ul>
                </div>
                
                <!-- Programme 4 -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold mb-4 text-blue-800">1er Samedi du Mois</h3>
                    <ul class="text-gray-700 space-y-2">
                        <li><span class="font-bold">Messe votive :</span> 9h00</li>
                        <li>Suivie du Rosaire</li>
                    </ul>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Section Lectures du jour -->
    <header class="bg-blue-900 text-white py-6">
        <div class="container mx-auto text-center">
            <h1 class="text-3xl font-bold">Lectures du jour</h1>
            <p class="text-lg mt-2">Découvrez les lectures spirituelles et méditations quotidiennes</p>
        </div>
    </header>
    
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto bg-white shadow-lg rounded-lg p-8">
            <div class="text-center mb-8">
                <p class="text-lg text-gray-500">{{ $date->translatedFormat('l, ') }} le {{ $date->translatedFormat('d/m/Y') }}</p>
                <h2 class="text-2xl font-bold text-blue-900 mt-2">1ère Lecture : {{ $title1 }}</h2>
            </div>
    
            <div class="prose prose-lg max-w-full text-gray-700 mx-auto leading-loose">
                <p>{{ $description1 }}</p>
            </div>
    
            <a href="{{ route('lecture-jour') }}" class="text-blue-600 hover:underline mt-4 inline-block">Lire plus</a>
        </div>
    </section>

    <!-- Section Programmes à venir -->
    <section id="programmes" class="py-16 bg-gradient-to-br from-blue-900 to-gray-900">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-12 text-center text-white">Nos Programmes à Venir</h2>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($programmes as $p)
                    <a href="{{ route('programme.lireprogramme', ['pro' => $p->slug, 'id' => $p->id]) }}" class="block group">
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg transition duration-300 group-hover:shadow-xl">
                            <div class="h-48 bg-blue-600 flex items-center justify-center overflow-hidden">
                                @if($p->image)
                                    <img src="{{ $p->imageUrls() }}" alt="{{ $p->titre }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-20 h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-blue-800 mb-2">{{ $p->titre }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($p->description, 100) }}</p>
                                <div class="flex items-center text-blue-600 group-hover:text-blue-700">
                                    <span class="font-medium">En savoir plus</span>
                                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-center col-span-full text-white">Aucun programme à venir pour le moment.</p>
                @endforelse
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('programme.tous') }}" class="inline-block bg-yellow-500 text-gray-200 font-semibold py-3 px-6 rounded-full hover:bg-yellow-600 transition duration-300">
                    Voir tous les programmes
                </a>
            </div>
        </div>
    </section>

    <!-- Section Événements -->
    <section id="evenements" class="py-16 bg-gradient-to-br from-gray-900 to-blue-900">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-8 text-white">Événements à Venir</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse ($evenements as $ev)
                

@php
$date_debut = \Carbon\Carbon::createFromFormat('Y-m-d', $ev->date_debut)->startOfDay();
$date_fin = \Carbon\Carbon::createFromFormat('Y-m-d', $ev->date_fin)->startOfDay();

$dateDebut = \Carbon\Carbon::parse($date_debut);
$dateFin = \Carbon\Carbon::parse($date_fin);
@endphp
                    <!--a href="{{ route('event.lireeventsme', ['pro' => $ev->slug, 'id' => $ev->id]) }}" class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-lg transition duration-300 hover:shadow-xl">
                        <div class="relative flex w-full flex-1 items-stretch">
                            <img src="@if ($ev->image == '') {{ asset('presentation/presentation.jpg') }}@else{{ $ev->imageUrls() }} @endif"
                                alt="{{ $ev->titre }}"
                                class="aspect-video h-full w-full flex-1 rounded-[10px] object-cover"
                                onerror="this.style.display='none'" />
                        </div>
                        <div class="relative flex items-center gap-6">
                            <div class="flex flex-col">
                                <h2 class="text-xl font-semibold text-blue-800">{{ $ev->titre }}</h2>
                                <p class="mt-2 text-sm text-gray-600">
                                    @if ($dateDebut->equalTo($dateFin))
                                    Le <strong>{{ $date_debut->translatedFormat('d F Y') }}</strong> 
                                    @elseif ($dateDebut->lessThan($dateFin))
                                    Du <strong>{{ $date_debut->translatedFormat('d F Y') }}</strong> au <strong>{{ $date_fin->translatedFormat('d F Y') }}</strong>
                                    @endif
                                </p>
                                <p class="mt-4 text-sm text-gray-700">
                                    {{ Str::limit($ev->description, 150) }}
                                </p>
                            </div>
                        </div>
                    </a-->





                    <main class="flex-1 pr-0 lg:pr-8 ">
                        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400 mb-8">Actualités</h1>
    
                        <!-- Article principal -->
                        <article class="bg-gray-800 bg-opacity-50 rounded-xl overflow-hidden shadow-2xl transform hover:scale-102 transition duration-300 mb-8">
                            @if ($ev)
                                <div class="relative">
                                    @if ($ev->image)
                                        <img src="{{ $ev->imageUrls() }}" alt="Actualité Image" class="w-full h-96 object-cover">
                                    @else
                                        <img src="{{ asset('presentation/presentation.jpg') }}" alt="Actualité Image" class="w-full h-96 object-cover">
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-70"></div>
                                    <div class="absolute bottom-0 left-0 p-6 text-white">
                                        @if($date_debut->isPast())
                                        <span class="bg-blue-700 text-xs items-start font-semibold px-2.5 py-1 rounded-full mb-2 inline-block">Evénement passé</span>
                                        @elseif($date_fin->isPast())
                                        <span class="bg-blue-700 text-xs items-start font-semibold px-2.5 py-1 rounded-full mb-2 inline-block">Evénement passé</span>
                                        @else
                                        <span class="bg-red-700 text-xs items-start font-semibold px-2.5 py-1 rounded-full mb-2 inline-block">À la une</span>

                                        @endif
                                        <h2 class="text-4xl font-bold mb-3 leading-tight">{{ $ev->titre }}</h2>
                                        <p class="text-sm font-semibold">
                                            @if ($dateDebut->equalTo($dateFin))
                                    Le <strong>{{ $date_debut->translatedFormat('d F Y') }}</strong> 
                                    @elseif ($dateDebut->lessThan($dateFin))
                                    Du <strong>{{ $date_debut->translatedFormat('d F Y') }}</strong> au <strong>{{ $date_fin->translatedFormat('d F Y') }}</strong>
                                    @endif    
                                        </p>
                                    </div>
                                </div>
                                <div class="p-6 text-start">
                                    <p class="text-gray-300 text-lg leading-relaxed mb-4">{{ Str::limit($ev->description, 200) }}</p>

                                    <div class="items-start">
                                        <a href="{{ route('event.lireeventsme', ['pro' => $ev->slug, 'id' => $ev->id]) }}" 
                                            class="text-yellow-500 font-semibold hover:underline transition-colors duration-300 mb-3">
                                            Lire plus →
                                        </a>
    
                                        
                                    </div>
                                </div>
                                
                                
                            @endif
                        </article>
    
                        @if (session('success'))
                            <div class="bg-green-800 bg-opacity-40 border border-green-600 text-green-100 px-4 py-3 rounded relative mb-6" role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif
                    </main>
                @empty
                    <p class="text-center col-span-full text-white">Aucun événement à venir pour le moment.</p>
                @endforelse
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('event.tousevent') }}"
                    class="inline-block bg-yellow-500 text-gray-200 font-semibold py-3 px-6 rounded-full hover:bg-yellow-600 transition duration-300">
                    Voir tous les événements
                </a>
            </div>
        </div>
    </section>

    <!-- Section Actualités style Magazine -->
    <section id="actualites" class="py-16 bg-gradient-to-br from-blue-900 to-gray-900">
        <div class="container mx-auto">
            <h2 class="text-5xl font-bold text-center mb-12 text-white">Magazine des Actualités</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @forelse ($actus as $act)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    @if ($act->image)
                    <img src="{{ $act->imageUrls() }}" alt="{{ $act->titre }}" class="w-full h-64 object-cover hover:opacity-90 transition-opacity duration-300">
                    @else
                    <img src="{{ asset('presentation/presentation.jpg') }}" alt="{{ $act->titre }}" class="w-full h-64 object-cover hover:opacity-90 transition-opacity duration-300">
                    @endif
                    <div class="p-6">
                        <h3 class="text-3xl font-bold mb-3 text-blue-800">{{ Str::limit($act->titre, 25) }}</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">{{ Str::limit($act->description, 100) }}</p>
                        <a href="{{ route('actuslire', ['pro' => $act->slug, 'id' => $act->id]) }}" 
                            class="text-yellow-500 font-semibold hover:underline transition-colors duration-300">
                            Lire plus →
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-center text-gray-300 col-span-3">Aucune actualité disponible pour le moment.</p>
                @endforelse
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('news') }}" 
                    class="inline-block bg-yellow-500 text-gray-200 font-semibold py-3 px-8 rounded-full hover:bg-yellow-600 transition-colors duration-300">
                    Voir Toutes les Actualités
                </a>
            </div>
        </div>
    </section>
</x-app-layout>