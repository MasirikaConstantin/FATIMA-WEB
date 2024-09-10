@section("titre",'Tous les Lectures')

<x-app-layout>

    <div class="py-12  bg-gray-100 mb-4">

        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12 mb-4">
            @if (session('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium"> {{ session('success') }}</span>
                </div>
              </div>
            @endif
    
    
            <form method="GET" class="mt-4 w-full gap-4 sm:flex sm:items-center sm:justify-end lg:mt-0">
                                
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full flex-1 lg:max-w-sm">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                    </div>
                    <input type="search" id="myInput" onkeyup="filterTable()" name="titre"value="{{ request('titre') }}" id="simple-search" class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 ps-9 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Rechercher par titre"  />
                </div>
        
                </form>
    
<div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg mt-4">
    

    
    <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
        <div class="flex items-center flex-1 space-x-4">
            <h5>
                <span class="text-gray-500">Tous les événements</span>
                <span class="dark:text-white">{{ $nombre_eve }}</span>
            </h5>
            <a href="{{ route('lecture.newlecture') }}" class=" text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                Mettre à jour la lecture
              </a>
           
        </div>
        
    </div>
    <div class="overflow-x-auto">
        <table id="myTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    
                    <th scope="col" class="px-4 py-3">N°</th>
                    <th scope="col" class="px-4 py-3">Titre</th>
                    <th scope="col" class="px-4 py-3">Date</th>
                    <th scope="col" class="px-4 py-3">
                      Modifier
                    </th>

                    
                </tr>
            </thead>
            <tbody>
              @php
                $count_eve=0;
                $count_eve1="a";
              @endphp
                @forelse ($tous_eve as $t )

                @php
                $count_eve++;
                $count_eve1 =  $count_eve1 . $count_eve;
                  // Vérifier la valeur
                  //dd($t);
                      $dateString = $t->date;
                      //dd($dateString);
                      // Nettoyer la date en cas d'information supplémentaire
                     $dateString = strtok($dateString, ' ');

                  $date = \Carbon\Carbon::createFromFormat('Y-m-d', $dateString)->startOfDay();

                                      //dd($date);
                  @endphp
                  <tr id="trs" class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                      
                    <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      {{ $count_eve }}
                    </th>
                    <td class="px-4 py-2">
                        <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">{{Str::limit($t->titre_3,50)}}</span>
                    </td>
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex items-center">
                          {{ $date->translatedFormat('d F Y') }}
                        </div>
                    </td>
                    <!--td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                      @if ($t->etat ==0)
                      <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Valide</span>

                      @else
                      <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">En attente</span>

                      @endif
                    </td-->
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <a href="{{ route('lecture.modiflect',['id'=>$t->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>

                    </td>
                   



                @empty
                  
                @endforelse
                
            </tbody>
        </table>
        
    </div>
    
</div>



<!--------------------------------------->

</x-app-layout>
