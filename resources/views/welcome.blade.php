<x-app-layout>

     <!-- Section Accueil -->
     <section class="relative h-screen bg-cover bg-center" style="background-image: url('https://source.unsplash.com/1600x900/?church');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold">Paroisse Notre Dame de Fatima</h1>
                <p class="mt-4 text-xl">Bienvenue à notre église, un lieu de prière, de paix et de communauté.</p>
                <a href="#programmes" class="mt-6 inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Découvrir plus</a>
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

    <!-- Section Programmes -->
    <section id="programmes" class="py-16 bg-white">
        <div class="container mx-auto text-censter">
            <h2 class="text-4xl font-bold mb-8 text-center">Nos Programmes à Venir</h2>
                <!-- Programme 1 -->
                <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

                @forelse ($programmes as $p )
                    <a href="{{ route('programme.lireprogramme',['pro'=>$p->slug,"id"=>$p->id]) }}" class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]" >
                        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#1d8abdd7]/10 sm:size-16">
                        <img src="{{ asset('icon_pri.svg') }}" class="size-5 sm:size-8" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24"  />
                        </div>

                        <div class="pt-3 sm:pt-5">
                            <h2 class="text-xl font-semibold text-black dark:text-white">{{ $p->titre }}</h2>

                            <p class="mt-4 text-sm/relaxed">
                                {{Str::limit($p->description,200)}}
                            </p>
                        </div>
                        <style>
                            canvas{
                                color: #1d8abdd7;
                            }
                        </style>
                        <svg  class="size-6 shrink-0 self-center stroke-[#1d8abdd7]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                    </a>

                @empty
                   
                @endforelse
                </div>
                <div class="text-center" >
                    <a href="{{ route('programme.tous') }}" class="mt-8 text-center inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Voir tous les programmes</a>
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

                    <a
                                href="{{ route('event.lireeventsme',['pro'=>$ev->slug,"id"=>$ev->id]) }}"
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                    <img
                                        src="@if ($ev->image== ""){{ asset('presentation/IMG_20240827_122849_600.jpg') }}@else{{ $ev->imageUrls() }}@endif"
                                        alt="Laravel documentation screenshot"
                                        class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                        onerror="
                                            document.getElementById('screenshot-container').classList.add('!hidden');
                                            document.getElementById('docs-card').classList.add('!row-span-1');
                                            document.getElementById('docs-card-content').classList.add('!flex-row');
                                            document.getElementById('background').classList.add('!hidden');
                                        "
                                    />
                                   
                                    <div
                                        class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"
                                    ></div>
                                </div>

                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                       

                                        <div class="pt-2 sm:pt-4 lg:pt-0">
                                            <h2 class="text-xl font-semibold text-black dark:text-white">{{ $ev->titre }}</h2>

                                            <p class="mt-4 text-sm/relaxed">
                                                {{Str::limit($ev->description,200)}}
                                            </p>
                                        </div>
                                    </div>

                                    <svg class="size-6 shrink-0 stroke-[#FF2D20]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                                </div>
                            </a>


                                        
                   
  
                </div> 
                @empty
                    
                @endforelse
            </div>
            <div class="text-center">
                <a href="{{ route('event.tousevent') }}" class="mt-8 inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Voir tous les événements</a>

            </div>
        </div>
    </section>

    
    <!-- Section Actualités -->
<section id="actualites" class="py-16 bg-gray-50">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-8">Actualités</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Actualité 1 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/400x300/?church,event" alt="Actualité 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2">Messe spéciale pour les jeunes</h3>
                    <p class="text-gray-700 mb-4">Une messe dédiée aux jeunes aura lieu ce samedi à 16h.</p>
                    <a href="#" class="text-yellow-500 font-semibold hover:underline">Lire plus</a>
                </div>
            </div>
            <!-- Actualité 2 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/400x300/?prayer,people" alt="Actualité 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2">Nouvelle retraite spirituelle</h3>
                    <p class="text-gray-700 mb-4">Participez à notre retraite spirituelle du mois prochain.</p>
                    <a href="#" class="text-yellow-500 font-semibold hover:underline">Lire plus</a>
                </div>
            </div>
            <!-- Actualité 3 -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/400x300/?community,gathering" alt="Actualité 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2">Collecte de dons pour les nécessiteux</h3>
                    <p class="text-gray-700 mb-4">Nous organisons une collecte de dons pour soutenir les familles démunies.</p>
                    <a href="#" class="text-yellow-500 font-semibold hover:underline">Lire plus</a>
                </div>
            </div>
        </div>
        <a href="#" class="mt-8 inline-block bg-yellow-500 text-black font-semibold py-2 px-4 rounded hover:bg-yellow-600">Voir toutes les actualités</a>
    </div>
</section>




    </x-app-layout>
