<x-app-layout>
   
<style>
   
    @media (max-width: 650px)  {
            
        .btnn {
        margin-top: 0.5em;
        }
    }
</style>
@php
    date_default_timezone_set('Europe/Paris');
    setlocale(LC_TIME, 'fr_FR.utf8');
    \Carbon\Carbon::setLocale('fr');
@endphp
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">


        
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">

                    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
                        <div class="mx-auto max-w-screen-lg px-4 2xl:px-0">
                        <div class="lg:flex lg:items-center lg:justify-between lg:gap-4">
                            <h2 class="shrink-0 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Archives Evénements </h2>
                    
                            <form method="GET" class="mt-4 w-full gap-4 sm:flex sm:items-center sm:justify-end lg:mt-0">
                            
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full flex-1 lg:max-w-sm">
                                <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                                </div>
                                <input type="text" name="titre"value="{{ request('titre') }}" id="simple-search" class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 ps-9 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Rechercher par titre"  />
                            </div>
                             <button  class="btnn  text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Rechercher</button>
                    
                            </form>
                        </div>
                    
                        <div class="mt-6 flow-root">
                            <div class="-my-6 divide-y divide-gray-200 dark:divide-gray-800">
                               

                                @forelse ( $events as $pr )
                                
                                
     @php

                                    $dateString = $pr->date_debut;

                                                        // Nettoyer la date en cas d'information supplémentaire
                                                       // $dateString = strtok($dateString, ' ');

                                                    $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateString)->startOfDay();

                            @endphp
                                    
                                    <div class="space-y-4 py-6 md:py-8">
                                        <div class="grid gap-4">
                                        <div>
                                            <span class="inline-block rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 md:mb-0">Publié le  {{ $pr->created_at->translatedFormat('d F Y') }}

                                            </span>
                                        </div>
                            
                                        <a href="{{ route('programme.lireeventsme',['pro'=>$pr->slug,"id"=>$pr->id]) }}" class="text-xl font-semibold text-gray-900 hover:underline dark:text-white">{{$pr->titre}}</a>
                                        </div>
                                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{Str::limit($pr->description,200)}}</p>
                                        @if ($pr->etat == 0)
                                        <div>
                                            <span class="inline-block rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-red-900 dark:text-red-300 md:mb-0">Evenement déjà passer ou annuler

                                            </span>
                                        </div>
                                       




                                        @elseif($date->isPast())
                                            <div>
                                                <span class="inline-block rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-red-900 dark:text-red-300 md:mb-0">Evenement déjà passer

                                                </span>
                                            </div>
                                        @endif
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Par {{$pr->User->name}}
                                        </p>
                                    </div>


                                   
                                    @empty
                                    <div class="space-y-4 py-6 md:py-8">

                                        <div id="alert-border-4" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
                                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <div class="ms-3 text-sm font-medium">
                                            Aucune donnée trouvée  contenant le mot clé <span href="#" class="font-semibold underline hover:no-underline">{{ request('titre') }} </span>.
                                            </div>
                                            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-4" aria-label="Close">
                                            <span class="sr-only">Dismiss</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            </button>
                                        </div>
                                    @endforelse
                        
                                
                            </div>
                        </div>
                    
                        <div class="">
                           {{$events->links()}}
                        </div>
                        </div>
                    </section>
                    
                    

                    
                    
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.get('/eventsme/tous', { titre: 'hfv' }, function(response) {
    console.log(response);
});
</script>
        @vite(['resources/js/app.js'])
    
    </x-app-layout>
    