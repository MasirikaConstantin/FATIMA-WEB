@section("titre",'Programme');

<x-app-layout>
   

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <!--address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Jese Leos</a>
                            <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO Flowbite</p>
                            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                        </div>
                    </div>
                </address-->
                @php
                //dd($Commentaire);
                // Vérifier la valeur
                    $dateString = $programme->date;

                    // Nettoyer la date en cas d'information supplémentaire
                    $dateString = strtok($dateString, ' ');

                $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateString)->startOfDay();

                                    //dd($date);
             @endphp
             @if (session('success'))
             <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                 <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                   <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                 </svg>
                 <span class="sr-only">Info</span>
                 <div>
                   <span class="font-medium">Success alert!</span> {{ session('success') }}
                 </div>
               </div>
             @endif
                @if ($programme->etat == 1)
                <div>
                    <span class=" mb-4 inline-block rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-red-900 dark:text-red-300 md:mb-0">Evenement déjà passer ou annuler {{ $date->translatedFormat('d F Y') }} à {{ $programme->h_debut}}

                    </span>
                </div>
               




                @elseif($date->isPast())
                    <div>
                        <span class="inline-block rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-red-900 dark:text-red-300 md:mb-0">Evenement déjà passer

                        </span>
                    </div>
                @else
                    <div>
                        <span class="inline-block rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-red-900 dark:text-red-300 md:mb-0">Evenement à venir le {{ $date->translatedFormat('d F Y') }} à {{ $programme->h_debut}}

                        </span>
                    </div>
                @endif
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $programme->titre }}</h1>
                
                @if ($programme->image)
                <img class="h-auto max-w-xl rounded-lg shadow-xl dark:shadow-gray-800" src="{{ $programme->imageUrls() }}" alt="image description">

                @endif
            </header>
            <p class="lead mb-4">
                {{ $programme->description }}
            </p>

            

                @auth
                <form action="{{ route('programme.attend', ['pro'=>$programme->slug, "id"=>$programme->id]) }}" method="POST">
                    @csrf
                    

                    

                    @if (auth()->user()->programs->contains($programme))
                    
                        <button type="submit" class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2">
                            
                              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                              </svg>
            
                              Se désinscrire
                        </button>
                    @else
                    <button type="submit" class="text-white bg-[#2557D6] hover:bg-[#2557D6]/90 focus:ring-4 focus:ring-[#2557D6]/50 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#2557D6]/50 me-2 mb-2">

                        <svg class="w-4 h-4 me-2 -ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                          </svg>
                        J'y serait
                        </button>
                        
                    @endif

                </form>
                <p>Participants : <span id="count-{{ $programme->id }}">{{ $count }}</span></p>

                @endauth
                @guest
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium"> {{ $count>1 ? "".$count."  personnes vont participer à ce programme" : "".$count."Personne va perticiper à ce programme" }} 
                    </div>
                  </div>
                @endguest

            <hr class="mb-4" >
            
            <section class="not-format">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion</h2>
                </div>
                <form class="mb-6" method="POST" >
                    @csrf
                    <div @error("contenus")
                    class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                    @enderror class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Votre commentaire</label>
                        <textarea id="comment" rows="6"  name="contenus" @error("contenus")
                        class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500"
                        @enderror
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            placeholder="Ecris un commentaire..." required>{{ old('contenus') }}</textarea>

                            @error('contenus')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"> {{ $message }} </p>

                            @enderror
                    </div>
                    @auth
                        <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Commenter        
                        </button>
                    @endauth
                    @guest
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <a href="{{ route("login") }}"><span class="font-medium">Rejoignez nous  </span>  </a>Pour commenter cette activité
                        </div>
                      </div>
                    @endguest
                </form>
                @php
                date_default_timezone_set('Europe/Paris');
                setlocale(LC_TIME, 'fr_FR.utf8');
                \Carbon\Carbon::setLocale('fr');
                $k=0;
                $count="a";

            @endphp
            
                @forelse ($Commentaire as $c)
                        @php
                            $k++;
                            $count =  $count . $k;
                            
                        @endphp
                        <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                @if ($c->user->image)
                                <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="{{ asset('icon_pri.svg') }}"
                                    alt="Michael Gough">{{ $c->user->name }}</p>
                                    @else
                                    <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                        class="mr-2 w-6 h-6 rounded-full"
                                        src="{{ asset('icon_pri.svg') }}"
                                        alt="Michael Gough">{{ $c->user->name }}</p>
                                @endif
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                            title="February 8th, 2022"> {{ $c->created_at->translatedFormat(' d F Y') }}</time></p>
                                </div>
                                @auth
                                            @if ($c->user->id == Auth::user()->id)
                                            <button id="dropdownComment{{ $k }}Button" data-dropdown-toggle="dropdownComment{{ $k }}"
                                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                            type="button">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                            </svg>
                                            <span class="sr-only">Comment settings</span>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownComment{{ $k }}"
                                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                                <!--li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li-->
                                                <li>
                                                    <button data-modal-target="popup-modal{{  $count }}" data-modal-toggle="popup-modal{{  $count }}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" type="button">
                                                        Supprimer
                                                        </button>
                                                    
                                                </li>
                                                <!--li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                                </li-->
                                            </ul>
                                        </div>
                                    
                                    @endif
                                @endauth
                            </footer>
                            <p>{{ $c->contenus }}</p>
                                
                            
                        </article>
                        <div id="popup-modal{{  $count }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal{{  $count }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Êtes vous sur de vouloir supprimer ce Programme?</h3>
                                        <a href="{{route('programme.deletecomm',['id'=>$c->id])}}" data-modal-hide="popup-modal{{  $count }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Oui je suis sur
                                        </a>
                                        <button data-modal-hide="popup-modal{{  $count }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non, Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
<hr>
                @empty
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="font-medium">Aucun Commentaire pour le moment</span> 
                    </div>
                  </div>
                @endforelse
                
                <div class="">
                    {{$Commentaire->links()}}
                 </div>
               
            </section>
        </article>
    </div>
  </main>
  
  <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
    <div class="px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Autres Programmes</h2>
        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($autres as $au )
                <article class="max-w-xs" style="overflow: hidden;">
                    <a href="{{ route('programme.lireprogramme',['pro'=>$au->slug,"id"=>$au->id]) }}">
                        @if ($au->image)
                        <img src="{{$au->imageUrls()}}" class="mb-5 rounded-lg" alt="Image 1">
                        @else
                        <img src="{{asset('presentation/IMG_20240827_122849_600.jpg')}}" class="w-full h-auto max-w-xl rounded-lg" style="object-fit: cover;" alt="Image 1">

                        @endif
                    </a>
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                        <a href="{{ route('programme.lireprogramme',['pro'=>$au->slug,"id"=>$au->id]) }}">{{Str::limit($au->titre,50)}}</a>
                    </h2>
                    <p class="mb-4 text-gray-500 dark:text-gray-400">{{Str::limit($au->description,50)}}</p>
                    <a href="{{ route('programme.lireprogramme',['pro'=>$au->slug,"id"=>$au->id]) }}" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                        Lire la suite
                    </a>
                </article>
            @endforeach
            
        </div>
    </div>
  </aside>


  
  
 


            </div>
        </div>
    </div>

</x-app-layout>
