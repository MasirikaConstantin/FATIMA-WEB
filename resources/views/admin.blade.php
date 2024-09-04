<x-app-layout>
    <style>
        .nav{
          margin-top:5%;
          margin-left: 3%;

        }

        @media (max-width: 650px)  {
            .nav{
          margin-top: 20%;
          margin-left: 3%;
        }

                }

                .ii{
                  border-radius: 50%;
                  object-fit: cover;
                }
      </style>

@php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');

@endphp

    <div name="header" class="nav" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </div>

    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" p-6 bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
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
                     
                </div>
                <a href="{{ route('admin.newprogramme') }}" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                    Créer un Programme
                </a>






                <section class=" dark:bg-gray-900 py-3 sm:py-5">
                  <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                      <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                          <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                              <div class="flex items-center flex-1 space-x-4">
                                  <h5>
                                      <span class="text-gray-500">Tous les programmes</span>
                                      <span class="dark:text-white">{{ $nombre }}</span>
                                  </h5>
                                  <h5>
                                      <span class="text-gray-500">A venir</span>
                                      <span class="dark:text-white">{{ $nombre_actif }}</span>
                                  </h5>
                              </div>
                              
                          </div>
                          <div class="overflow-x-auto">
                              <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                      <tr>
                                          
                                          <th scope="col" class="px-4 py-3">Couverture</th>
                                          <th scope="col" class="px-4 py-3">Titre</th>
                                          <th scope="col" class="px-4 py-3">Date</th>
                                          <th scope="col" class="px-4 py-3">Etat</th>
                                          <th scope="col" class="px-4 py-3">
                                            Modifier
                                          </th>
                                          
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @php
                                      $count=0;
                                    @endphp
                                      @forelse ($tous as $t )

                                      @php
                                      $count++;
                                        // Vérifier la valeur
                                            $dateString = $t->date;

                                            // Nettoyer la date en cas d'information supplémentaire
                                            $dateString = strtok($dateString, ' ');

                                        $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateString)->startOfDay();

                                                            //dd($date);
                                        @endphp
                                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            
                                          <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            @if ($t->image == null)
                                              <img src="{{asset('presentation/IMG_20240830_120058_226.jpg')}}" alt="iMac Front Image" class="w-auto h-8 mr-3 ii">
                                                
                                            @else
                                              <img src="{{$t->imageUrls()}}" alt="presentation" class="w-auto h-8 mr-3 ii">
                                                
                                            @endif
                                          </th>
                                          <td class="px-4 py-2">
                                              <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{Str::limit($t->titre,50)}}</span>
                                          </td>
                                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                              <div class="flex items-center">
                                                {{ $date->translatedFormat('d F Y') }}
                                              </div>
                                          </td>
                                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                            @if ($t->etat ==1)
                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Valide</span>

                                            @else
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">En attente</span>
 
                                            @endif
                                          </td>
                                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="{{ route('admin.editpro',['id'=>$t->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>

                                          </td>
                                          <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                              
                                        <button data-modal-target="popup-modal{{  $count }}" data-modal-toggle="popup-modal{{  $count }}" class="font-medium text-red-600 dark:text-red-500 hover:underline" type="button">
                                         Supprimer
                                          </button>

                                          </td>
                                          </tr>





                                                
                                          
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
                                                          <a href="{{ route('admin.deletprogram',["id"=>$t->id]) }}" data-modal-hide="popup-modal{{  $count }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                              Oui je suis sur
                                                          </a>
                                                          <button data-modal-hide="popup-modal{{  $count }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Non, Annuler</button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          
                                      @empty
                                        
                                      @endforelse
                                      
                                  </tbody>
                              </table>
                          </div>
                          
                      </div>
                  </div>
                </section>



            </div>

            
        </div>
    </div>
</x-app-layout>
