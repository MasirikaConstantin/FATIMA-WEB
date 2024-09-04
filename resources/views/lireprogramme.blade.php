<x-app-layout>
   

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Jese Leos</a>
                            <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO Flowbite</p>
                            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time></p>
                        </div>
                    </div>
                </address>
                @php
                // Vérifier la valeur
                    $dateString = $programme->date;

                    // Nettoyer la date en cas d'information supplémentaire
                    $dateString = strtok($dateString, ' ');

                $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateString)->startOfDay();

                                    //dd($date);
             @endphp
                @if ($programme->etat == 0)
                <div>
                    <span class=" mb-4 inline-block rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-red-900 dark:text-red-300 md:mb-0">Evenement déjà passer ou annuler

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
            <hr class="mb-4" >
            
            <section class="not-format">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion</h2>
                </div>
                <form class="mb-6">
                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="6"
                            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Post comment
                    </button>
                </form>
                <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center">
                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img
                                    class="mr-2 w-6 h-6 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                    alt="Michael Gough">Michael Gough</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                    title="February 8th, 2022">Feb. 8, 2022</time></p>
                        </div>
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                              </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownComment1"
                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                </li>
                            </ul>
                        </div>
                    </footer>
                    <p>Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                        instruments for the UX designers. The knowledge of the design tools are as important as the
                        creation of the design strategy.</p>
                        
                    
                </article>
                
               
               
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
