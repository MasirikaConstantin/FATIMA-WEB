<x-app-layout>
<style>
            .mideux{
                margin-top: 40%;
                background-image: url({{asset("presentation/IMG-20200612-WA0009.jpg")}});
            }
        
        /* Style pour la div contenant l'image */
        .fixed-image {
            position: fixed; /* Position fixe pour que l'image reste en place lors du défilement */
            top: 0;
            left: 0;
            width: 100%; /* Prend toute la largeur de la fenêtre */
            height: 500px; /* Hauteur de l'image - ajustez selon vos besoins */
            overflow: hidden; /* Évite que l'image dépasse de la div */
            z-index: 1; /* Assure que la div est derrière le contenu qui a un z-index plus élevé */
            margin-top: 3%;
            display: flex; /* Utilisé pour centrer le texte horizontalement */
            align-items: center; /* Centre le texte verticalement dans la div */
            justify-content: center; /* Centre le texte horizontalement dans la div */

        }

        .fixed-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ajuste l'image pour couvrir toute la div */
        }

        /* Style pour le contenu en dessous de l'image */
        .content {
            position: relative; /* Position relative pour permettre le positionnement absolu si nécessaire */
            z-index: 2; /* Assure que le contenu passe au-dessus de l'image fixe */
            padding: 20px; /* Ajoute du padding autour du contenu */
            margin-top: 550px; /* Décale le contenu pour qu'il commence en dessous de l'image fixe */
        }

        .text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 2em; /* Ajustez la taille du texte */
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Ombre pour améliorer la lisibilité */
            animation: fadeInUp 2s ease-in-out; /* Animation */
        }

                    @media (max-width: 1464px)  {
                        .fixed-image {
                                margin-top: 6%;
                            }


                            .text-overlay {
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                color: white;
                                font-size: 1.7em; /* Ajustez la taille du texte */
                                font-weight: bold;
                                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Ombre pour améliorer la lisibilité */
                                animation: fadeInUp 2s ease-in-out; /* Animation */
                            }

                        }
                        @media (max-width: 1085px)  {
                            .text-overlay {
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                color: white;
                                font-size: 1.5em; /* Ajustez la taille du texte */
                                font-weight: bold;
                                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Ombre pour améliorer la lisibilité */
                                animation: fadeInUp 2s ease-in-out; /* Animation */
                            } 
                        }

                        @media (max-width: 900px)  {
                            .text-overlay {
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                color: white;
                                font-size: 1.3em; /* Ajustez la taille du texte */
                                font-weight: bold;
                                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Ombre pour améliorer la lisibilité */
                                animation: fadeInUp 2s ease-in-out; /* Animation */
                            } 
                        }

                        @media (max-width: 630px)  {
                            .fixed-image {
                                margin-top: 8%;
                            }

                            .text-overlay {
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                color: white;
                                font-size: 1.1em; /* Ajustez la taille du texte */
                                font-weight: bold;
                                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Ombre pour améliorer la lisibilité */
                                animation: fadeInUp 2s ease-in-out; /* Animation */
                            }
                        }
                        @media (max-width: 430px)  {
                            .fixed-image {
                                margin-top: 12%;
                            }
                            .text-overlay {
                                position: absolute;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                color: white;
                                font-size: 1.1em; /* Ajustez la taille du texte */
                                font-weight: bold;
                                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Ombre pour améliorer la lisibilité */
                                animation: fadeInUp 2s ease-in-out; /* Animation */
                            }
                        }



        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate(-30%, -80%);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }
            
</style>

    <body class="font-sans antialiased dark:bg-black dark:text-white/50">

        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 fixed-image">
            <img src="{{asset('presentation/IMG_20240830_120058_226.jpg')}}" alt="" srcset="">
            <div class="text-overlay">Notre Dame de Fatima
  
            <p>Nous sommes heureux de vous accueillir dans notre église, un sanctuaire de paix et de spiritualité où chacun est invité à se rapprocher de Dieu.    </p>
            </div>
        </div>
        <div class="content  bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center  selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    
                    <h1 style="color: black;" class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-4xl dark:text-white">Programmes</h1>

                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            @if($presentation)
                            <a
                                href="{{ route('programme.lireprogramme',['pro'=>$presentation->slug,"id"=>$presentation->id]) }}"
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                    @if ($presentation->image)

                                    <img
                                        src="{{$presentation->imageUrls()}}"
                                        alt="Laravel documentation screenshot"
                                        class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                        onerror="
                                            document.getElementById('screenshot-container').classList.add('!hidden');
                                            document.getElementById('docs-card').classList.add('!row-span-1');
                                            document.getElementById('docs-card-content').classList.add('!flex-row');
                                            document.getElementById('background').classList.add('!hidden');
                                        "
                                    />
                                    @else
                                        <img
                                            src="{{ asset('presentation/IMG_20240827_122849_600.jpg') }}"
                                            alt="Laravel documentation screenshot"
                                            class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                            onerror="
                                                document.getElementById('screenshot-container').classList.add('!hidden');
                                                document.getElementById('docs-card').classList.add('!row-span-1');
                                                document.getElementById('docs-card-content').classList.add('!flex-row');
                                                document.getElementById('background').classList.add('!hidden');
                                            "
                                        />  
                                    @endif

                                    <img
                                        src="https://laravel.com/assets/img/welcome/docs-dark.svg"
                                        alt="Laravel documentation screenshot"
                                        class="hidden aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.25)] dark:block"
                                    />
                                    <div
                                        class="absolute -bottom-16 -left-16 h-40 w-[calc(100%+8rem)] bg-gradient-to-b from-transparent via-white to-white dark:via-zinc-900 dark:to-zinc-900"
                                    ></div>
                                </div>

                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        

                                        <div class="pt-3 sm:pt-5 lg:pt-0">
                                            <h2 class="text-xl font-semibold text-black dark:text-white"> {{ $presentation->titre }}</h2>

                                            <p class="mt-4 text-sm/relaxed">
                                             {{Str::limit($presentation->description,250)}}
                                            </p>
                                        </div>
                                    </div>

                                    <svg class="size-6 shrink-0 stroke-[#1d8abdd7]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                                </div>
                            </a>
                            @endif

                            @forelse ($programmes as $p)
                                    <a
                                    href="{{ route('programme.lireprogramme',['pro'=>$p->slug,"id"=>$p->id]) }}"
                                    class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                                    >
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
                                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                    <span class="font-medium"></span> Aucun Programme supplementaire n'est disponible pour l'instant
                                    </div>
                                </div>
                            @endforelse

                           
                        </div>
                    </main>

                   
                </div>
            </div>
        </div>
    </x-app-layout>
